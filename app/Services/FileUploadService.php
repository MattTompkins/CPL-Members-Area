<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class FileUploadService
{
    /**
     * Upload File
     *
     * @param \Illuminate\Http\UploadedFile $file The file to upload.
     * @param array $allowedTypes The file types/extensions that are allowed.
     * @param string $directory The directory to store the file in.
     * @return string|null The full URL of the uploaded file or null if upload fails.
     * @throws \Exception If an invalid file type is encountered.
     */
    public static function uploadFile($file, $allowedTypes, $directory)
    {
        // Validate file type
        $extension = $file->getClientOriginalExtension();
        if (!in_array($extension, $allowedTypes)) {
            throw new \Exception('Invalid file type. Allowed types are: ' . implode(', ', $allowedTypes));
        }

        // Generate a unique reference for the file
        $uniqueReference = uniqid();
        $fileName = $file->getClientOriginalName();
        $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);
        $newFileName = $fileNameWithoutExtension . '_' . $uniqueReference . '.' . $extension;

        // Store the file in the specified directory
        $path = $file->storeAs($directory, $newFileName, 'public');
        $url = Storage::exists($path) ? config('app.url') . Storage::url($path) : null;

        return $url;
    }
}

