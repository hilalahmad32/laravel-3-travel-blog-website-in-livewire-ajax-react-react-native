<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting as ModelsSetting;
use Livewire\Component;

class Setting extends Component
{

    public $setting_id;
    public $settings;
    public $logo;
    public $footer_title;
    public $footer_desc;
    public $footer_phone;
    public $footer_location;
    public $footer_email;


    public function render()
    {
        $this->settings=ModelsSetting::first();
        $this->setting_id=$this->settings->id;
        return view('livewire.admin.setting')->layout("layouts.admin");
    }

    public function resetField()
    {
        $this->logo="";
        $this->footer_title="";
        $this->footer_desc="";
        $this->footer_phone="";
        $this->footer_location="";
        $this->footer_email="";
    
    }

    public function edit($id)
    {
        $setting=ModelsSetting::find($id);
        $this->logo=$setting->title;
        $this->footer_title=$setting->footer_title;
        $this->footer_desc=$setting->footer_desc;
        $this->footer_phone=$setting->footer_phone;
        $this->footer_email=$setting->footer_email;
        $this->footer_location=$setting->footer_location;
    }

    public function update($id)
    {
        $setting=ModelsSetting::find($id);
        $setting->title=$this->logo;
        $setting->footer_title=$this->footer_title;
        $setting->footer_desc=$this->footer_desc;
        $setting->footer_phone=$this->footer_phone;
        $setting->footer_email=$this->footer_email;
        $setting->footer_location=$this->footer_location;
        $setting->save();
        $this->resetField();
    }
}
