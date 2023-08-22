<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

//use Carbon\Carbon;

class PostsView extends Component
{
    use WithPagination;
    public $filterCategoriesIds=[];
    protected $posts;
    public function render()
    {
        $this->posts=Post::paginate(10);
        $posts=$this->posts;
        return view('livewire.posts-view', compact('posts'));
    }

    public function postFeaturedToggle(Post $post){
        $post->featured=!$post->featured;
        $post->save();
    }
}
