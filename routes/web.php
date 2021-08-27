<?php

use App\Http\Livewire\AboutPage;
use App\Http\Livewire\Admin\About;
use App\Http\Livewire\Admin\Admins;
use App\Http\Livewire\Admin\Category;
use App\Http\Livewire\Admin\Comments;
use App\Http\Livewire\Admin\Contact as AdminContact;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Post;
use App\Http\Livewire\Admin\Login;
use App\Http\Livewire\Admin\Logout;
use App\Http\Livewire\Admin\Setting;
use App\Http\Livewire\Admin\UpdatePofile;
use App\Http\Livewire\Blog;
use App\Http\Livewire\CategoryPost;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Home;
use App\Http\Livewire\PostDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", Home::class)->name("home");
Route::get("/about", AboutPage::class)->name("about");
Route::get("/blog", Blog::class)->name("blog");
Route::get("/contact", Contact::class)->name("contact");
Route::get("/category-posts/{category_name}", CategoryPost::class)->name("category-post");
Route::get("/post-Detail/{title}", PostDetail::class)->name("post-detail");
Auth::routes();


Route::group(["middleware" => "guest", "prefix" => "/admin"], function () {
    Route::get("/", Login::class)->name("login");
    Route::get("/login", Login::class)->name("login");
});

Route::middleware(["auth", "admin"])->group(function () {
    // Route::prefix("/admin",function(){
    Route::get('/admin/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/admin/category', Category::class)->name('category');
    Route::get('/admin/post', Post::class)->name('post');
    Route::get("/admin/admins", Admins::class)->name("admins");
    Route::get("/admin/about", About::class)->name("abouts");
    Route::get("/admin/setting", Setting::class)->name("setting");
    Route::get("/admin/profile", UpdatePofile::class)->name("profile");
    Route::get('/admin/comment', Comments::class)->name('comments');
    Route::get('/admin/contact', AdminContact::class)->name('contacts');
    Route::get("/admin/logout", Logout::class)->name("logout");
    // });


});
Route::middleware(["auth","noadmin"])->group(function(){
    Route::get('/admin/dashboards', Dashboard::class)->name('dashboards');
    // Route::get("/admin/profile", UpdatePofile::class)->name("profiles");
    Route::get('/admin/posts', Post::class)->name('posts');
});

// Route::group(["middleware" => "auth"], function () {
//     Route::get('/noadmin/dashboards', Dashboard::class)->name('dashboards');
//     Route::get('/noadmin/posts', Post::class)->name('posts');
// });
