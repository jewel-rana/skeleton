<?php

use Modules\Setting\OptionService;

function getOption($key, $default = null)
{
    $option = new OptionService();
    return $option->get($key, $default);
}

function getHero($slider = 1)
{
    $slide = collect($slier_items)->where('slider_id', $slider)->shuffle()->first();
    dd($slide);
}
