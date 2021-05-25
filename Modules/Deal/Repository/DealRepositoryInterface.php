<?php


namespace Modules\Deal\Repository;


use Illuminate\Support\Collection;

interface DealRepositoryInterface
{

    public function getAllDeals() : Collection;
}
