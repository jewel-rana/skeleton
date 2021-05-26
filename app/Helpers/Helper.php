<?php

use Modules\Setting\OptionService;

function getOption($key, $default = null)
{
    $option = new OptionService();
    return $option->get($key, $default);
}
