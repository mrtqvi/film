<?php

namespace App\Http\Controllers;

use App\Models\Teaser;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Illuminate\Support\Facades\Storage;

class TeaserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request): array
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
            $fileName = time() . '.' . $extension;

            $disk = Storage::disk('teasers');
            $jalaliDate = Jalalian::forge(time());
            $path = $jalaliDate->getYear() . '/' . $jalaliDate->getMonth() . '/' . $jalaliDate->getDay();
            $path = $disk->putFileAs($path, $file, $fileName);

            // delete chunked file
            unlink($file->getPathname());

            $finalFilePath = "teasers/" . $path;

            Teaser::create([
                'teaser' => $finalFilePath
            ]);
            
            $teaserFullAddress = asset($finalFilePath);
            
            return [
                'path' => $teaserFullAddress,
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
