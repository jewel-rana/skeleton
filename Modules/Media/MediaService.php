<?php


namespace Modules\Media;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Modules\Media\Repository\MediaRepositoryInterface;

class MediaService
{
    private $dir;
    private $repository;

    public function __construct(MediaRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->dir = 'uploads/files/' . date('Y') . '/' . date('m');
    }

    public function upload($files)
    {
        if(is_array($files)) {
            foreach($files as $file) {
                return $this->handle($file);
            }
        } else {
            return $this->handle($files);
        }
    }

    public function handle($file)
    {
        if($file) {
            $imageName = time() . '.' . $file->extension();
            $file->move(public_path($this->dir), $imageName);
            return $this->repository->create([
                'attachment' => $this->dir . '/' . $imageName,
                'extension' => 'jpg',
                'dimension' => '',
                'user_id' => auth()->user()->id
            ]);
        }
        return null;
    }
}
