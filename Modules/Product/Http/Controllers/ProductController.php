<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Product\Http\Requests\ProductCreateRequest;
use Modules\Product\Http\Requests\ProductUpdateRequest;
use Modules\Product\ProductService;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    private $products;

    public function __construct(ProductService $products)
    {
        $this->products = $products;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index( Request $request)
    {
        if($request->wantsJson()) {
            $users = Product::with(['category'])->select(['id', 'title', 'category_id', 'price', 'created_at']);

            return Datatables::of($users)
                ->filter(function ($query) use ($request) {
                    if ($request->has('title')) {
                        $query->where('title', 'like', "%{$request->get('title')}%");
                    }
                })
                ->make(true);
        }
        return view('product::index')->withTitle('Products');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::create')->withTitle('Add new product');
    }

    /**
     * Store a newly created resource in storage.
     * @param ProductCreateRequest $request
     * @return RedirectResponse
     */
    public function store(ProductCreateRequest $request): RedirectResponse
    {
        try {
            $this->products->create($request->validated());
        } catch (\Throwable $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back();
        }

        return redirect()->route('product.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Product $product)
    {
        return view('product::show')->withTitle('Show product');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Product $product)
    {
        return view('product::edit')->withTitle('Update product');
    }

    /**
     * Update the specified resource in storage.
     * @param ProductUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(ProductUpdateRequest $request, $id): RedirectResponse
    {
        try {
            $this->products->update($request->validated(), $id);
        } catch (\Throwable $exception) {
            session()->flash('error', $exception->getMessage());
        }

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        if(!auth()->user()->can('product-delete'))
            session()->flash('error', 'You have no right to delete product');

        $product->delete();
        return redirect()->back();
    }
}
