<?php


namespace Modules\User;


use Illuminate\Support\Facades\Hash;
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
        if(request()->input('password') !== null) {
            $data['password'] = Hash::make(request()->input('password'));
        }
        return $this->repository->update($data, $id);
    }
}
