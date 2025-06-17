<?php

namespace App\Http\Services;

use GuzzleHttp\Client;

class ImageService
{
    public $imageUrl;

    public function __construct(string $imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    public static function make($imageUrl)
    {
        return new static($imageUrl);
    }

    public function toBase64()
    {
        $client = new Client();

        $response = $client->get($this->imageUrl);

        $imageContent = $response->getBody()->getContents();

        $contentType = $response->getHeader('Content-Type')[0];

        $extension = explode('/', $contentType)[1]; // Get the image extension

        $imageBase64 = base64_encode($imageContent);

        $dataUri = "data:image/{$extension};base64,{$imageBase64}";

        return $dataUri;
    }
}