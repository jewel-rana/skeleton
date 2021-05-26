<?php


namespace Modules\Setting;


interface OptionServiceInterface
{
    public function save(array $data, $tab);
}
