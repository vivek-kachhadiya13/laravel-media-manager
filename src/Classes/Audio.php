<?php

namespace Webelightdev\LaravelMediaManager\src\Classes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class Audio {
    public function storeMedia($media, $storage)
    {
        $mediaName = $media['file']->getClientOriginalName();
        $path = $media['directory'].'/audio/';
        $storage->put($path.$mediaName, File::get($media['file']));
    }
}