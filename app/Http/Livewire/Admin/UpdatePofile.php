<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdatePofile extends Component
{

    use WithFileUploads;

    public $profile_id;
    public $profiles;
    public $name;
    public $email;
    public $new_image;
    public $old_image;

    public function render()
    {
        $this->profiles=User::find(Auth::user()->id);
        $this->profile_id=$this->profiles->id;
        return view('livewire.admin.update-pofile')->layout("layouts.admin");
    }

    public function resetField()
    {
        $this->name="";
        $this->email="";
        $this->new_image="";
        $this->old_image="";
    
    }

    public function edit()
    {
        $profile=User::find(Auth::user()->id);
        $this->name=$profile->name;
        $this->email=$profile->email;
        $this->old_image=$profile->image;
    }

    public function update()
    {
        $profile = User::find(Auth::user()->id);

        $filename = "";
        if ($this->new_image != null) {
            $destination = public_path("storage\\" . $profile->image);
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $this->new_image->store("upload/admins", "public");
        } else {
            $filename = $this->old_image;
        }
        $profile->name = $this->name;
        $profile->email = $this->email;
        $profile->image = $filename;
        $result = $profile->save();
        if ($result) {
            session()->flash("success", "Admin Register Successfully");
            $this->resetField();
        } else {
            session()->flash("error", "Admin not register successfully");
        }
    }
}
