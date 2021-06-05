<?php


namespace Modules\Setting;


use Illuminate\Support\Facades\Cache;
use Modules\Setting\Entities\Option;

class OptionService implements OptionServiceInterface
{
    private $options;
    public function __construct()
    {
        $this->options = Cache::rememberForever('options', function() {
            return Option::all();
        });
    }

    public function get($key, $default_value = '')
    {
        $item = $this->options->first(function($item, $_k) use($key, $default_value) {
            return $item->field == $key;
        }, function() use($default_value) {
            return $default_value;
        });

        return (is_object($item)) ? $item->value : $item;
    }

    public function save(array $data, $tab)
    {
        collect($data)->each(function($value, $key) use($data, $tab) {
            Option::updateOrCreate([
                'field' => $key
                ],
                [
                    'tab' => $tab,
                    'field' => $key,
                    'value' => $value
                ]
            );
        });
        Cache::forget('options');
    }
}
