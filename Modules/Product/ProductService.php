<?php


namespace Modules\Product;


use Modules\Product\Repository\ProductRepositoryInterface;

class ProductService
{
    /**
     * @var ProductRepositoryInterface
     */
    private $repository;

    public function __construct(ProductRepositoryInterface $repository)
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
