<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{
    Contactus,
    FeedbackVideos as ClientFeedbackVideos
};
use App\Http\Livewire\blog\{
    blog,
    blogPost,
    blogPostsByCategory,
};
use App\Http\Livewire\admin\{
    categories,
    FeedbackVideos,
};
use App\Http\Controllers\admin\PostsController;
use App\Http\Controllers\{
    HomeController,
    helperController,
};
use App\Http\Controllers\admin\homeController as adminHomeController;



Route::get('/', function () {
    return view('welcome');
});

Route::get("/about-us",function ()
{
    return view('aboutus');
})->name("aboutus");

Route::get("/Feedback-Video",ClientFeedbackVideos::class)->name("feedback.video");
Route::get("/our-services",[helperController::class,"ourServices"])->name("our.services");
Route::get("/mobile-Work-Demo",[helperController::class,"mobileWorkDemo"])->name("mobile.work.demo");
Route::get("/testimonial",[helperController::class,"testimonial"])->name("testimonial");
Route::get("/Form-Flip-Work-Demo",[helperController::class,"FormFlipWorkDemo"])->name("form.flip.Work.demo");
Route::get("/Ad-Posting-Demo",[helperController::class,"AdPostingDemo"])->name("Ad.posting.Demo");
Route::get("/System-Work",[helperController::class,"SystemWork"])->name("System.Work");

Route::prefix('/blog')->group(function () {
    Route::get('/', blog::class)->name("blog");
    Route::get('/post/{p_id}', blogPost::class)->name("blog.post");
    Route::get('/posts/category/{cid}', blogPostsByCategory::class)->name("blog.posts.category");

});



// admin routes
Route::prefix('admin')->group(function () {
    Route::middleware(["auth",'admin'])->group(function () {
        Route::get("/categories",categories::class)->name("admin.category");
        Route::get('posts',App\Http\Livewire\Admin\CreatePost::class)->name('admin.posts');
        Route::get('posts/create',[PostsController::class,'create'])->name('admin.create_post');
        Route::post('posts/store',[PostsController::class,'store'])->name('store_post');
        Route::delete('posts/delete/{id}',[PostsController::class,'delete'])->name('delete');
        Route::get('posts/edit/{id}',[PostsController::class,'edit'])->name('admin.edit_post');
        Route::post('posts/update/{id}',[PostsController::class,'update'])->name('admin.update_post');
        Route::post('posts/upload_image',[PostsController::class,'uploadImage'])->name('upload');


        Route::get('Feedback-Videos',FeedbackVideos::class)->name('admin.feedback.video');

        Route::get('/home',[adminHomeController::class,'index'])->name("admin.home");
    });
});

Route::get("/contact-us",Contactus::class)->name("contactus");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


