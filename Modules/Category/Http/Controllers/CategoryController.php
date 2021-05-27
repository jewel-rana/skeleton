<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Category\CategoryService;
use Modules\Category\Entities\Category;
use Modules\Category\Http\Requests\CategoryCreateRequest;
use Modules\Category\Http\Requests\CategoryUpdateRequest;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    private $categories;

    public function __construct(CategoryService $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index( Request $request)
    {
        if($request->wantsJson()) {
            $categories = Category::select(['id', 'name', 'description']);

            return Datatables::of($categories)
                ->addColumn('action', function($category) {
                    return "<a href='" . route('category.edit', $category->id) . "' class='btn btn-outline-secondary'>Edit</a>";
                })
                ->make(true);
        }
        return view('category::index')->withTitle('Categories');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('category::create')->withTitle('Add new category');
    }

    /**
     * Store a newly created resource in storage.
     * @param CategoryCreateRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryCreateRequest $request): RedirectResponse
    {
        try {
            $this->categories->create($request->validated());
        } catch (\Throwable $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back();
        }

        return redirect()->route('category.index');
    }

    /**
     * Show the specified resource.
     * @param Category $category
     * @return Renderable
     */
    public function show(Category $category)
    {
        return view('category::show', compact('category'))->withTitle('Show category');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Category $category
     * @return Renderable
     */
    public function edit(Category $category): Renderable
    {
        return view('category::edit', compact('category'))->withTitle('Update category');
    }

    /**
     * Update the specified resource in storage.
     * @param CategoryUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(CategoryUpdateRequest $request, $id): RedirectResponse
    {
        try {
            $this->categories->update($request->validated(), $id);
        } catch (\Throwable $exception) {
            session()->flash('error', $exception->getMessage());
        }

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        if(!auth()->user()->can('category-delete'))
            session()->flash('error', 'You have no right to delete category');

        $category->delete();
        return redirect()->back();
    }
}
