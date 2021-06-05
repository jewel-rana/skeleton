<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Page\Entities\Page;
use Modules\Page\Http\Requests\PageCreateRequest;
use Modules\Page\PageService;
use Modules\Page\Http\Requests\PageUpdateRequest;
use Yajra\DataTables\Facades\DataTables;

class PageController extends Controller
{
    const templates = ["Default", "About Us"];


    private $pages;

    public function __construct(PageService $pages)
    {
        $this->pages = $pages;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $pages = Page::select(['id', 'title', 'description', 'template'])->get();

            return Datatables::of($pages)
                ->addColumn('action', function ($page) {
                    return "<a href='" . route('page.edit', $page->id) . "' class='btn btn-outline-secondary'>Edit</a>
";
                })
                ->rawColumns(['description', 'action'])->addIndexColumn()->make(true);
        }
        return view('page::index')->withTitle('Pages');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $templates = PageController::templates;
        return view('page::create', compact('templates'))->withTitle('Add new page');
    }


    public function store(PageCreateRequest $request)
    {
        try {
            $this->pages->create($request->validated());
        } catch (\Throwable $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back();
        }

        return redirect()->route('page.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('page::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {

        $templates = PageController::templates;
        $page = Page::findOrFail($id);
        return view('page::edit', compact('templates', 'page'))->withTitle('Add new page');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PageUpdateRequest $request, $id)
    {
        try {
            $this->pages->update($request->validated(), $id);
        } catch (\Throwable $exception) {
            session()->flash('error', $exception->getMessage());
        }

        return redirect()->route('page.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Page $page
     * @return RedirectResponse
     */
    public function destroy(Page $page): RedirectResponse
    {
        $page->delete();
        return redirect()->back();
    }
}
