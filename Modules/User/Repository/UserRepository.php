<?php


namespace Modules\User\Repository;


use App\Models\User;
use App\Repository\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        return parent::all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return parent::update($data, $id);
    }

    public function delete($id)
    {
        return parent::delete($id);
    }
}
