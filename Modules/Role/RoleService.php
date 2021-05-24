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

    public function getRoleDropdown()
    {
        return $this->repository->all()->where('name', '!=', 'customer')->pluck('name', 'id')->toArray();
    }
}
