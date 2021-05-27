<?php

namespace Modules\Slider\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Media\MediaService;
use Modules\Slider\Entities\Slider;

class SlidUploadJob
{
    use Dispatchable;

    /**
     * @var MediaService
     */
    private $media;
    private $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, MediaService $mediaService)
    {
        $this->media = $mediaService;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if(request()->has('attachment')) {
            $media = $this->media->upload(request()->file('attachment'));
            Slider::find($this->data['slider_id'])->medias()->attach($media->id,
                [
                    'title' => $this->data['title'],
                    'description' => $this->data['description'],
                    'btn_text' => $this->data['btn_text'],
                    'btn_link' => $this->data['btn_link']
                ]
            );
        }
    }
}
