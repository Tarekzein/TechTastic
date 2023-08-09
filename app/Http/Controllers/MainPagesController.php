<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class MainPagesController extends Controller
{
    public function home(){
        return view('mainpages.welcome');

    }
    public function blog(){
        return view('mainpages.blog.blog');
    }

    public function portfolio(){
        return view('mainpages.portfolio.portfolio');
    }

    public function singlePost($slug) {
        $post = Post::where("slug", $slug)->first(); // Use first() instead of get()->first()
        $post_categories = PostCategory::where("post_id", $post->id)->get();
        $related_posts = [];

        foreach ($post_categories as $cat) {
            $category_post_ids = PostCategory::where("category_id", $cat->category_id)->where("post_id", "<>", $post->id)->pluck('post_id');

            foreach ($category_post_ids as $pid) {
                $tempPost = Post::find($pid);
                $related_posts[] = $tempPost;
            }
        }

        return view('mainpages.blog.single-post', ["post" => $post, "related_posts" => $related_posts]);
    }

}
