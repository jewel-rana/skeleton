<?php

namespace Modules\Media\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\CategoryService;
use Modules\Category\Entities\Category;
use Modules\Category\Http\Requests\CategoryCreateRequest;
use Modules\Category\Http\Requests\CategoryUpdateRequest;
use Modules\Media\Entities\Media;
use Modules\Media\Http\Requests\MediaCreateRequest;
use Modules\Media\Http\Requests\MediaUpdateRequest;
use Modules\Media\MediaService;
use Yajra\DataTables\Facades\DataTables;

class MediaController extends Controller
{
    private $medias;

    public function __construct(MediaService $medias)
    {
        $this->medias = $medias;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index( Request $request)
    {
        if($request->wantsJson()) {
            $medias = Media::select(['id', 'attachment', 'type', 'size', 'dimension'])->orderByDesc('created_at');

            return Datatables::of($medias)
                ->addColumn('thumbnail', function($media) {
                    $thumb = ($media->attachment) ? $media->attachment : 'default/brand.jpg';
                    return "<img src='" . asset($thumb) . "' class='table-img' />";
                })
                ->addColumn('action', function($media) {
                    return "<form action='" . route('media.destroy', $media->id) . "' method='POST'>
                        ". csrf_field() . method_field('DELETE') ."
                        <button type='submit' class='btn btn-danger'>Delete</button>
</form>";
                })
                ->rawColumns(['action', 'thumbnail'])->addIndexColumn()
                ->make(true);
        }
        return view('media::index')->withTitle('Medias');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('media::create')->withTitle('Add new media');
    }

    /**
     * Store a newly created resource in storage.
     * @param MediaCreateRequest $request
     * @return JsonResponse
     */
    public function store(MediaCreateRequest $request): JsonResponse
    {
        $data = ['status' => false, 'message' => 'Upload failed'];
        try {
            if (is_executable($request->file('file'))) {
                throw new \Exception('File not allowed to upload');
            }
            $media = $this->medias->handle($request->file('file'));
            $data['status'] = true;
            $data['file'] = $media->attachment;
            dd($data);
        } catch (\Throwable $exception) {
            $data['message'] = $exception->getMessage();
        }

        return response()->json($data);
    }

    /**
     * Show the specified resource.
     * @param Media $media
     * @return Renderable
     */
    public function show(Media $media): Renderable
    {
        return view('media::show', compact('media'))->withTitle('Show media');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Media $media
     * @return Renderable
     */
    public function edit(Media $media): Renderable
    {
        return view('media::edit', compact('media'))->withTitle('Update media');
    }

    /**
     * Update the specified resource in storage.
     * @param MediaUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(MediaUpdateRequest $request, $id): RedirectResponse
    {
        try {
            $this->medias->update($request->validated(), $id);
        } catch (\Throwable $exception) {
            session()->flash('error', $exception->getMessage());
        }

        return redirect()->route('media.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Media $media
     * @return RedirectResponse
     */
    public function destroy(Media $media): RedirectResponse
    {
        if(!auth()->user()->can('media-delete'))
            session()->flash('error', 'You have no right to delete media');

        $media->delete();
        return redirect()->back();
    }

    public function jqUpload(Request $request): JsonResponse
    {
        $data = ['status' => false, 'message' => 'Could not upload'];
        dd($request->allFiles());
        try {
            $this->medias->handle($request->file('attachment'));
        } catch (\Throwable $exception) {
            $data['message'] = $exception->getMessage();
        }
        return response()->json($data);
    }
}
