<?php


namespace Modules\Media;


use Intervention\Image\Facades\Image;
use Modules\Brand\Entities\Brand;

class MediaService
{
    /**
     * @var Brand
     */
    private $property;
    /**
     * @var mixed|string
     */
    private $dir;

    public function __construct()
    {
        $this->repository = $repository;
    }

    public function upload(Brand $brand, ?array $files, $dir = 'uploads/files')
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
                'type' => $file->getSize(),
                'extension' => $file->extension(),
                'dimension' => Image::make($file)->height() . ' X ' . Image::make($file)->width()
            ]);

            $this->property->medias()->attach($media->id);
        }
    }
}
