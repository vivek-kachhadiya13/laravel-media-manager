<?php

namespace Webelightdev\LaravelMediaManager\src\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManagerStatic as Images;
use Webelightdev\LaravelMediaManager\src\Helpers\HelperFile;

class Image {
	public function storeMedia($media, $storage)
	{
        $mediaName = HelperFile::getCurrentTimeStemp().'_'.$media['file']->getClientOriginalName();
        $mediaType = $media['file']->getMimeType();
        $path = $media['directory'].'/images/';
        $newImage = Images::make($media['file']);
        $newImage->backup();
        $newImage->reset()->resize($media['imageVarients']['img_width'], $media['imageVarients']['img_height'], function ($constraint) {
                   $constraint->aspectRatio();
        });
        if(array_has($media['imageVarients'], 'include_canvas') && $media['imageVarients']['include_canvas'] == 1){
            $newImage->resizeCanvas($media['imageVarients']['img_canvas_width'], $media['imageVarients']['img_canvas_height'], 'center', false, $media['imageVarients']['img_canvas_color']);
        }
        $newImage->save();
        $storage->put($path.$mediaName, $newImage);
        return $mediaData = array('media_name' => $mediaName, 'mime_type'=> $mediaType, 'path'=> $path);
	}
}
