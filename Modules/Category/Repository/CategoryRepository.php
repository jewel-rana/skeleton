<?php


namespace Modules\Category\Repository;


use App\Repository\BaseRepository;
use Modules\Category\Entities\Category;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $model)
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
