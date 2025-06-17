<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Http\Resources\ReplyResource;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $user;

    public function __construct()
    {
        $this->user = auth("api")->user();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addComent(Request $request, string $post)
    {
        $post = Post::where("slug", $post)->first();

        if (!$post) {
            return failResponse(__("messages.error.notFound"));
        }

        $validation = validator($request->only(["content"]), [
            "content" => "required|string",
        ]);

        if ($validation->fails()) {
            return failResponse($validation->errors()->first());
        }

        $validation->validated();

        $request->merge(["post_id" => $post->id]);

        $data = $request->only(["content", "post_id"]);

        $comment = $this->user->comments()->create($data);

        return successResponse(__("messages.success.create"), $comment->toResource(CommentResource::class));
    }

    /**
     * Update the specified resource in storage.
     */
    public function reply(Request $request, string $post, string $comment)
    {
        $post = Post::where("slug", $post)->first();

        if (!$post) {
            return failResponse(__("messages.error.notFound"));
        }

        $comment = $post->comments()->where("id", $comment)->first();

        if (!$comment) {
            return failResponse(__("messages.error.notFound"));
        }

        $validation = validator($request->only(["content"]), [
            "content" => "required|string",
        ]);

        if ($validation->fails()) {
            return failResponse($validation->errors()->first());
        }

        $validation->validated();

        $request->merge(["comment_id" => $comment->id]);

        $data = $request->only(["content", "comment_id"]);

        $reply = $this->user->replies()->create($data);

        return successResponse(__("messages.success.create"),$reply->toResource(ReplyResource::class));
    }
}
