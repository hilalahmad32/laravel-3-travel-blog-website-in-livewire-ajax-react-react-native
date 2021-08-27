<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Register extends Component
{

    public $name;
    public $email;
    public $password;
    public $roll;
    public $image;

    use RegistersUsers;
    use WithFileUploads;
    // public $redirectTo = RouteServiceProvider::HOME;

    public function render()
    {
        return view('livewire.admin.register')->layout("layouts.admin");
    }

    public function resetField()
    {
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->roll = "";
        $this->image = "";
    }


    public function register()
    {


        $user = $this->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
        ]);
        $array = explode(' ', $this->name);
        $array_slice = array_filter($array);
        $fname = $array_slice[0][0];
        $lname = $array_slice[1][0];
        $fullname = Str::upper($fname . $lname);
        $filename = "";
        if ($this->image != null) {
            $filename = $this->image->store("upload/admins", "public");
        } else {
            $filename = $fullname;
        }

        $result = User::create([
            "name" => $this->name,
            "email" => $this->email,
            "roll" => $this->roll,
            "image" => $filename,
            "password" => Hash::make($this->password),
        ]);
        if ($result) {
            session()->flash("success", "Admin Register Successfully");
            $this->resetField();
        } else {
            session()->flash("error", "Admin not register successfully");
        }
    }
}
