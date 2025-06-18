<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collection\PostsCollection;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public $user;

    public function __construct(){
        $this->user = auth("api")->user();
    }

    public function profile(Request $request)
    {
        $user = $this->user;

        return successResponse(data: $user->toResource(UserResource::class));
    }

    public function myPosts(Request $request)
    {
        $user = $this->user;

        $posts = $user->posts()->orderByDesc("created_at")->paginate(10);

        return successResponse(data: new PostsCollection($posts));
    }

}
