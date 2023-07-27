<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\forgetPassword;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryDog;
use App\Http\Controllers\CommentController;
/* use App\Http\Controllers\PostDBController; */
use App\Http\Controllers\CreateCategoryController;
use App\Http\Controllers\CreatePostController;
use App\Http\Controllers\DetailCategoryController;
use App\Http\Controllers\ShowPostPage;
use App\Http\Controllers\ImageLibrary;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageIndex;
use App\Models\Admin;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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


Route::get('/login', [LoginController::class, 'loginG'])->name('login')->middleware("checkLogin");
Route::post('/login', [LoginController::class, 'loginP']);
Route::get('/register', [RegisterController::class, 'registerG'])->name('register')->middleware("checkLogin");
Route::post('/register', [RegisterController::class, 'registerP']);
Route::get('/logout', [LogOutController::class, 'logOut'])->name('logout');

Route::get('/about', function () {
    return view('Forms.AboutUs');
});

//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['checkAdmin']], function () {
    Route::get('ckeditor', [CreatePostController::class,'add_post']);
    Route::post('ckeditor/upload', [CreatePostController::class,'upload'])->name('ckeditor.upload');
    //DashBoard
    Route::get('/dashboard', [AdminController::class, 'dashBoard'])->name('dashboard');

    //Manage Comment
    Route::get('user_comment', [AdminController::class, 'userComment'])->name('manage_comment');
    Route::get('delete_comment/{ID}', [AdminController::class, 'deleteComment'])->name('delete_comment');
    Route::get('approve_comment', [AdminController::class, 'approveComment'])->name('approve_comment');

    //Manage User
    Route::get('users', [AdminController::class, 'userList'])->name('list_user');

    //Ajax
    Route::post('search_post', [AjaxController::class, 'ajsearchPost'])->name('ajsearchPost');
    Route::post('multi_delete_post', [AjaxController::class, 'ajdeletePost'])->name('ajdeletePost');
    Route::post('multi_active_user', [AjaxController::class, 'ajActiveAll'])->name('ajActiveAll_user');
    ROute::post('multi_delete_user', [AjaxController::class, 'ajDisableAll'])->name('ajDisableAll_user');
    Route::post('active_comment', [AjaxController::class, 'ajActiveComment'])->name('ajActiveComment');
    Route::post('multi_active_comment', [AjaxController::class, 'ajACommentAll'])->name('ajACommentAll');
    Route::post('multi_delete_comment', [AjaxController::class, 'ajDCommentAll'])->name('ajDCommentAll');
    Route::post('search_user', [AjaxController::class, 'ajsearchUser'])->name('ajsearchUser');

    //Edit
    Route::get('/create-post', [CreatePostController::class, 'add_post'])->name('add_post');
    Route::post('/save-post', [CreatePostController::class, 'save_post'])->name('save_post');
    Route::get('/view-post', [CreatePostController::class, 'show_post'])->name('show_post');
    Route::get('/edit-post/{post_id}', [CreatePostController::class, 'edit_post'])->name('edit_post');
    Route::post('update-post/', [CreatePostController::class, 'update_post'])->name('update_post');
    Route::get('/delete-post/{post_id}', [CreatePostController::class, 'delete_post'])->name('delete_post');
    Route::get('/active-post/{pos_id}', [CreatePostController::class, 'active_post'])->name('active_post');
    Route::get('/unactive-post/{pos_id}', [CreatePostController::class, 'unactive_post'])->name('unactive_post');

    Route::get('/list-category', [DetailCategoryController::class, 'show_detail_category'])->name('show_detail_category');
    Route::get('/create-category', [DetailCategoryController::class, 'createCategory'])->name('create_category');

    Route::name("category.")->prefix('category')->group(function () {
        
        Route::post('/save-doge-name', [DetailCategoryController::class, 'save_dog_name'])->name('save_dog_name');
        Route::get('/edit-dog-name/{dog_id}', [DetailCategoryController::class, 'edit_dog_name'])->name('edit_dog_name');
        Route::get('/delete-dog-name/{dog_id}', [DetailCategoryController::class, 'delete_dog_name'])->name('delete_dog_name');

        
        Route::post('/save-breed', [DetailCategoryController::class, 'save_breed'])->name('save_breed');
        Route::get('/edit-breed/{bre_id}', [DetailCategoryController::class, 'edit_breed'])->name('edit_breed');
        Route::get('/delete-breed/{bre_id}', [DetailCategoryController::class, 'delete_breed'])->name('delete_breed');

        
        Route::post('/save-national', [DetailCategoryController::class, 'save_national'])->name('save_national');
        Route::get('/edit-national/{nat_id}', [DetailCategoryController::class, 'edit_national'])->name('edit_national');
        Route::get('/delete-national/{nat_id}', [DetailCategoryController::class, 'delete_national'])->name('delete_national');

        
        Route::post('/save-group', [DetailCategoryController::class, 'save_group'])->name('save_group');
        Route::get('/edit-group/{gro_id}', [DetailCategoryController::class, 'edit_group'])->name('edit_group');
        Route::get('/delete-group/{gro_id}', [DetailCategoryController::class, 'delete_group'])->name('delete_group');

    
        Route::post('/save-activity', [DetailCategoryController::class, 'save_activity_lv'])->name('save_activity_lv');
        Route::get('/edit-activity/{act_id}', [DetailCategoryController::class, 'edit_activity_lv'])->name('edit_activity_lv');
        Route::get('/delete-activity/{act_id}', [DetailCategoryController::class, 'delete_activity_lv'])->name('delete_activity_lv');

        
        Route::post('/save-barking', [DetailCategoryController::class, 'save_barking_lv'])->name('save_barking_lv');
        Route::get('/edit-barking/{bar_id}', [DetailCategoryController::class, 'edit_barking_lv'])->name('edit_barking_lv');
        Route::get('/delete-barking/{bar_id}', [DetailCategoryController::class, 'delete_barking'])->name('delete_barking_lv');

        
        Route::post('/save-characteristic', [DetailCategoryController::class, 'save_characteristic'])->name('save_characteristic');
        Route::get('/edit-characteristic/{cha_id}', [DetailCategoryController::class, 'edit_characteristic'])->name('edit_characteristic');
        Route::get('/delete-characteristic/{cha_id}', [DetailCategoryController::class, 'delete_characteristic'])->name('delete_characteristic');


        
        Route::post('/save-coat', [DetailCategoryController::class, 'save_coat_type'])->name('save_coat_type');
        Route::get('/edit-coat/{coa_id}', [DetailCategoryController::class, 'edit_coat_type'])->name('edit_coat_type');
        route::get('/delete-coat/{coa_id}', [DetailCategoryController::class, 'delete_coat_type'])->name('delete_coat_type');


        
        Route::post('/save-sheeding', [DetailCategoryController::class, 'save_shedding'])->name('save_shedding');
        Route::get('/edit-sheeding/{she_id}', [DetailCategoryController::class, 'edit_shedding'])->name('edit_shedding');
        Route::get('/delete-sheeding/{she_id}', [DetailCategoryController::class, 'delete_shedding'])->name('delete_shedding');

        
        Route::post('/save-size', [DetailCategoryController::class, 'save_size'])->name('save_size');
        Route::get('/edit-size/{siz_id}', [DetailCategoryController::class, 'edit_size'])->name('edit_size');
        Route::get('delete-size/{siz_id}', [DetailCategoryController::class, 'delete_size'])->name('delete_size');
        //

        
        Route::post('/save-trainability', [DetailCategoryController::class, 'save_trainability'])->name('save_trainability');
        Route::get('/edit-trainability/{tra_id}', [DetailCategoryController::class, 'edit_trainability'])->name('edit_trainability');
        Route::get('/delete-trainability/{tra_id}', [DetailCategoryController::class, 'delete_trainability'])->name('delete_trainability');
    });
});

