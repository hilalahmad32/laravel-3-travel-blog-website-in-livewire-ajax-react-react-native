<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact as ModelsContact;
use Livewire\Component;
use Livewire\WithPagination;

class Contact extends Component
{
    use WithPagination;
    public $total_contents;
    public function render()
    {
        $contacts = ModelsContact::paginate(4);
        $this->total_contents = ModelsContact::all();
        return view('livewire.admin.contact', ["contacts" => $contacts])->layout("layouts.admin");
    }

    public function delete($id)
    {
        $comments = ModelsContact::find($id);
        $result = $comments->delete();
        if ($result) {
            session()->flash("success", "Post Update Successfully");
        } else {
            session()->flash("error", "Something wroing");
        }
    }
}
