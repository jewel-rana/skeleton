<?php

namespace Modules\Slider\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\CategoryService;
use Modules\Category\Entities\Category;
use Modules\Category\Http\Requests\CategoryCreateRequest;
use Modules\Category\Http\Requests\CategoryUpdateRequest;
use Modules\Slider\Entities\Slider;
use Modules\Slider\Http\Requests\SlideAddRequest;
use Modules\Slider\Http\Requests\SliderCreateRequest;
use Modules\Slider\Http\Requests\SliderUpdateRequest;
use Modules\Slider\SliderService;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    private $sliders;

    public function __construct(SliderService $sliders)
    {
        $this->sliders = $sliders;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index( Request $request)
    {
        if($request->wantsJson()) {
            $sliders = Slider::with(['medias'])->select(['id', 'name', 'description']);

            return Datatables::of($sliders)
                ->addColumn('items', function($slider) {
                    $str = '<div class="avatar-group"><a href="' . route('slider.show', $slider->id) . '">';
                    $slider->medias->each(function($item, $key) use(&$str, $slider) {
                        $str .= '<div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="' . $slider->name . '">
                        <img src="' . asset($item->attachment) . '" alt="' . $slider->name . '" height="26" width="26" />
                        </div>';
                    });
                    $str .= '</a></div>';
                    return $str;
                })
                ->addColumn('action', function($slider) {
                    return "<a href='" . route('slider.edit', $slider->id) . "' class='btn btn-outline-secondary'>Edit</a>";
                })
                ->rawColumns(['action', 'items'])->addIndexColumn()
                ->removeColumn('medias')
                ->make(true);
        }
        return view('slider::index')->withTitle('Sliders');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('slider::create')->withTitle('Add new slider');
    }

    /**
     * Store a newly created resource in storage.
     * @param SliderCreateRequest $request
     * @return RedirectResponse
     */
    public function store(SliderCreateRequest $request): RedirectResponse
    {
        try {
            $this->sliders->create($request->validated());
        } catch (\Throwable $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back();
        }

        return redirect()->route('slider.index');
    }

    /**
     * Show the specified resource.
     * @param Slider $slider
     * @return Renderable
     */
    public function show(Slider $slider): Renderable
    {
        return view('slider::show', compact('slider'))->withTitle('Slider: ' . ucfirst($slider->name));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Slider $slider
     * @return Renderable
     */
    public function edit(Slider $slider): Renderable
    {
        return view('slider::edit', compact('slider'))->withTitle('Update slider');
    }

    public function add(SlideAddRequest $request)
    {
        try {
            $this->sliders->addSlide($request->validated());
        } catch (\Throwable $exception) {
            session()->flash('error', $exception);
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     * @param SliderUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(SliderUpdateRequest $request, int $id): RedirectResponse
    {
        try {
            $this->sliders->update($request->validated(), $id);
        } catch (\Throwable $exception) {
            session()->flash('error', $exception->getMessage());
        }

        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Slider $slider
     * @return RedirectResponse
     */
    public function destroy(Slider $slider): RedirectResponse
    {
        if(!auth()->user()->can('slider-delete'))
            session()->flash('error', 'You have no right to delete slider');

        $slider->delete();
        return redirect()->back();
    }
}
