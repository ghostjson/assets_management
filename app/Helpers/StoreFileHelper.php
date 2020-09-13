<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

if (!function_exists('DummyFunction')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function storeFile(UploadedFile $file)
    {
        return Storage::url($file->store('public'));
    }
}
