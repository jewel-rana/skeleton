<?php


namespace Modules\Deal;


use Modules\Deal\Repository\DealRepositoryInterface;

class DealService
{
    /**
     * @var DealRepositoryInterface
     */
    private $repository;

    public function __construct(DealRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data + ['user_id' => auth()->user()->id]);
    }

    public function update(array $data, int $id)
    {
        return $this->repository->update($data, $id);
    }
}
