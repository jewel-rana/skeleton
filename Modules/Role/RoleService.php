<?php


namespace Modules\Role;


use Modules\Role\Repository\RoleRepositoryInterface;

class RoleService
{
    /**
     * @var RoleRepositoryInterface
     */
    private $repository;

    public function __construct(RoleRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getRoleDropdown(): array
    {
        return $this->repository->all()->where('name', '!=', 'customer')->pluck('name', 'id')->toArray();
    }

    public function create(array $data)
    {
        return $this->repository->create($data + ['guard_name' => 'web']);
    }

    public function update(array $data, int $id)
    {
        return $this->repository->update($data, $id);
    }
}
