<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collection\PostsCollection;
use App\Http\Resources\CommentResource;
use App\Http\Resources\ReplyResource;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function allPosts(Request $request)
    {
        $limit = $request->query("limit", 10);

        $posts = Post::orderByDesc("created_at")->paginate($limit);

        return successResponse(data: new PostsCollection($posts));
    }

    public function comments(Request $request, string $post)
    {
        $post = Post::where("slug", $post)->first();

        if (!$post) {
            return failResponse(__("messages.error.notFound"));
        }

        $comments = $post->comments()->orderByDesc("created_at")->get();

        return successResponse(data: $comments->toResourceCollection(CommentResource::class));
    }

    public function replies(Request $request, string $post, string $comment)
    {
        $post = Post::where("slug", $post)->first();

        if (!$post) {
            return failResponse(__("messages.error.notFound"));
        }

        $comment = $post->comments()->where("id", $comment)->first();

        if (!$comment) {
            return failResponse(__("messages.error.notFound"));
        }

        $replies = $comment->replies()->orderByDesc("created_at")->get();

        return successResponse(data: $replies->toResourceCollection(ReplyResource::class));
    }
}
