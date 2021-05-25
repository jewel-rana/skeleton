<?php

namespace Modules\Deal\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Deal\DealService;
use Modules\Deal\Entities\Deal;
use Modules\Deal\Http\Requests\DealCreateRequest;
use Modules\Deal\Http\Requests\DealUpdateRequest;
use Yajra\DataTables\Facades\DataTables;

class DealController extends Controller
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
            $deals = Deal::with(['brand', 'product', 'dealType'])->select(['id', 'name', 'product_id', 'brand_id', 'deal_type_id']);

            return Datatables::of($deals)
                ->addColumn('action', function($deal) {
                    return "<a href='" . route('deal.edit', $deal->id) . "' class='btn btn-outline-secondary'>Edit</a>";
                })
                ->editColumn('product', function($deal) {
                    return $deal->product->title;
                })
                ->editColumn('brand', function($deal) {
                    return $deal->brand->name;
                })
                ->editColumn('deal_type', function($deal) {
                    return $deal->dealType->name;
                })
                ->removeColumn(['product_id', 'brand_id', 'deal_type_id'])
                ->make(true);
        }
        return view('deal::index')->withTitle('Deals');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('deal::create')->withTitle('Add new deal');
    }

    /**
     * Store a newly created resource in storage.
     * @param DealCreateRequest $request
     * @return RedirectResponse
     */
    public function store(DealCreateRequest $request): RedirectResponse
    {
        try {
            $this->deals->create($request->validated());
        } catch (\Throwable $exception) {
            dd($exception);
            session()->flash('error', $exception->getMessage());
            return redirect()->back();
        }

        return redirect()->route('deal.index');
    }

    /**
     * Show the specified resource.
     * @param Deal $deal
     * @return Renderable
     */
    public function show(Deal $deal)
    {
        return view('deal::show', compact('deal'))->withTitle('Show deal');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Deal $deal
     * @return Renderable
     */
    public function edit(Deal $deal)
    {
        return view('deal::edit', compact('deal'))->withTitle('Update deal');
    }

    /**
     * Update the specified resource in storage.
     * @param DealUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(DealUpdateRequest $request, $id): RedirectResponse
    {
        try {
            $this->deals->update($request->validated(), $id);
        } catch (\Throwable $exception) {
            session()->flash('error', $exception->getMessage());
        }

        return redirect()->route('deal.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Deal $deal
     * @return RedirectResponse
     */
    public function destroy(Deal $deal): RedirectResponse
    {
        if(!auth()->user()->can('deal-delete'))
            session()->flash('error', 'You have no right to delete deal');

        $deal->delete();
        return redirect()->back();
    }
}
