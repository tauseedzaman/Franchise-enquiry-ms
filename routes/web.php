<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{
    Contactus,
    FeedbackVideos as ClientFeedbackVideos,
    MyWorkSheet,
    SubmitUrl
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
    fieldWorkDemo,
    AdPostingDemo,
    BusinessPlan,
    ClassifiedSite,
    DisableLoginRegister,
    Downloads,
    ManageSubmittedUrls,
    SystemWork,
    WhayJoin
};
use App\Http\Controllers\admin\{
    AdPostingDemoController,
    fieldWorkDemoController,
    PostsController,
    mobileWorkController,
    ourServiceController,
    systemWorkController,
    testimonialsController,
    whayJoinController
};
use App\Http\Controllers\{
    HomeController,
    helperController,

};
use App\Http\Controllers\admin\homeController as adminHomeController;
use App\Http\Controllers\user\ProfileController;

Route::get('/',[helperController::class,"welcome"])->name("welcome");

Route::get("/about-us",function ()
{
    return view('aboutus');

})->name("aboutus");

Route::get("/contact-us",Contactus::class)->name("contactus");

Route::get("/Feedback-Video",ClientFeedbackVideos::class)->name("feedback.video"); //✅
Route::get("/mobile-Work-Demo",[helperController::class,"mobileWorkDemo"])->name("mobile.work.demo"); //✅
Route::get("/our-services",[helperController::class,"ourServices"])->name("our.services"); //✅
Route::get("/testimonial",[helperController::class,"testimonial"])->name("testimonial");//✅
Route::get("/field-Work-Demo",[helperController::class,"FormFlipWorkDemo"])->name("form.field.Work.demo"); //✅
Route::get("/Ad-Posting-Demo",[helperController::class,"AdPostingDemo"])->name("Ad.posting.Demo"); //✅
Route::get("/Whay-join",[helperController::class,"whayJoin"])->name("whay-join"); //✅
Route::get("/System-Work",[helperController::class,"SystemWork"])->name("System.Work");
Route::get("/Business-Plan",[helperController::class,"BusinessPlans"])->name("BusinessPlans");
Route::get("/Downloads",[helperController::class,"Downloads"])->name("Downloads");

Route::get("user/profile",[ProfileController::class,"index"])->name("user.profile");

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

         // admin field demo work CRUD
         Route::prefix('field-work-demo')->group(function () {
            Route::get('/',fieldWorkDemo::class)->name('admin.field.work.demo');
            Route::get('/create',[fieldWorkDemoController::class,'create'])->name('admin.field.work.demo.create');
            Route::post('/store',[fieldWorkDemoController::class,'store'])->name('admin.field.work.demo.store');
            Route::get('/edit/{id}',[fieldWorkDemoController::class,'edit'])->name('admin.field.work.demo.edit');
            Route::post('/update/{id}',[fieldWorkDemoController::class,'update'])->name('admin.field.work.demo.update');
        });


         // admin testimonial CRUD
         Route::prefix('testimonial')->group(function () {
            Route::get('/',Testimonials::class)->name('admin.testimonial');
            Route::get('/create',[testimonialsController::class,'create'])->name('admin.testimonial.create');
            Route::post('/store',[testimonialsController::class,'store'])->name('admin.testimonial.store');
            Route::get('/edit/{id}',[testimonialsController::class,'edit'])->name('admin.testimonial.edit');
            Route::post('/update/{id}',[testimonialsController::class,'update'])->name('admin.testimonial.update');
        });

         // admin adds posting demo CRUD
         Route::prefix('Ad-Posting-Demo')->group(function () {
            Route::get('/',AdPostingDemo::class)->name('admin.AdPostingDemo');
            Route::get('/create',[AdPostingDemoController::class,'create'])->name('admin.AdPostingDemo.create');
            Route::post('/store',[AdPostingDemoController::class,'store'])->name('admin.AdPostingDemo.store');
            Route::get('/edit/{id}',[AdPostingDemoController::class,'edit'])->name('admin.AdPostingDemo.edit');
            Route::post('/update/{id}',[AdPostingDemoController::class,'update'])->name('admin.AdPostingDemo.update');
        });

        // admin whay join us CRUD
        Route::prefix('whay-join')->group(function () {
            Route::get('/',WhayJoin::class)->name('admin.whayJoin');
            Route::get('/create',[whayJoinController::class,'create'])->name('admin.whayJoin.create');
            Route::post('/store',[whayJoinController::class,'store'])->name('admin.whayJoin.store');
            Route::get('/edit/{id}',[whayJoinController::class,'edit'])->name('admin.whayJoin.edit');
            Route::post('/update/{id}',[whayJoinController::class,'update'])->name('admin.whayJoin.update');
        });


         // admin system work CRUD
         Route::prefix('system-work')->group(function () {
            Route::get('/',SystemWork::class)->name('admin.systemWork');
            Route::get('/create',[systemWorkController::class,'create'])->name('admin.systemWork.create');
            Route::post('/store',[systemWorkController::class,'store'])->name('admin.systemWork.store');
            Route::get('/edit/{id}',[systemWorkController::class,'edit'])->name('admin.systemWork.edit');
            Route::post('/update/{id}',[systemWorkController::class,'update'])->name('admin.systemWork.update');
        });



        // admin Business Plan CRUD
        Route::prefix('Business-Plan')->group(function () {
            Route::get('/',BusinessPlan::class)->name('admin.Business-Plan');
        });

        // admin downloads crud
        Route::get('Downloads',Downloads::class)->name("admin.downloads");

        // admin classified site management
        Route::get('Classified-Site',ClassifiedSite::class)->name("admin.classifiedSite");

        // admin submitted url approve managment
        Route::get('Manage-submitted-urls',ManageSubmittedUrls::class)->name("admin.submittedUrls");

        Route::get('Feedback-Videos',FeedbackVideos::class)->name('admin.feedback.video');

        // admin manage login register pages (disable/enable)
        Route::get("Manage-Users-Login-Register",DisableLoginRegister::class)->name("admin.disableLoginRegister");
        Route::get('/',[adminHomeController::class,'index'])->name("admin.home");


    });
});


Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/submit-Url', SubmitUrl::class)->name('auth.submitUrl');
    Route::get('/My-Work-Sheet', MyWorkSheet::class)->name('auth.myWorkSheet');
    Route::get('/Classified-Sites', [helperController::class,"classifiedSite"])->name('auth.classifiedSites');
});




/*
employee
ID Activation /User Verification

Submit URL Approved

Payment Approved

Support Trick Relpy

Create Franchise

Pakage add

create my work mattor

classified website add

*/
