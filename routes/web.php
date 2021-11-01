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
    Comments,
    FeedbackVideos,
    mobileWork,
    OurService,
    Testimonials,
};
use App\Http\Controllers\admin\{
    PostsController,
    mobileWorkController,
    ourServiceController,
    testimonialsController
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

Route::get("/contact-us",Contactus::class)->name("contactus");

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

        Route::prefix('post')->group(function () {
            Route::get('/',App\Http\Livewire\Admin\CreatePost::class)->name('admin.posts');
            Route::get('/create',[PostsController::class,'create'])->name('admin.create_post');
            Route::post('/store',[PostsController::class,'store'])->name('store_post');
            Route::delete('/delete/{id}',[PostsController::class,'delete'])->name('delete');
            Route::get('/edit/{id}',[PostsController::class,'edit'])->name('admin.edit_post');
            Route::post('/update/{id}',[PostsController::class,'update'])->name('admin.update_post');
            Route::post('/upload_image',[PostsController::class,'uploadImage'])->name('upload');
        });

        Route::get("/comments",Comments::class)->name("admin.comments");

        // admin mobile work demo CRUD
        Route::prefix('mobile-work-demo')->group(function () {
            Route::get('/',mobileWork::class)->name('admin.mobile.work');
            Route::get('/create',[mobileWorkController::class,'create'])->name('admin.create_mobile_work_demo');
            Route::post('/store',[mobileWorkController::class,'store'])->name('store_MobileWorkDemo');
            Route::get('/edit/{id}',[mobileWorkController::class,'edit'])->name('admin.edit_mobile_work_demo');
            Route::post('/update/{id}',[mobileWorkController::class,'update'])->name('admin.update_mobile_work_demo');
        });

        // admin our service CRUD
        Route::prefix('our-service')->group(function () {
            Route::get('/',OurService::class)->name('admin.our.service');
            Route::get('/create',[ourServiceController::class,'create'])->name('admin.our.service.create');
            Route::post('/store',[ourServiceController::class,'store'])->name('admin.our.service.store');
            Route::get('/edit/{id}',[ourServiceController::class,'edit'])->name('admin.our.service.edit');
            Route::post('/update/{id}',[ourServiceController::class,'update'])->name('admin.our.service.update');
        });


         // admin testimonial CRUD
         Route::prefix('testimonial')->group(function () {
            Route::get('/',Testimonials::class)->name('admin.testimonial');
            Route::get('/create',[testimonialsController::class,'create'])->name('admin.testimonial.create');
            Route::post('/store',[testimonialsController::class,'store'])->name('admin.testimonial.store');
            Route::get('/edit/{id}',[testimonialsController::class,'edit'])->name('admin.testimonial.edit');
            Route::post('/update/{id}',[testimonialsController::class,'update'])->name('admin.testimonial.update');
        });



        Route::get('Feedback-Videos',FeedbackVideos::class)->name('admin.feedback.video');
        Route::get('/home',[adminHomeController::class,'index'])->name("admin.home");
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


