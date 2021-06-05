<?php


namespace Modules\Menu;


use Modules\Menu\Repository\MenuItemRepositoryInterface;

class MenuItemService
{
    private $repository;

    public function __construct(MenuItemRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function all($menuID)
    {
        return $this->repository->all()->where('menu_id', $menuID);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
