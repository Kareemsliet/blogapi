<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "content" => $this->content,
            "user" => new UserResource($this->user),
            "comment" => new CommentResource($this->comment),
            "created_at" => $this->created_at,
        ];
    }
}
