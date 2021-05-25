<?php

namespace Modules\Deal\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Deal\DealService;
use Modules\Deal\Entities\DealType;
use Modules\Deal\Http\Requests\DealTypeCreateRequest;
use Modules\Deal\Http\Requests\DealTypeUpdateRequest;
use Yajra\DataTables\Facades\DataTables;

class DealTypeController extends Controller
{
    private $deals;

    public function __construct(DealService $deals)
    {
        $this->deals = $deals;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index( Request $request)
    {
        if($request->wantsJson()) {
            $dealTypes = DealType::select(['id', 'name', 'description']);

            return Datatables::of($dealTypes)
                ->addColumn('action', function($deal) {
                    return "<a href='" . route('deal-type.edit', $deal->id) . "' class='btn btn-outline-secondary'>Edit</a>";
                })
                ->make(true);
        }
        return view('deal::type.index')->withTitle('Deal types');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('deal::type.create')->withTitle('Add new deal type');
    }

    /**
     * Store a newly created resource in storage.
     * @param DealTypeCreateRequest $request
     * @return RedirectResponse
     */
    public function store(DealTypeCreateRequest $request): RedirectResponse
    {
        try {
            DealType::create($request->validated());
        } catch (\Throwable $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back();
        }

        return redirect()->route('deal-type.index');
    }

    /**
     * Show the specified resource.
     * @param DealType $dealType
     * @return Renderable
     */
    public function show(DealType $dealType)
    {
        return view('deal::type.show', compact('dealType'))->withTitle('Show deal type');
    }

    /**
     * Show the form for editing the specified resource.
     * @param DealType $dealType
     * @return Renderable
     */
    public function edit(DealType $dealType): Renderable
    {
        return view('deal::type.edit', compact('dealType'))->withTitle('Update deal type');
    }

    /**
     * Update the specified resource in storage.
     * @param DealTypeUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(DealTypeUpdateRequest $request, $id): RedirectResponse
    {
        try {
            DealType::find($id)->update($request->validated());
        } catch (\Throwable $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back();
        }

        return redirect()->route('deal-type.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param DealType $dealType
     * @return RedirectResponse
     */
    public function destroy(DealType $dealType): RedirectResponse
    {
        if(!auth()->user()->can('deal-delete'))
            session()->flash('error', 'You have no right to delete deal type');

        $dealType->delete();
        return redirect()->back();
    }
}
