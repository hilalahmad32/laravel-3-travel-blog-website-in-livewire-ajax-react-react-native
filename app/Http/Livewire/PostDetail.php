<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class PostDetail extends Component
{
    public $postsDetail;
    public $posts;
    public $categorys;
    public $title;
    public $likesPost;
    public $likes;
    public $total_likes;
    public $love;
    public $angry;
    public $sad;
    public $comments;
    public $total_comments;

    public $name;
    public $comment;
    public function mount($title)
    {
       $this->title=$title;
    }
    public function render()
    {
        $this->postsDetail=Post::where("title",$this->title)->first();
        $this->posts=Post::orderBy('id','DESC')->limit(5)->get();
        $this->categorys=Category::orderBy('id','DESC')->where('posts',">",0)->get();
        $this->likesPost=Post::where("title",$this->title)->first();
        $post_id=$this->likesPost->id;
        $this->comments=Comment::orderBy("id","DESC")->where("post_id",$post_id)->get();
        $this->total_comments=Comment::where("post_id",$post_id)->get();
        $this->total_likes=Like::where("post_id",$post_id)->get();
        $this->likes=Like::where("post_id",$post_id)->sum("likes");
        $this->angry=Like::where("post_id",$post_id)->sum("angry");
        $this->sad=Like::where("post_id",$post_id)->sum("sad");
        $this->love=Like::where("post_id",$post_id)->sum("love");

        return view('livewire.post-detail')->layout("layouts.app");
    }

    public function update($id){
        $posts=Post::find($id);
        // dd($posts);
        $views=$posts->views+1;
        // dd($views);
        $posts->views=$views;
        $posts->save();
    }

    public function likes($id)
    {
        $likes=Like::where(["post_id"=>$id,"ip"=>Request::ip()])->first();
        if($likes){
            $likes->delete();
        }else{
            $newLikes=new Like();
            $newLikes->post_id=$id;
            $newLikes->likes=1;
            $newLikes->ip=Request::ip();
            $newLikes->save();
        }
    }
    public function love($id)
    {
        $likes=Like::where(["post_id"=>$id,"ip"=>Request::ip()])->first();
        if($likes){
            $likes->delete();
        }else{
            $newLikes=new Like();
            $newLikes->post_id=$id;
            $newLikes->love=1;
            $newLikes->ip=Request::ip();
            $newLikes->save();
        }
    }
    public function sad($id)
    {
        $likes=Like::where(["post_id"=>$id,"ip"=>Request::ip()])->first();
        if($likes){
            $likes->delete();
        }else{
            $newLikes=new Like();
            $newLikes->post_id=$id;
            $newLikes->sad=1;
            $newLikes->ip=Request::ip();
            $newLikes->save();
        }
    }
    public function angry($id)
    {
        $likes=Like::where(["post_id"=>$id,"ip"=>Request::ip()])->first();
        if($likes){
            $likes->delete();
        }else{
            $newLikes=new Like();
            $newLikes->post_id=$id;
            $newLikes->angry=1;
            $newLikes->ip=Request::ip();
            $newLikes->save();
        }
    }

    public function resetField()
    {
        $this->name="";
        $this->comment="";
    }

    public function comment($id)
    {
        $this->validate([
            "name"=>"required",
            "comment"=>"required"
        ]);
       $comment=new Comment();
       $comment->post_id=$id;
       $comment->name=$this->name;
       $comment->comment=$this->comment;
       $comment->save();
       $this->resetField();
    }
}
