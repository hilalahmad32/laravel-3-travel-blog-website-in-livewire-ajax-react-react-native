<?php

namespace App\Http\Livewire;

use App\Models\About;
use App\Models\Subscribe;
use Livewire\Component;

class AboutPage extends Component
{  
    
    public $about;
    public $email;
    public function render()
    {
    $this->about=About::first();
    return view('livewire.about-page')->layout("layouts.app");
    }

    public function resetField()
    {
        $this->email="";
    }

    public function submit()
    {
        $this->validate([
            "email"=>"required",
        ]);
       $sub=new Subscribe();
       $is_email=Subscribe::where("subscribe",'=',$this->email)->first();
       if($is_email){
           session()->flash("error","This Email already Exist");
       }else{
        $sub->subscribe=$this->email;
        $result=$sub->save();
        if($result){
            session()->flash("success","Subscribe");
            $this->resetField();
        }else{
            session()->flash("error","something woring");
        }
       }
    }
}
