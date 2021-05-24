<?php

namespace Modules\Brand\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Brand\Entities\Brand;
use Modules\Media\MediaService;

class BrandMediaUploadedJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Brand
     */
    private $brand;
    private $media;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Brand $brand, MediaService $media)
    {
        $this->brand = $brand;
        $this->media = $media;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if(request()->has('attachment')) {
            $this->media->upload($this->brand, request()->file('attachment'));
        }
    }
}
