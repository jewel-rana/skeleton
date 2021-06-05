<?php


namespace Modules\Media\Repository;


use App\Repository\BaseRepository;
use Modules\Media\Entities\Media;

class MediaRepository extends BaseRepository implements MediaRepositoryInterface
{
    public function __construct(Media $model)
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
        return $this->model->update($data, $id);
    }

    public function delete($id)
    {
        return parent::delete($id);
    }
}
