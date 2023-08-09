<?php

namespace App\Http\Livewire\Comment;

use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Post;
use Livewire\Component;

class PostComment extends Component
{
    public $comments;
    public $post_id;
    public $comment;

    public $reply;
    public $comment_id;

    protected $rules = [
        'comment.comment' => 'required',
        'reply.comment' => 'required',

    ];

    public function mount(){
        $this->comment = new Comment();
        $this->reply = new CommentReply();
    }


//  Comment
    public function commentCreate(){
        $this->validate();
        $this->comment->post_id=$this->post_id;
        $this->comment->user_id =auth()->id();
        $this->comment->save();
        $this->reset(["comment"]);

    }

    public function deleteComment(Comment $comment){
        $comment->delete();
    }

//    Reply
    public function commentReply($comment_id){
        $this->validate([
            'reply.comment' => 'required',
        ]);
        $this->reply->comment_id=$comment_id;
        $this->reply->user_id =auth()->id();
        $this->reply->save();
        $this->reset(["reply"]);

    }

    public function deleteReply(CommentReply $reply){
        $reply->delete();
    }

    public function render()
    {
        $this->comments=Post::find($this->post_id)->comments()->get();

        return view('livewire.comment.post-comment');
    }


}
