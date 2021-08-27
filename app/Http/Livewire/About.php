<?php

namespace App\Http\Livewire;

use App\Models\About as ModelsAbout;
use Livewire\Component;

class About extends Component
{
    public $about;
    public function render()
    {
        $this->about=ModelsAbout::first();
        return view('livewire.about')->layout("layouts.app");
    }
}
