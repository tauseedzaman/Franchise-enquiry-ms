<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{
    Contactus
};
use App\Http\Livewire\blog\{
    blog,
    blogPost,
};




Route::get('/', function () {
    return view('welcome');
});

Route::get("/about-us",function ()
{
    return view('aboutus');
})->name("aboutus");









Route::prefix('/blog')->group(function () {
    Route::get('/', blog::class)->name("blog");
    Route::get('/post/1', blogPost::class)->name("blog.post");
});








// admin routes
Route::prefix('admin')->group(function () {
    Route::middleware(["auth",'admin'])->group(function () {
        Route::view('/home',"admin.welcome")->name("admin.home");
    });
});









Route::get("/contact-us",Contactus::class)->name("contactus");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
