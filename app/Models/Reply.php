<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = "replies";

    protected $fillable = ["content", "user_id", "comment_id"];

    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }

    public function comment(){
        return $this->belongsTo(Comment::class,"comment_id");
    }

}
