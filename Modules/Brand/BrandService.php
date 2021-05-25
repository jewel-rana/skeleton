<?php


namespace Modules\Brand;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Brand\Entities\Brand;
use Modules\Brand\Jobs\BrandMediaUploadedJob;
use Modules\Brand\Repository\BrandRepositoryInterface;
use Modules\Media\MediaService;

class BrandService
{
    /**
     * @var BrandRepositoryInterface
     */
    private $repository;
    private $media;

    public function __construct(BrandRepositoryInterface $repository, MediaService $mediaService)
    {
        $this->repository = $repository;
        $this->media = $mediaService;
    }

    public function create(array $data)
    {
        DB::transaction(function () use ($data) {
            $brand = $this->repository->create($data + ['user_id' => auth()->user()->id]);
            dispatch(new BrandMediaUploadedJob($brand, $this->media));
        });
    }

    public function getBrandDropdown(): Collection
    {
        return $this->repository->all()->pluck('name', 'id');
    }

    public function update(array $data, int $id)
    {
        $brand = Brand::find($id);
        $brand->update($data);
        dispatch(new BrandMediaUploadedJob($brand, $this->media));
        return $brand;
    }
}
