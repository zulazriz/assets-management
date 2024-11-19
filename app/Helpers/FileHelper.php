<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class FileHelper
{
    // static function getUrlFile(string|TemporaryUploadedFile|null $file_name): ?string
    // {
    //     if (is_string($file_name)) {
    //         return url('/storage/uploads/' . $file_name);
    //     } else if (is_a($file_name, TemporaryUploadedFile::class)) {
    //         return $file_name->temporaryUrl();
    //     }
    //     return null;
    // }

    static function getUrlFile(string|TemporaryUploadedFile|null $file_name): ?string
    {
        if (is_string($file_name)) {
            if (str_ends_with($file_name, '.xls') || str_ends_with($file_name, '.xlsx')) {
                $path = 'csv/' . $file_name;
            } else {
                $path = 'storage/uploads/' . $file_name;
            }

            $fullPath = public_path($path);

            if (file_exists($fullPath)) {
                return url($path);
            } else {
                return null;
            }
        } elseif (is_a($file_name, TemporaryUploadedFile::class)) {
            return $file_name->temporaryUrl();
        }

        return null;
    }

    static function saveFile(UploadedFile $file, ?string $name = null): string
    {
        $upload_path = public_path('storage/uploads');

        if (!file_exists($upload_path)) {
            mkdir($upload_path, recursive: true);
        }

        $current_file_name = sprintf('%s-%s.%s', now()->timestamp, ($name ?? pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)), $file->getClientOriginalExtension());
        $file->storeAs('/storage/uploads', $current_file_name, 'public');
        return $current_file_name;
    }

    static function sanitize(string $string): string
    {
        $string = preg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $string);
        return $string;
    }

    static function getTempPath(string $filename = ""): string
    {
        $temp_path = storage_path('app/temp');
        if (!file_exists($temp_path)) {
            mkdir($temp_path);
        }
        return $temp_path . '/' . $filename;
    }

    static function getRealFileName(string|TemporaryUploadedFile|null $file_name): ?string
    {
        if (is_string($file_name)) {
            $string_array = explode('-', $file_name, 2);
            return $string_array[1] ?? $file_name;
        } else if (is_a($file_name, TemporaryUploadedFile::class)) {
            return $file_name->getClientOriginalName();
        }
        return null;
    }

    static function getFileContentType(?string $filename): ?string
    {
        try {
            return mime_content_type(public_path('storage/uploads/' . $filename));
        } catch (\Throwable $th) {
            return null;
        }
    }

    static function getBaseName(?string $path): ?string
    {
        if ($path) {
            return pathinfo($path, PATHINFO_BASENAME);
        }
        return null;
    }
}
