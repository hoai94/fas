<?php
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\UploadController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Frontend\CommentController;
use App\Jobs\TestJob;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Role;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Artisan;

use App\Jobs\Heartbeat;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('login', [UserController::class, 'login'])->middleware('checklogout')->name('login');
Route::post('login', [UserController::class, 'postLogin'])->name('login');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::middleware(['checklogin'])->group(function () {
    Route::prefix('backend')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
        #quick view order detail
        Route::get('/ajax-detail-order', [DashboardController::class, 'ajaxDetailOrder'])->name('ajax.order.detail');

        Route::get('list-user', [UserController::class, 'index']);
        Route::get('add-user', [UserController::class, 'getAdd']);
        Route::post('add-user', [UserController::class, 'postAdd']);
        Route::get('edit-user/{user}', [UserController::class, 'getEdit']);
        Route::post('edit-user/{user}', [UserController::class, 'postEdit']);
        Route::get('role/{user}', [UserController::class, 'roles']);
        Route::post('role/{user}', [UserController::class, 'postAssign']);

        #Menus
        Route::get('add-menu', [MenuController::class, 'getAdd'])->name('add.menu');
        Route::post('add-menu', [MenuController::class, 'postAdd']);
        Route::get('list-menu', [MenuController::class, 'index'])->name('list.menu');
        Route::get('edit-menu/{menu}', [MenuController::class, 'getEdit'])->name('edit.menu');
        Route::post('edit-menu/{menu}', [MenuController::class, 'postEdit']);
        Route::DELETE('destroy-menu', [MenuController::class, 'destroy']);

        Route::get('active-menu/{menu}', [MenuController::class, 'ajaxActive'])->name('ajax.active.menu');
        Route::get('unactive-menu/{menu}', [MenuController::class, 'ajaxUnactive'])->name('ajax.unactive.menu');
        #role
        
        Route::get('add-role', [RoleController::class, 'getAdd'])->name('add.role');
        Route::post('add-role', [RoleController::class, 'postAdd']);
        Route::get('list-role', [RoleController::class, 'index'])->name('list.role');
        Route::get('edit-role/{role}', [RoleController::class, 'getEdit'])->name('edit.role');
        Route::post('edit-role/{role}', [RoleController::class, 'postEdit']);
        #Products
        Route::get('add-product', [ProductController::class, 'getAdd'])->name('add.product');
        Route::post('add-product', [ProductController::class, 'postAdd']);
        Route::get('list-product', [ProductController::class, 'index'])->name('list.product');
        Route::get('edit-product/{product}', [ProductController::class, 'getEdit'])->name('edit.product');
        Route::post('edit-product/{product}', [ProductController::class, 'postEdit']);
        Route::post('destroy-product', [ProductController::class, 'destroy'])->name('ajax.destroy');
        
        #change status product
        Route::get('active-product/{product}', [ProductController::class, 'ajaxActive'])->name('ajax.active');
        Route::get('unactive-product/{product}', [ProductController::class, 'ajaxUnactive'])->name('ajax.unactive');
        #change new product
        Route::get('new-product/{product}', [ProductController::class, 'ajaxNew'])->name('ajax.new');
        Route::get('old-product/{product}', [ProductController::class, 'ajaxOld'])->name('ajax.old');

        #Slider
        Route::get('add-slider', [SliderController::class, 'getAdd'])->name('add.slider');
        Route::post('add-slider', [SliderController::class, 'postAdd']);
        Route::get('list-slider', [SliderController::class, 'index'])->name('list.slider');
        Route::get('edit-slider/{slider}', [SliderController::class, 'getEdit'])->name('edit.slider');
        Route::post('edit-slider/{slider}', [SliderController::class, 'postEdit']);
        Route::DELETE('destroy-slider', [SliderController::class, 'destroy']);

        Route::get('active-slider/{slider}', [SliderController::class, 'ajaxActive'])->name('ajax.active.slider');
        Route::get('unactive-slider/{slider}', [SliderController::class, 'ajaxUnactive'])->name('ajax.unactive.slider');


        #Cart
        Route::get('customers', [\App\Http\Controllers\Backend\CartController::class, 'index']);
        Route::DELETE('customers/destroy', [\App\Http\Controllers\Backend\CartController::class, 'destroy']);
        Route::get('customers/view/{customer}', [\App\Http\Controllers\Backend\CartController::class, 'show']);
        #gallery
        Route::get('list-gallery',[GalleryController::class,'index']);
        Route::get('add-gallery/{product}',[GalleryController::class,'getAdd']);
        Route::post('add-gallery/{product}',[GalleryController::class,'postAdd']);
        #post
        Route::get('list-post',[App\Http\Controllers\Backend\PostController::class,'index'])->name('list.post');

        Route::get('add-post',[App\Http\Controllers\Backend\PostController::class,'getAdd'])->name('add.post');
        Route::post('add-post',[App\Http\Controllers\Backend\PostController::class,'postAdd']);

        Route::get('edit-post/{post}',[App\Http\Controllers\Backend\PostController::class,'getEdit'])->name('edit.post');
        Route::post('edit-post/{post}',[App\Http\Controllers\Backend\PostController::class,'postEdit']);
        Route::get('destroy-post/{post}', [App\Http\Controllers\Backend\PostController::class, 'destroy']);

        Route::get('active-post/{post}', [App\Http\Controllers\Backend\PostController::class, 'ajaxActive'])->name('ajax.active.post');
        Route::get('unactive-post/{post}', [App\Http\Controllers\Backend\PostController::class, 'ajaxUnactive'])->name('ajax.unactive.post');
        #change new product
        Route::get('new-post/{post}', [App\Http\Controllers\Backend\PostController::class, 'ajaxNew'])->name('ajax.new.post');
        Route::get('old-post/{post}', [App\Http\Controllers\Backend\PostController::class, 'ajaxOld'])->name('ajax.old.post');


        #upload image ckeditor
        Route::post('/upload',[App\Http\Controllers\Backend\PostController::class,'upload'])->name('upload');
    });
});

