<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Post as ModelsPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Post extends Component
{
    // file upload function
    use WithFileUploads;
    // variable for insert
    public $categorys;
    public $title;
    public $cat_id;
    public $description;
    public $image;

    public $post_count;
    // public $category_id;
    // variable for search
    public $searchTerm;

    // variable for update
    public $edit_ids;
    public $edit_title;
    public $edit_cat_id;
    public $old_cat_id;
    public $edit_description;
    public $new_image;
    public $old_image;

    use WithPagination;
    public function render()
    {
        if (Auth::user()->roll == 1) {
            $search = '%' . $this->searchTerm . '%';
            $posts = ModelsPost::orderBy("id", 'DESC')->where("title", 'LIKE', $search)->paginate(3);
        } else {
            $search = '%' . $this->searchTerm . '%';
            $posts = ModelsPost::orderBy("id", 'DESC')->where(['user_id'=>Auth::user()->id])->paginate(3);
        }
        $this->categorys = Category::orderBy("id", "DESC")->get();
        $this->post_count = ModelsPost::all();
        return view('livewire.admin.post', ['posts' => $posts])->layout('layouts.admin');
    }


    public function resetField()
    {
        $this->title = "";
        $this->cat_id = "";
        $this->description = "";
        $this->image = "";
        $this->edit_ids = "";
        $this->edit_title = "";
        $this->edit_cat_id = "";
        $this->edit_description = "";
        $this->new_image = "";
        $this->old_image = "";
    }

    public function store()
    {
        $categorys = Category::find($this->cat_id);
        $posts = new ModelsPost();
        $this->validate([
            "title" => "required",
            "description" => "required",
            "categorys" => "required",
        ]);
        $filename = "";
        if ($this->image != null) {
            $filename = $this->image->store("upload/posts", "public");
        }
        $posts->title = $this->title;
        $posts->user_id = Auth::user()->id;
        $posts->description = $this->description;
        $posts->cat_id = $this->cat_id;
        $posts->image = $filename;
        $categorys->posts = $categorys->posts + 1;
        $categorys->save();
        $result = $posts->save();
        if ($result) {
            session()->flash("success", "Post Update Successfully");
            // $this->emit("addcategory");
            $this->resetField();
        } else {
            session()->flash("error", "Something wroing");
        }
    }

    public function edit($id)
    {
        $posts = ModelsPost::find($id);
        $this->edit_ids = $id;
        $this->edit_title = $posts->title;
        $this->edit_cat_id = $posts->cat_id;
        $this->old_cat_id = $posts->cat_id;
        $this->edit_description = $posts->description;
        $this->old_image = $posts->image;
        // dd($posts->image);
    }

    public function update()
    {
        $posts = ModelsPost::find($this->edit_ids);
        if ($this->old_cat_id != $this->edit_cat_id) {
            $categorys = Category::find($this->old_cat_id);
            $categorys->posts = $categorys->posts - 1;
            $categorys->save();
            $new_categorys = Category::find($this->edit_cat_id);
            $new_categorys->posts = $new_categorys->posts + 1;
            $new_categorys->save();
        }
        $this->validate([
            "edit_title"=>"required",
            "edit_description"=>"required",
        ]);
        $destination = public_path("storage\\" . $posts->image);
        if ($this->new_image != null) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $new_filename = $this->new_image->store("upload/posts", "public");
            $posts->image = $new_filename;
        } else {
            $old_filename = $this->old_image;
            $posts->image = $old_filename;
        }

        $posts->title = $this->edit_title;
        $posts->description = $this->edit_description;
        $posts->cat_id = $this->edit_cat_id;
        $result = $posts->save();
        if ($result) {
            session()->flash("success", "Post Update Successfully");
            // $this->emit("addcategory");
            $this->resetField();
        } else {
            session()->flash("error", "Something wroing");
        }
    }


    public function delete($id)
    {
        $posts = ModelsPost::find($id);
        $category_id = $posts->cat_id;
        $categorys = Category::find($category_id);
        $categorys->posts = $categorys->posts - 1;
        $categorys->save();
        $destination = public_path("storage\\" . $posts->image);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $result = $posts->delete();
    }
}
