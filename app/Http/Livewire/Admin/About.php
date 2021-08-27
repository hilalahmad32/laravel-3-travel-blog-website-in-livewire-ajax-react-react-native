<?php

namespace App\Http\Livewire\Admin;

use App\Models\About as ModelsAbout;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class About extends Component
{
    // for upload file 
    use WithFileUploads;

    // variable for insert
    public $about;
    public $image;
    public $total_about;

    // variable for search

    public $searchTerm;

    // variable for update


    public $edit_about_id;
    public $edit_about_des;
    public $new_image;
    public $old_image;
    public function render()
    {
        $term = '%' . $this->searchTerm . '%';
        $abouts = ModelsAbout::orderBy("id", "DESC")->where('about_des', "LIKE", $term)->paginate(3);
        $this->total_about = ModelsAbout::all();
        return view('livewire.admin.about', ["abouts" => $abouts])->layout("layouts.admin");
    }

    public function resetField()
    {
        $this->about = "";
        $this->image = "";
        $this->edit_about_des = "";
        $this->new_image = "";
        $this->old_image = "";
    }

    public function store()
    {
        $abouts = new ModelsAbout();

        $this->validate([
            "about" => "required",

        ]);
        $is_about = ModelsAbout::all();
        if (count($is_about) > 0) {
            session()->flash("success", "Category Add Successfully");
        } else {
            $filename = "";
            if ($this->image != "") {
                $filename = $this->image->store("upload/about", "public");
            }
            $abouts->about_des = $this->about;
            $abouts->about_image = $filename;
            $result = $abouts->save();
            if ($result) {
                session()->flash("success", "Category Add Successfully");
                $this->emit("addcategory");
                $this->resetField();
            } else {
                session()->flash("error", "Something wroing");
            }
        }

        // if($result)
    }

    public function edit($id)
    {
        $edit_about= ModelsAbout::find($id);
        $this->edit_about_id = $edit_about->id;
        $this->edit_about_des = $edit_about->about_des;
        $this->old_image = $edit_about->about_image;
    }

    public function update()
    {
        if ($this->edit_about_id) {
            $update = ModelsAbout::find($this->edit_about_id);
            $this->validate([
                "edit_about_des"=>"required",
            ]);
            $destination = public_path("storage\\" . $update->about_image);
            if ($this->new_image != null) {
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $new_filename = $this->new_image->store("upload/about", "public");
                $update->about_image = $new_filename;
            } else {
                $old_image = $this->old_image;
                $update->about_image = $old_image;
            }

            $update->about_des = $this->edit_about_des;
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
            $about=ModelsAbout::find($id);
            $destination=public_path("storage\\".$about->about_image);
            if(File::exists($destination)){
               File::delete($destination);
            }
            $result=$about->delete();
            if($result){
                session()->flash("success","Category Add Successfully");
            }else{
                session()->flash("error","Something wroing");
            }
        }
    }

}
