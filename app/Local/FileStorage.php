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

    public static function stores($file, $path, $model, $key)
    {
        foreach ($file as $f) {
            $f['image']->storeAs(path: $path, name: $f['image']->hashName(), options: 'public');
            Image::create([
                'image_type'    => $model,
                'image_id'      => $f['id'],
                'name'          => $f['image']->hashName(),
                'path'          => $path,
                'disk'          => Disk::LOCAL->value,
                'url'           => asset('storage/' . $path . '/' . $f['image']->hashName()),
                'mime'          => $f['image']->getClientOriginalExtension(),
                'size'          => $f['image']->getSize(),
            ]);
        }
    }

    public static function process(array $values): void
    {
        Image::create(attributes: $values);
    }
}
