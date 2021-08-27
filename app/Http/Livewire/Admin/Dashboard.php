<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class Dashboard extends Component
{
    public $posts;
    public $comments;
    public $likes;
    public $categorys;
    public function render()
    {
        $this->posts=Post::all();
        $this->comments=Comment::all();
        $this->likes=Like::all();
        $this->categorys=Category::all();
        return view('livewire.admin.dashboard')->layout("layouts.admin");
    }
}
