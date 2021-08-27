<?php

namespace App\Http\Livewire;

use App\Models\Contact as ModelsContact;
use Livewire\Component;

class Contact extends Component
{

    public $name;
    public $email;
    public $message;
    public function render()
    {
        return view('livewire.contact')->layout("layouts.app");
    }

    public function resetField()
    {
        $this->name="";
        $this->email="";
        $this->message="";
    }

    public function contact()
    {
        $this->validate([
            "name"=>"required",
            "email"=>"required",
            "message"=>"required",
        ]);
        $contact=new ModelsContact();
        $contact->name=$this->name;
        $contact->email=$this->email;
        $contact->message=$this->message;
        $contact->save();
        $this->resetField();
        
    }
}
