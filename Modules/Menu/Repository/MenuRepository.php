<?php


namespace Modules\Menu\Repository;


use App\Repository\BaseRepository;
use Illuminate\Support\Collection;
use Modules\Menu\Entities\Menu;

class MenuRepository extends BaseRepository implements MenuRepositoryInterface
{
    public function __construct(Menu $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
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
