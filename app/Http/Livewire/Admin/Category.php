<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category as ModelsCategory;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Category extends Component
{
    // for upload file 
    use WithFileUploads;
    
    // variable for insert
    public $category_name;
    public $image;
    public $total_category;

    // variable for search

    public $searchTerm;

    // variable for update

    public $edit_category_id;
    public $edit_category_name;
    public $new_image;
    public $old_image;

    use WithPagination;
    public function render()
    {
        $term='%'.$this->searchTerm.'%';
        $categorys = ModelsCategory::orderBy("id", "DESC")->where('category_name',"LIKE",$term)->paginate(3);
        $this->total_category=ModelsCategory::all();
        return view('livewire.admin.category', ["categorys" => $categorys])->layout("layouts.admin");
    }

    public function resetField()
    {
        $this->category_name = "";
        $this->image = "";
        $this->edit_category_name = "";
        $this->new_image = "";
        $this->old_image = "";
    }

    public function store()
    {
        $categorys = new ModelsCategory();

        $category = $this->validate([
            "category_name" => "required",
            
        ]);
        $filename="";
        if($this->image!=""){
            $filename = $this->image->store("upload", "public");
        }
        $categorys->category_name = $this->category_name;
        $categorys->image = $filename;
        $categorys->posts = 0;
        $result = $categorys->save();
        if($result){
            session()->flash("success","Category Add Successfully");
        $this->emit("addcategory");
        $this->resetField();

        }else{
            session()->flash("error","Something wroing");
        }
        // if($result)
    }

    public function edit($id)
    {
        $edit_category = ModelsCategory::find($id);
        $this->edit_category_id = $edit_category->id;
        $this->edit_category_name = $edit_category->category_name;
        $this->old_image = $edit_category->image;
    }

    public function update()
    {
        if ($this->edit_category_id) {
            $update = ModelsCategory::find($this->edit_category_id);
            $this->validate([
                "edit_category_name"=>"required",
            ]);
            $destination = public_path("storage\\" . $update->image);
            if ($this->new_image != null) {
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $new_filename = $this->new_image->store("upload", "public");
                $update->image = $new_filename;
            } else {
                $old_image = $this->old_image;
                $update->image = $old_image;
            }

            $update->category_name = $this->edit_category_name;
            $result = $update->save();
            if($result){
                session()->flash("success","Category Add Successfully");
            $this->resetField();
    
            }else{
                session()->flash("error","Something wroing");
            }
        }
    }

    public function delete($id)
    {
        if($this->id){
            $category=ModelsCategory::find($id);
            $destination=public_path("storage\\".$category->image);
            if(File::exists($destination)){
               File::delete($destination);
            }
            $result=$category->delete();
            if($result){
                session()->flash("success","Category Add Successfully");
            }else{
                session()->flash("error","Something wroing");
            }
        }
    }
}
