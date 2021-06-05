<?php

namespace Modules\Slider\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Media\MediaService;
use Modules\Slider\Entities\Slider;

class SliderMediaUploadJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var MediaService
     */
    private $media;
    /**
     * @var Slider
     */
    private $slider;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Slider $slider, MediaService $mediaService)
    {
        $this->slider = $slider;
        $this->media = $mediaService;
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
            $this->slider->medias()->attach($media->id);
        }
    }
}
