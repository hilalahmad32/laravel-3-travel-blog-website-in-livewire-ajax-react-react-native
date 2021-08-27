<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;

    public function render()
    {
        return view('livewire.admin.login')->layout("layouts.admin-login");
    }

    public function login()
    {
        $this->validate([
            "email"=>"required",
            "password"=>"required",
        ]);
        $attem=Auth::attempt(['email' => $this->email, 'password' => $this->password]);
       if($attem == true){
           if(Auth::user()->roll == 1){
           return redirect("/admin/dashboard");
           }else{
           return redirect("/admin/dashboards");
           }

       }else{
        redirect("/admin/login");
        session()->flash("error","Invalid Email and Password");
       }
        

    }
}
