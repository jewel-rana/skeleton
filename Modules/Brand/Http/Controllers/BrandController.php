<?php

namespace Modules\Brand\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Brand\BrandService;
use Modules\Brand\Entities\Brand;
use Modules\Brand\Http\Requests\BrandCreateRequest;
use Modules\Brand\Http\Requests\BrandUpdateRequest;
use Modules\Category\CategoryService;
use Modules\Category\Entities\Category;
use Modules\Category\Http\Requests\CategoryCreateRequest;
use Modules\Category\Http\Requests\CategoryUpdateRequest;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{
    private $brands;

    public function __construct(BrandService $brands)
    {
        $this->brands = $brands;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index( Request $request)
    {
        if($request->wantsJson()) {
            $brands = Brand::with(['medias'])->select(['id', 'name', 'description']);

            return Datatables::of($brands)
                ->addColumn('action', function($brand) {
                    return "<a href='" . route('brand.edit', $brand->id) . "' class='btn btn-outline-secondary'>Edit</a>";
                })
                ->addColumn('logo', function ($brand) {
                    $logo = ($brand->medias->count()) ? $brand->medias->first()->attachment : 'default/brand.jpg';
                    return "<img src='" . asset($logo) . "' title='" . $brand->name . "' class='table-img' />";
                })
                ->removeColumn('medias')
                ->rawColumns(['action', 'logo'])->addIndexColumn()
                ->make(true);
        }
        return view('brand::index')->withTitle('Brands');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('brand::create')->withTitle('Add new brand');
    }

    /**
     * Store a newly created resource in storage.
     * @param BrandCreateRequest $request
     * @return RedirectResponse
     */
    public function store(BrandCreateRequest $request): RedirectResponse
    {
        try {
            $this->brands->create($request->validated());
        } catch (\Throwable $exception) {
            dd($exception);
            session()->flash('error', $exception->getMessage());
            return redirect()->back();
        }

        return redirect()->route('brand.index');
    }

    /**
     * Show the specified resource.
     * @param Brand $brand
     * @return Renderable
     */
    public function show(Brand $brand): Renderable
    {
        return view('brand::show', compact('brand'))->withTitle('Show brand');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Brand $brand
     * @return Renderable
     */
    public function edit(Brand $brand): Renderable
    {
        return view('brand::edit', compact('brand'))->withTitle('Update brand');
    }

    /**
     * Update the specified resource in storage.
     * @param BrandUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(BrandUpdateRequest $request, $id): RedirectResponse
    {
        try {
            $this->brands->update($request->validated(), $id);
        } catch (\Throwable $exception) {
            dd($exception);
            session()->flash('error', $exception->getMessage());
            return redirect()->back();
        }

        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Brand $brand
     * @return RedirectResponse
     */
    public function destroy(Brand $brand): RedirectResponse
    {
        if(!auth()->user()->can('brand-delete'))
            session()->flash('error', 'You have no right to delete brand');

        $brand->delete();
        return redirect()->back();
    }
}
