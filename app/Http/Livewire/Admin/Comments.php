<?php

namespace App\Http\Livewire\Admin;

use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{
    public $comment_total;
    public function render()
    {
        $comments = Comment::paginate(4);
        $this->comment_total = Comment::all();
        return view('livewire.admin.comments', ["comments" => $comments])->layout("layouts.admin");
    }

    public function delete($id)
    {
        $comments = Comment::find($id);
        $result = $comments->delete();
        if ($result) {
            session()->flash("success", "Post Update Successfully");
        } else {
            session()->flash("error", "Something wroing");
        }
    }
}
