<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;
class CategoryPost extends Component
{
    use WithPagination;

    public $category_name;
    public $pagesize;
    public function mount($category_name)
    {
        $this->category_name=$category_name;
    }

    public function render()
    {
       $category=Category::where("category_name",$this->category_name)->first();
       $category_id=$category->id;
       $posts=Post::where("cat_id",$category_id)->paginate(6);
        return view('livewire.category-post',["posts"=>$posts])->layout("layouts.app");
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
