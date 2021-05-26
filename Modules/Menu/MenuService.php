<?php


namespace Modules\Menu;


use Illuminate\Http\JsonResponse;
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

    public function create(array $data)
    {
        return $this->repository->create($data + ['user_id' => auth()->user()->id]);
    }

    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }


}
