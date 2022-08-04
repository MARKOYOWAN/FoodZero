<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\MediaRepositoryInterface;
use Illuminate\Support\Facades\File;
class MediaController extends Controller
{
    private $mediaRepository;

    public function __construct(MediaRepositoryInterface $mediaRepository)
    {
        $this->middleware('auth:api', ['except' => ['getMedia']]);
        $this->mediaRepository = $mediaRepository;
    }



    public function getMedia($type, Request $request) {
        $filename = str_replace("/api/media/", "", $request->getRequestUri());
        $path = storage_path('app/' . $filename); 
        $file = File::get($path);
        $type = File::mimeType($path);

        $response = response($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
