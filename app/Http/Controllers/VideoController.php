<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Morilog\Jalali\Jalalian;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    private $valid_models = [
        'movies' => Movie::class,
        'episodes' => Episode::class
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        [$quality, $model, $id] = [request('quality'), request('model'), request('id')];
        $item = $model::findOrFail($id);
        $model = $model == Movie::class ? 'movies' : 'episodes';
        return view('admin.upload-video', compact('quality', 'id', 'item', 'model'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): array
    {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            throw new \Exception("Error Processing Request", 1);
        }
        // receive file
        $fileReceived = $receiver->receive();

        if ($fileReceived->isFinished()) {
            $file = $fileReceived->getFile();

            $extension = $file->getClientOriginalExtension();
            $fileName = $request->quality . '.' . $extension;

            $disk = Storage::disk('videos');
            $jalaliDate = Jalalian::forge(time());
            $item = $this->valid_models[$request->model]::findOrFail($request->id);
            $path = $jalaliDate->getYear() . '/' . $request->model == 'episodes' ? $item->title : $item->fa_title;
            $path = $disk->putFileAs($path, $file, $fileName);

            // delete chunked file
            unlink($file->getPathname());

            $finalFilePath = "videos/" . $path;

            if ($videoItem = $item->videosable->where('quality', $request->quality)->first()) {
                $videoItem->update([
                    'video' => $finalFilePath
                ]);
            } else {
                $item->videosable()->create([
                    'videosable_id' => $request->id,
                    'videosable_type' => $this->valid_models[$request->model],
                    'video' => $finalFilePath,
                    'quality' => $request->quality
                ]);
            }

            $videoFullAddress = asset($finalFilePath);

            return [
                'path' => $videoFullAddress,
                'filename' => $fileName,
            ];
        }

        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }
}