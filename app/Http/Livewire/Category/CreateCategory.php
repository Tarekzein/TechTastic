<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateCategory extends Component
{
    public $category;

    protected $rules = [
        'category.category' => 'required',
    ];

    public function mount(){
        $this->category=new Category();
    }

    public function saveCategory(){
        $this->validate();
        $this->category->slug = Str::slug($this->category->category) . '-' . Str::random(6);
        $this->category->save();

    }

    public function render()
    {
        return view('livewire.category.create-category');
    }
}
