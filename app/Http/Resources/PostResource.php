<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $title = "";

        $description = "";

        if($request->route()->getName() == "posts.show"){
            $title = $this->getModel()->getTranslations("title");
            $description = $this->getModel()->getTranslations("description");
        }else{
            $title = $this->title;
            $description = $this->description;
        }

        return [
            "id" => $this->id,
            "title" => $title,
            "description" => $description,
            "slug" => $this->slug,
            "images" => ImageResource::collection($this->getMedia("images")),
            "writer" => new UserResource($this->user),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
