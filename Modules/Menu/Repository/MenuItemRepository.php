<?php


namespace Modules\Menu\Repository;


use App\Repository\BaseRepository;
use Modules\Menu\Entities\MenuItem;

class MenuItemRepository extends BaseRepository implements MenuItemRepositoryInterface
{
    public function __construct(MenuItem $model)
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
