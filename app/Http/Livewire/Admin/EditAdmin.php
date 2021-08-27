<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class EditAdmin extends Component
{

    // public $ids;
    // public $name;
    // public $email;
    // public $roll;
    // public $password;
    // public $new_image;
    // public $old_image;

    public function render()
    {
        return view('livewire.admin.edit-admin')->layout("layouts.admin");
    }

    
    // public function update()
    // {
    //     dd("hello");
    // }
}
