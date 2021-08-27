<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{
    // public $posts;
    use WithPagination;

    public function render()
    {
        $posts=Post::orderBy('id','DESC')->paginate(9);
        return view('livewire.blog',["posts"=>$posts])->layout("layouts.app");
    }
    
    public function update($id){
        $posts=Post::find($id);
        // dd($posts);
        $views=$posts->views+1;
        // dd($views);
        $posts->views=$views;
        $posts->save();
    }
}
