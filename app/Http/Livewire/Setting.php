<?php

namespace App\Http\Livewire;

use App\Models\Setting as ModelsSetting;
use Livewire\Component;

class Setting extends Component
{
    public $setting;
    public $setting_id;
    public $title;
    public $footer_title;
    public $footer_desc;
    public $footer_email;
    public $footer_location;
    public $footer_phone;
    public function render()
    {
        $this->setting=ModelsSetting::first();
        $this->setting_id=$this->setting->id;
        $this->title=$this->setting->title;
        $this->footer_title=$this->setting->footer_title;
        $this->footer_desc=$this->setting->footer_desc;
        $this->footer_location=$this->setting->footer_location;
        $this->footer_phone=$this->setting->footer_phone;
        $this->footer_email=$this->setting->footer_email;
        return view('livewire.setting')->layout("layouts.app");
    }
}
