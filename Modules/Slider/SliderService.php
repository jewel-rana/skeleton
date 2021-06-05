<?php


namespace Modules\Slider;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Media\MediaService;
use Modules\Slider\Entities\Slider;
use Modules\Slider\Jobs\SliderMediaUploadJob;
use Modules\Slider\Jobs\SlidUploadJob;
use Modules\Slider\Repository\SliderRepositoryInterface;

class SliderService
{
    /**
     * @var SliderRepositoryInterface
     */
    private $repository;
    public $media;

    public function __construct(SliderRepositoryInterface $repository, MediaService $mediaService)
    {
        $this->repository = $repository;
        $this->media = $mediaService;
    }

    public function create(array $data)
    {
        DB::transaction(function () use ($data) {
            $slider = $this->repository->create($data + ['user_id' => auth()->user()->id]);
            dispatch(new SliderMediaUploadJob($slider, $this->media));
        });
    }

    public function getSliders(): Collection
    {
        return $this->repository->all();
    }

    public function update(array $data, int $id)
    {
        $slider = Slider::find($id);
        $slider->update($data);
        dispatch(new SliderMediaUploadJob($slider, $this->media));
        return $slider;
    }

    public function addSlide(array $data)
    {
        dispatch(new SlidUploadJob($data, $this->media));
    }
}
