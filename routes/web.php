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
    mobileWork,
    OurService,
};
use App\Http\Controllers\admin\{
    PostsController,
    mobileWorkController,
    ourServiceController
};
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

Route::get("/Feedback-Video",ClientFeedbackVideos::class)->name("feedback.video"); //✅
Route::get("/mobile-Work-Demo",[helperController::class,"mobileWorkDemo"])->name("mobile.work.demo"); //✅
Route::get("/our-services",[helperController::class,"ourServices"])->name("our.services"); //✅
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
        // admin blog related routes
        Route::get("/categories",categories::class)->name("admin.category");
        Route::get('posts',App\Http\Livewire\Admin\CreatePost::class)->name('admin.posts');
        Route::get('posts/create',[PostsController::class,'create'])->name('admin.create_post');
        Route::post('posts/store',[PostsController::class,'store'])->name('store_post');
        Route::delete('posts/delete/{id}',[PostsController::class,'delete'])->name('delete');
        Route::get('posts/edit/{id}',[PostsController::class,'edit'])->name('admin.edit_post');
        Route::post('posts/update/{id}',[PostsController::class,'update'])->name('admin.update_post');
        Route::post('posts/upload_image',[PostsController::class,'uploadImage'])->name('upload');

        // admin mobile work demo CRUD
        Route::get('mobile-work-demo',mobileWork::class)->name('admin.mobile.work');
        Route::get('create-mobile-work-demo/create',[mobileWorkController::class,'create'])->name('admin.create_mobile_work_demo');
        Route::post('create-mobile-work-demo/store',[mobileWorkController::class,'store'])->name('store_MobileWorkDemo');
        Route::get('create-mobile-work-demo/edit/{id}',[mobileWorkController::class,'edit'])->name('admin.edit_mobile_work_demo');
        Route::post('create-mobile-work-demo/update/{id}',[mobileWorkController::class,'update'])->name('admin.update_mobile_work_demo');

        // admin our service CRUD
        Route::get('our-service',OurService::class)->name('admin.our.service');
        Route::get('our-service/create',[ourServiceController::class,'create'])->name('admin.our.service.create');
        Route::post('our-service/store',[ourServiceController::class,'store'])->name('admin.our.service.store');
        Route::get('our-service/edit/{id}',[ourServiceController::class,'edit'])->name('admin.our.service.edit');
        Route::post('our-service/update/{id}',[ourServiceController::class,'update'])->name('admin.our.service.update');


        Route::get('Feedback-Videos',FeedbackVideos::class)->name('admin.feedback.video');
        Route::get('/home',[adminHomeController::class,'index'])->name("admin.home");
    });
});

Route::get("/contact-us",Contactus::class)->name("contactus");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


