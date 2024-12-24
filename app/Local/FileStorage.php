<?php

namespace App\Local;

use App\Models\Image;
use Illuminate\Http\UploadedFile;

trait FileStorage
{
    use FileUpload;

    public static function store($file, $path, $model, $key): mixed
    {
        $isUpload = FileUpload::upload(file: $file, path: $path, model: $model, key: $key);
        return $isUpload ? self::process($isUpload) : false;
    }

    public static function process(array $values): void
    {
        Image::create(attributes: $values);
    }
}
