<?php

namespace App\Http\Resources;

use App\Http\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "file_name" => $this->file_name,
            "name" => $this->name,
            "uuid" => $this->uuid,
            "extension" => $this->extension,
            "size" => $this->size,
            "url" => ImageService::make($this->original_url)->toBase64(),
        ];
    }
}
