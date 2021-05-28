<?php


namespace Modules\Slider\Http\View;


use Illuminate\View\View;
use Modules\Slider\SliderService;

class SliderComposer
{
    /**
     * @var SliderService
     */
    private $sliders;

    public function __construct(SliderService $sliderService)
    {
        $this->sliders = $sliderService->getSliders();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $sliderItems = [];
        $this->sliders->each(function($item, $key) use(&$sliderItems) {
            return $item->medias->each(function($media, $key) use($item, &$sliderItems) {
                array_push($sliderItems, [
                    'slider_id' => $item->id,
                    'title' => $media->pivot->title,
                    'attachment' => $media->attachment,
                    'description' => $media->pivot->description,
                    'btn_text' => $media->pivot->btn_text,
                    'btn_link' => $media->pivot->btn_link
                ]);
            });
        });
        $view->with([
            'slider_lists' => $this->sliders->pluck('name', 'id'),
            'slider_items' => $sliderItems
        ]);

//        $this->sliders->getSliders()->groupBy('name')->each(function($item, $key) use($view) {
//            $view->with([
//                str_replace(' ', '_', strtolower($key)) => $item,
//            ]);
//        });
    }
}