Route::get('forget-password', [forgetPassword::class, 'resetPwdP'])->name('forget_password');
Route::post('forget-password', [forgetPassword::class, 'resetPwdG']);
Route::get('reset-password/{token}', [forgetPassword::class, 'submitResetG'])->name('submit.resetpwd');
Route::post('reset-password', [forgetPassword::class, 'submitResetP'])->name('submit.resetpass');
//Contact
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::post('contact', [ContactController::class, 'send_mail'])->name('addContact');


Route::group(['prefix' => 'user', 'middleware' => ['checkUser']], function () {
    Route::get('/profile', [UserController::class, 'userProfile'])->name('userProfile');
    Route::get('/edit_profile', [UserController::class, 'editProfile'])->name('userEditProfile');
    Route::post('/edit_profile', [UserController::class, 'changeProfile']);
    Route::get('/change_password', [UserController::class, 'changePassG'])->name('changePass');
    Route::post('/change_password', [UserController::class, 'changePassP']);
});

Route::get('/tim-bai-viet', [ShowPostPage::class, 'search_post_page'])->name('search_post_page');
Route::post('/tim-post', [ShowPostPage::class, 'search_post'])->name('search_post');
Route::post('loc-post', [ShowPostPage::class, 'filter_post'])->name('filter_post');
Route::get('/read-post/{post_id}', [ShowPostPage::class, 'read_post'])->name('read_post')->middleware("checkNotLogin");


Route::post('insert-comment',[CommentController::class,'Insert'])->name('insertComment');

Route::get('/image-library',[ImageLibrary::class,'getImage'])->name('show_image')->middleware("checkNotLogin");

/* fix */

Route::get('post-page-form', [PostController::class, 'post_page_form'])->name('post_page_form');
/*  */
Route::get('post-page-card', [PostController::class, 'post_page_card'])->name('post_page_card');
Route::post('search-post-page', [PostController::class, 'search_post_page'])->name('search_post_page');
Route::post('filter-post-page', [PostController::class, 'filter_post_page'])->name('filter_post_page');
Route::get('read-post-page/{post_id}', [PostController::class, 'read_post_page'])->name('read_post_page');

/* fix index */
Route::get('/index-page', [PageIndex::class, 'index_page'])->name('index_page');
/* end fix */

