<?php


namespace Modules\Media;


use Intervention\Image\Facades\Image;
use Modules\Brand\Entities\Brand;
use Modules\Media\Repository\MediaRepositoryInterface;

class MediaService
{
    private $dir;
    private $property;
    private $repository;

    public function __construct(MediaRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function upload(Brand $brand, $files, $dir = 'uploads/files')
    {
        $this->property = $brand;
        $this->dir = $dir;
        if(is_array($files)) {
            foreach($files as $file) {
                $this->handle($file);
            }
        } else {
            $this->handle($files);
        }
    }

    public function handle($file)
    {
        if($file) {
            $imageName = time() . '.' . $file->extension();
            $file->move(public_path($this->dir), $imageName);
            $media = $this->repository->create([
                'attachment' => $this->dir . '/' . $imageName,
                'extension' => 'jpg',
                'dimension' => '',
                'user_id' => auth()->user()->id
            ]);

            $this->property->medias()->attach($media->id);
        }
    }
}
