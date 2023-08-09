<?php

namespace App\Http\Livewire\Blog;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Component;

class ShowBlogPosts extends Component
{
    public $posts;
    public $categories;
    public $selectedCategories=[];

    protected $rules=[
      'selectedCategories.*'=>'required'
    ];

    public function render()
    {
        if(count($this->selectedCategories)==0){
            $this->posts=Post::all();

        }
        else{
            $this->posts=[];
            foreach ($this->selectedCategories as $cat){
                $category=Category::find($cat);
                $posts=$category->posts()->get();
                foreach ($posts as $post){
                    $this->posts[]=$post;
                }
            }
        }
        $this->categories=Category::all();
        return view('livewire.blog.show-blog-posts');
    }
}
