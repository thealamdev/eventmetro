<?php

namespace App\Local;

use App\Enums\Disk;
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

    public static function stores($files, $path, $model, $key)
    {
        foreach ($files as $file) {
            if ($file['image'] !== null) {
                $file['image']->storeAs(path: $path, name: $file['image']->hashName(), options: 'public');
                Image::create([
                    'image_type'    => $model,
                    'image_id'      => $file['id'],
                    'name'          => $file['image']->hashName(),
                    'path'          => $path,
                    'disk'          => Disk::LOCAL->value,
                    'url'           => asset('storage/' . $path . '/' . $file['image']->hashName()),
                    'mime'          => $file['image']->getClientOriginalExtension(),
                    'size'          => $file['image']->getSize(),
                ]);
            }
        }
    }

    public static function process(array $values): void
    {
        Image::create(attributes: $values);
    }
}
