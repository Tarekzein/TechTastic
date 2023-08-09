<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;

    public function comment(){
        return $this->belongsTo(Comment::class,"comment_id");
    }
    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }
}
