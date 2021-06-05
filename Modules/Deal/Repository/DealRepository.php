<?php


namespace Modules\Deal\Repository;


use App\Repository\BaseRepository;
use Illuminate\Support\Collection;
use Modules\Deal\Entities\Deal;

class DealRepository extends BaseRepository implements DealRepositoryInterface
{
    public function __construct(Deal $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        return parent::all();
    }

    public function create(array $data)
    {
        return parent::create($data);
    }

    public function update(array $data, $id)
    {
        return parent::update($data, $id);
    }

    public function delete($id)
    {
        return parent::delete($id);
    }

    public function getAllDeals() : Collection
    {
        return $this->model->with(['brand.medias', 'product', 'attributes'])->get();
    }
}
