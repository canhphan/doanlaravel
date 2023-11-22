<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MemberRegisterController;
use App\Http\Controllers\Frontend\MemberLoginController;
use App\Http\Controllers\Frontend\BlogmemberController;





//  ADMIN
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/index',[DashboardController::class,'index'] );
Route::get('/profile',[DashboardController::class,'profile'] );


// PROFILE
Route::get('/profile/edit',[UserController::class,'edit'] );
Route::post('/profile/edit', [UserController::class, 'update']);

// COUNTRY
        // hiển thị
Route::get('/country/list',[CountryController::class,'list'] );
        // thêm
Route::get('/country/add',[CountryController::class,'addGet'] );
Route::post('/country/add',[CountryController::class,'addPost'] );  
        // sửa xóa
Route::get('/country/edit/{id}',[CountryController::class,'editcountry'] );
Route::post('/country/edit/{id}', [CountryController::class, 'updatecountry']);
Route::get('/country/delete/{id}',[CountryController::class,'destroy'] );

// BLOG
        // hiển thị
Route::get('/blog/list',[BlogController::class,'list'] );
        // thêm
Route::get('/blog/add',[BlogController::class,'addGet'] );
Route::post('/blog/add',[BlogController::class,'addPost'] );  
        // sửa xóa
Route::get('/blog/edit/{id}',[BlogController::class,'editblog'] );
Route::post('/blog/edit/{id}', [BlogController::class, 'updateblog']);
Route::get('/blog/delete/{id}',[BlogController::class,'destroy'] );


// MEMBER

Route::get('/frontend/index',[HomeController::class,'index'] );
Route::get('/frontend/blog',[HomeController::class,'blog'] );
Route::get('/frontend/blogdetail',[HomeController::class,'blogdetail'] );
Route::get('/frontend/checkout',[HomeController::class,'checkout'] );
Route::get('/frontend/login',[HomeController::class,'login'] );


// MEMBER Login Register
Route::get('/frontend/register',[MemberRegisterController::class,'registerGet'] );
Route::post('/frontend/register',[MemberRegisterController::class,'registerPost'] );
Route::get('/frontend/login',[MemberLoginController::class,'memberloginGet'] );
Route::post('/frontend/login',[MemberLoginController::class,'memberloginPost'] );

// MEMBER Blog

Route::get('/frontend/blogmember',[BlogmemberController::class,'blogmember'] );
Route::get('/frontend/blogdetail/{id}',[BlogmemberController::class,'blogdetail'] );
Route::post('/frontend/blog/rate',[BlogmemberController::class,'blograte'] );
Route::post('/frontend/blog/cmt',[BlogmemberController::class,'blogcmt'] );











