<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\ShoppingCartDetailController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;


Route::get('/test',function (){
  
  // Para la asigniacion de roles de todos los users menos el primero que es admin
        // $users = User::get();
        //   foreach( $users as $user){
        //       if ($user->number_id == 1023302510) $user->assignRole('admin');
        //       else $user->assignRole('user');
        //   } 
  //Creacion de roles...
        // Role::create(['name' => 'user']);
        //  return Role::all()->pluck('name');
});




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
  'prefix' => '', 'middlware' => ['auth','role:admin'],
  'controller' => HomeController::class], 
  function(){
    Route::get('/home','index')->name('home');
});

Route::get('/', [ProductController::class, 'showHomeWithProducts'])->name('home');

// Users
Route::group([
  'prefix' => 'Users', 'middlware' => ['auth','role:admin'],
  'controller' => UserController::class], 
  function(){
    Route::get('/','showAllUsers')->name('users');
    Route::get('/CreateUser','showCreateUser')->name('user.create');
    Route::get('/EditUser/{user}','showEditUser')->name('user.edit');

    Route::post('/CreateUser','createUser')->name('user.create.post');
    Route::put('/EditUser/{user}','updateUser')->name('user.edit.put');
    Route::delete('/DeleteUser/{user}','deleteUser')->name('user.delete');
});

// Products
Route::group([
  'prefix' => 'Products','middlware' => ['auth','role:admin'],
  'controller' => ProductController::class], function(){

    Route::get('/','showProducts')->name('products');
    Route::post('/SaveProduct', 'saveProduct');//->POST crea data
    Route::get('/GetAllProducts', 'getAllProducts');//->GET trae data
    Route::get('/GetAllProductsDataTable', 'getAllProductsForDataTable');
    Route::get('/GetAProduct/{product}', 'getAProduct');
    Route::post('/UpdateProduct/{product}', 'updateProduct');
    Route::delete('/DeleteAProduct/{product}', 'deleteProduct'); 
});

//Rutas Categories
Route::group(['prefix' => 'Categories', 'controller' => CategorieController::class], function(){

  Route::get('/','showCategories')->name('categories');
    Route::post('/SaveCategory', 'saveCategory');//->POST crea data
    Route::get('/GetAllCategories', 'getAllCategories');//->GET trae data
    Route::get('/GetAllCategoriesDataTable', 'getAllCategoriesForDataTable');
    Route::get('/GetACategory/{category}', 'getACategory');
    Route::post('/UpdateCategory/{category}', 'updateCategory');
    Route::delete('/DeletACategory/{category}', 'deleteCategory'); 
    
});

 Route::group(['prefix' => 'shopping_cart_detail', 'controller' => ShoppingCartDetailController::class], function(){

   Route::post('/','store')->name('shopping_cart_details');

  });


    Route::get('/details/{product}', [ProductController::class,'details'])->name('details');



Route::group(['controller' => LoginController::class], function(){

  // Login Routes..
  Route::get('login', 'showLoginForm')->name('login');
  Route::post('login', 'login');
  

  // Logout Routes...
  Route::post('logout', 'logout')->name('logout');

});

Route::group(['controller' => ForgotPasswordController::class], function(){

  // Password Reset Routes...
Route::get('password/reset', 'showLinkRequestForm')->name('password.request');
Route::post('password/email', 'sendResetLinkEmail')->name('password.email');

});

Route::group(['controller' => ResetPasswordController::class], function(){

    
    Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
    Route::post('password/reset', 'reset')->name('password.update');
  
  });   

Route::group(['controller' => ConfirmPasswordController::class], function(){

    // Password Confirmation Routes...
    Route::get('password/confirm', 'showConfirmForm')->name('password.confirm');
    Route::post('password/confirm', 'confirm');
  
  });    


Route::group(['controller' => VerificationController::class], function(){

    // Email Verification Routes...

Route::get('email/verify', 'show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'verify')->name('verification.verify');
Route::post('email/resend', 'resend')->name('verification.resend');
  
  });     



Auth::routes();

