<?php

namespace App\Local;

use App\Enums\Bucket;
use App\Enums\Disk;
use Illuminate\Http\UploadedFile;

trait FileUpload
{
    public static function upload($file, $path, $model, $key): array
    {
        $file->storeAs(path: $path, name: $file->hashName(), options: 'public');
        return [
            'image_type'    => $model,
            'image_id'      => $key,
            'name'          => $file->hashName(),
            'path'          => $path,
            'disk'          => Disk::LOCAL->value,
            'url'           => asset('storage/' . $path . '/' . $file->hashName()),
            'mime'          => $file->getClientOriginalExtension(),
            'size'          => $file->getSize(),
        ];
    }
}
