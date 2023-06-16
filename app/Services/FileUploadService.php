<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileUploadService
{

    /**
     * Undocumented function
     *
     * @param \Illuminate\Http\UploadedFile $file The file to upload.
     * @param array $allowedTypes The file types/extensions that are allowed
     * @param string $directory The directory to store the file in
     * @return void
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
        $newFileName = pathinfo($fileName, PATHINFO_FILENAME) . '_' . $uniqueReference . '.' . $extension;

        // Store the file in the specified directory
        $path = $file->storeAs($directory, $newFileName, 'public');

        // Return the file path
        return $path;
    }
}
