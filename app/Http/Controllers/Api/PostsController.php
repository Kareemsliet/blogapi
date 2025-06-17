<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PostRequest;
use App\Http\Resources\Collection\PostsCollection;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $user;

    public function __construct()
    {
        $this->user = auth("api")->user();
    }

    public function index(Request $request)
    {
        $search = $request->query("q", "");

        $limit = $request->query("limit", 10);

        $posts = $this->user->posts()->where("title", "like", "%$search%")->orderByDesc("updated_at")->paginate($limit);

        return successResponse(data: new PostsCollection($posts));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $request->validated();

        $data = $request->only(["title", "description"]);

        $post = $this->user->posts()->create($data);

        if ($request->images && count($request->images) > 0) {
            collect($request->images)->map(function ($image) use ($post) {
                $post->addMedia($image)->toMediaCollection("images");
            });
        }

        return successResponse(__("messages.success.create"), $post->toResource(PostResource::class));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post = $this->user->posts()->where("slug", $slug)->first();

        if (!$post) {
            return failResponse(__("messages.error.notFound"));
        }

        return successResponse(data: $post->toResource(PostResource::class));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $slug)
    {
        $post = $this->user->posts()->where("slug", $slug)->first();

        if (!$post) {
            return failResponse(__("messages.error.notFound"));
        }

        $request->validated();

        $data = $request->only(["title", "description"]);

        $post->clearMediaCollection("images");

        $post->update($data);

        if ($request->images && count($request->images) > 0) {
            collect($request->images)->map(function ($image) use ($post) {
                $post->addMedia($image)->toMediaCollection("images");
            });
        }

        return successResponse(__("messages.success.update"), $post->toResource(PostResource::class));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $post = $this->user->posts()->where("slug", $slug)->first();

        if (!$post) {
            return failResponse(__("messages.error.notFound"));
        }

        $post->clearMediaCollection("images");

        $post->delete();

        return successResponse(__("messages.success.delete"));
    }
}
