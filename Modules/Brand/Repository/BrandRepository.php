<?php


namespace Modules\Brand\Repository;


use App\Repository\BaseRepository;
use Modules\Brand\Entities\Brand;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{
    public function __construct(Brand $model)
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
}
