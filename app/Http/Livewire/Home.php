<?php

namespace App\Http\Livewire;

use App\Models\About;
use Livewire\Component;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Subscribe;

class Home extends Component
{
    public $categorys;
    public $posts;
    public $email;
    public $total_likes;
    public $total_comments;
   

    public function render()
    {   
        $this->total_likes=Like::all();
        $this->total_comments=Comment::all();
        $this->categorys=Category::orderBy("id","DESC")->limit(6)->get();
        $this->posts=Post::orderBy("id","DESC")->limit(6)->get();


        return view('livewire.home')->layout("layouts.app");
    }

    public function resetField()
    {
        $this->email="";
    }

    public function submit()
    {
        $this->validate([
            "email"=>"required",
        ]);
       $sub=new Subscribe();
       $is_email=Subscribe::where("subscribe",'=',$this->email)->first();
       if($is_email){
           session()->flash("error","This Email already Exist");
       }else{
        $sub->subscribe=$this->email;
        $result=$sub->save();
        if($result){
            session()->flash("success","Subscribe");
            $this->resetField();
        }else{
            session()->flash("error","something woring");
        }
       }
    }

     public function update($id){
        $posts=Post::find($id);
        $views=$posts->views+1;
        $posts->views=$views;
        $posts->save();
    }
}
