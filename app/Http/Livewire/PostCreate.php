<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostCreate extends Component
{
    use WithFileUploads;

    public $saveSuccess = false;
    public $post;
    public $categories=[];
    public $image;
    public $allcategories;
    public $category;

    protected $rules = [
        'post.title' => 'required|min:6',
        'post.body' => 'required|min:6',
        'image' => 'image|max:1024',
        'categories.*'=>'required',
    ];

    public function mount(){
        $this->post = new Post();
    }

    public function savePost(){
        $this->validate();

        $this->post->user_id =auth()->id();
        $this->post->slug = Str::slug($this->post->title) . '-' . Str::random(6);

        if ($this->image) {

            $photoname = $this->image->getClientOriginalName();

            $path = $this->image->store('public/blog/images');

            // Remove the 'public/' prefix from the path
            $path = str_replace('public/', '', $path);

            $this->post->image = $path;
        }

        $this->post->save();
        if(count($this->categories)==0){
            $this->categories=['1'];
        }
        foreach ($this->categories as $cat){
            PostCategory::create([
               'post_id'=>$this->post->id,
               'category_id'=>$cat,
            ]);
        }


        $this->reset();
        $this->saveSuccess = true;
    }


    public function render()
    {
        $this->allcategories=Category::all();

        return view('livewire.post-create');
    }
}
