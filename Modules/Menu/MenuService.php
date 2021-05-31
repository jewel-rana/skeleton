<?php


namespace Modules\Menu;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Modules\Menu\Repository\MenuRepositoryInterface;
use Modules\Product\Entities\Product;


class MenuService
{
    /**
     * @var MenuRepositoryInterface
     */
    private $repository;

    public function __construct(MenuRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }

    public function getMenuList(): Collection
    {
        return $this->repository->all()->pluck('name', 'name');
    }
}
