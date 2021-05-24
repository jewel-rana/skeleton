<?php


namespace Modules\User;


use Modules\User\Repository\UserRepositoryInterface;

class UserService
{
    /**
     * @var UserRepositoryInterface
     */
    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        $user = $this->repository->create($data);
        $user->assignRole($data['role']);
        return $user;
    }

    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }
}
