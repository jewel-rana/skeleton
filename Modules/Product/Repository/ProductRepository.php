<?php


namespace Modules\Product\Repository;


use App\Repository\BaseRepository;
use Modules\Product\Entities\Product;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $model)
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
        return parent::update($data,$id);
    }

    public function delete($id)
    {
        return parent::delete($id);
    }
}
