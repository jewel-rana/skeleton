<?php


namespace Modules\Slider\Repository;


use App\Repository\BaseRepository;
use Modules\Slider\Entities\Slider;

class SliderRepository extends BaseRepository implements SliderRepositoryInterface
{
    public function __construct(Slider $model)
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
        return $this->model->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return parent::delete($id);
    }
}
