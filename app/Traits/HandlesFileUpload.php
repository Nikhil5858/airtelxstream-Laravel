<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait HandlesFileUpload
{
    protected function uploadFile(?UploadedFile $file,string $folder,string $prefix = 'file'): ?string {
        if (!$file) {
            return null;
        }

        $filename = uniqid($prefix.'_') . '.' . $file->getClientOriginalExtension();

        $file->move(public_path("assets/$folder"), $filename);

        return $filename;
    }
}
