<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table="posts";
    protected $fillable=["user_id","cat_id","views","image","title","description"];

    public function users()
    {
        return $this->belongsTo(User::class,"user_id");
    }

    public function categorys()
    {
        return $this->belongsTo(Category::class,"cat_id");
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
