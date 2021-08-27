<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Admins extends Component
{

    use WithFileUploads;
    use WithPagination;


    public $admin;
    public $ids;
    public $name;
    public $email;
    public $roll;
    public $password;
    public $new_image;
    public $old_image;
    public $searchTerm;

    public $total_admins;

    public function render()
    {
        $search = '%' . $this->searchTerm . '%';
        $this->total_admins=User::all();
        $admins = User::orderBy("id", "DESC")->where("name", 'LIKE', $search)->paginate(4);
        return view('livewire.admin.admins', ["admins" => $admins])->layout("layouts.admin");
    }
    public function resetField()
    {
        $this->name = "";
        $this->email = "";
        $this->roll = "";
        $this->new_image = "";
        $this->old_image = "";
    }
    public function delete($id)
    {
        $admins = User::find($id);

        $destination = public_path("storage\\" . $admins->image);
        // dd($destination);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $result = $admins->delete();
    }

    public function edit($id)
    {
        $this->admin = User::find($id);
        $this->ids = $this->admin->id;
        $this->name = $this->admin->name;
        $this->email = $this->admin->email;
        $this->roll = $this->admin->roll;
        $this->old_image = $this->admin->image;
    }

    public function update()
    {
        $admins = User::find($this->ids);
        $user = $this->validate([
            "name" => "required",
            "email" => "required",
        ]);

        $filename = "";
        if ($this->new_image != null) {
            $destination = public_path("storage\\" . $admins->image);
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $this->new_image->store("upload/admins", "public");
        } else {
            $filename = $this->old_image;
        }
        $admins->name = $this->name;
        $admins->email = $this->email;
        $admins->roll = $this->roll;
        $admins->image = $filename;
        $result = $admins->save();
        if ($result) {
            session()->flash("success", "Admin Register Successfully");
            $this->resetField();
        } else {
            session()->flash("error", "Admin not register successfully");
        }
    }
}
