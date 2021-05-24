<?php


namespace Modules\Category;


use Modules\Category\Repository\CategoryRepositoryInterface;

class CategoryService
{
    private $repository;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data + ['user_id' => 1]);
    }

    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }

    public function getCategoryDropdown(): array
    {
        return $this->repository->all()->pluck('name', 'id')->toArray();
    }
}
