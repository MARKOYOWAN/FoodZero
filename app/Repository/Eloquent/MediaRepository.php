<?php

namespace App\Repository\Eloquent;

use App\Repository\MediaRepositoryInterface;
use App\Models\Media;
use Image;

class MediaRepository  implements MediaRepositoryInterface
{

    /**
     * Insert image category
     */

    public function addStandardImages($id, $files, $name_file, $id_name)
    {
        $data = [];
        $path = $this->uploadImage($files, $name_file);
        $data[] = [
            $id_name => $id,
            'path' => $path,
        ];
        return Media::insert($data);
    }


    private function uploadImage($file, $directoryName)
    {
        $imageName = $this->generateRandomString() . ".jpg";

        $this->saveImage($file, $directoryName, $imageName, 'original');

        return $directoryName . "/" . $imageName;
    }


    private function generateRandomString($length = 32)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    private function saveImage($file, $directory, $fileName, $type = 'original', $width = 100, $heigth = 100)
    {
        $originalPath = $this->getStorePath($directory, $type);
        $originalImg = Image::make($file->getRealPath());
        $originalImgJpg = $originalImg->encode('jpg');

        if (!file_exists($originalPath)) {
            mkdir($originalPath, 0777, true);
        }

        file_put_contents($originalPath . "/" . $fileName, $originalImgJpg);
    }



    private function getStorePath($directoryName, $fileType)
    {
        return storage_path("app/" . $directoryName . "/" . $fileType);
    }
}
