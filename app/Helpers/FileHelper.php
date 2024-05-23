<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\Drivers\Gd\Driver;

class FileHelper
{
    public static function optimizeAndUploadPicture($image, $url, $quality = 80)
    {
        $manager = new ImageManager(Driver::class);
        $newFileName = $image->hashName();
        $image = $manager->read($image);
        $encoded = $image->encode(new WebpEncoder(quality: $quality));

        $newFileName = explode('.', $newFileName)[0] . ".webp";

        $outputPath =  "$url/$newFileName";
        $isUploaded = Storage::disk('public')->put($outputPath, $encoded);

        if (!$isUploaded) {
            if (Storage::disk('public')->exists($outputPath)) {
                Storage::disk('public')->delete($outputPath);
            }

            return redirect()->back()->with([
                'message' => 'Something went wrong, please try again',
                'status' => 'danger',
            ]);
        }

        return $newFileName;
    }

    public static function deleteImage($url, $fileName)
    {
        if (Storage::disk('public')->exists("$url/$fileName")) {
            Storage::disk('public')->delete("$url/$fileName");
        }
    }

    public static function getImage($filePath, $defautImage = 'images/users/default.jpg')
    {
        $url = asset($defautImage);

        if (file_exists(public_path($filePath))) {
            $url = asset($filePath);
        }
        if (Storage::disk('public')->exists($filePath)) {
            $url = Storage::disk('public')->url($filePath);
        }

        return $url;
    }

    public static function getFile($filePath)
    {

        $url = '';

        if (file_exists(public_path($filePath))) {
            $url = asset($filePath);
        }

        if (Storage::disk('public')->exists($filePath)) {
            $url = Storage::disk('public')->url($filePath);
        }

        return $url;
    }
}
