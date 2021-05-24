<?php


namespace Modules\Role\Repository;


use App\Repository\BaseRepository;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        return parent::all();
    }

    public function create(array $data)
    {
        return parent::create($data);
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
