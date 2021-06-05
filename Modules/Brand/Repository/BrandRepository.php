<?php


namespace Modules\Brand\Repository;


use App\Repository\BaseRepository;
use Modules\Brand\Entities\Brand;
use Modules\Brand\Jobs\BrandMediaUploadedJob;
use Modules\Media\MediaService;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{
    private $media;

    public function __construct(Brand $model, MediaService $mediaService)
    {
        parent::__construct($model);
        $this->media = $mediaService;
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
        $brand = $this->model->find($id)->update($data);
        return $brand;
    }

    public function delete($id)
    {
        return parent::delete($id);
    }
}
