<?php

namespace App\Service;

use Cloudinary\Cloudinary;

class CloudinaryService
{
    private $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud_name' => $_ENV['CLOUDINARY_CLOUD_NAME'],
            'api_key'    => $_ENV['CLOUDINARY_API_KEY'],
            'api_secret' => $_ENV['CLOUDINARY_API_SECRET'],
        ]);
    }

    public function uploadImage($imageFile): string
    {
       

        $response = $this->cloudinary->uploadApi()->upload($imageFile, [
            'folder' => 'symfony_app',
        ]);

        return $response['secure_url'];
    }
}