Route::get('/', [IndexController::class, 'index'])->name('home.page');
Route::get('/trang-chu.html', [IndexController::class, 'index']);
Route::get('/danh-muc/{slug}', [App\Http\Controllers\Frontend\MenuController::class, 'index']);
Route::get('/san-pham/{slug}.html', [App\Http\Controllers\Frontend\ProductController::class, 'detailProduct']);
Route::post('/add-cart', [CartController::class,'add']);
Route::get('/gio-hang.html', [CartController::class,'getProduct']);
Route::get('/delete-cart/{id}', [CartController::class,'remove']);
Route::post('/update-carts', [CartController::class,'update']);
Route::get('/dat-hang.html', [CartController::class,'order']);
Route::post('/dat-hang.html', [CartController::class,'postOrder']);
Route::post('/quick-view', [IndexController::class,'quickView']);
Route::post('/ajax-add-cart', [CartController::class,'ajaxAddCart'])->name('add.cart.ajax');
Route::get('/lien-he.html', [IndexController::class,'contact']);
Route::get('/tin-tuc.html', [PostController::class,'index']);
Route::get('/tin-tuc/{slug}', [PostController::class,'detail']);
Route::get('/tim-kiem.html', [IndexController::class,'search']);

#login,register,logout frontend
Route::get('/dang-nhap.html',[App\Http\Controllers\Frontend\CustomerController::class,'getLogin'])->middleware('checklogout.frontend');
Route::post('/dang-nhap.html',[App\Http\Controllers\Frontend\CustomerController::class,'postLogin']);

Route::get('/dang-ky.html',[App\Http\Controllers\Frontend\CustomerController::class,'getRegister']);
Route::post('/dang-ky.html',[App\Http\Controllers\Frontend\CustomerController::class,'postRegister']);

Route::get('/dang-xuat.html',[App\Http\Controllers\Frontend\CustomerController::class,'getLogout']);
#comment post
Route::post('/comment',[CommentController::class,'comment'])->name('ajax.comment');
#ajax load more menu
Route::post('/load-more-menu',[App\Http\Controllers\Frontend\MenuController::class,'ajaxLoadMoreMenu'])->name('ajax.load.more');
#ajax quick login
Route::post('/ajax-login',[App\Http\Controllers\Frontend\CustomerController::class,'ajaxLogin'])->name('ajax.login');


Route::get('/customer',[App\Http\Controllers\Backend\CustomerController::class,'index']);

Route::get('/clear', function () {
    Artisan::call('queue:restart');
    echo 'done';
});

Route::get('/app', function () {
    dd($this->app);
});