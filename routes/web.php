<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;


Route::get('/test',function (){
  
  // Para la asigniacion de roles de todos los users menos el primero que es admin
  // $users = User::get();
  // foreach( $users as $user){
  //     if ($user->number_id == 1023302510) $user->assignRole('admin');
  //     else $user->assignRole('user');
  // } 
  //Creacion de roles...
  // Role::create(['name' => 'user']);
  // return Role::all()->pluck('name');
});

Route::get('/', [BookController::class, 'showHomeWithBooks'])->name('home');

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

// Books
Route::group([
  'prefix' => 'Books','middlware' => ['auth','role:admin'],
  'controller' => BookController::class], function(){

    Route::get('/','showBooks')->name('books');
    Route::post('/SaveBook', 'saveBook');//->POST crea data
    Route::get('/GetAllBooks', 'getAllBooks');//->GET trae data
    Route::get('/GetAllBooksDataTable', 'getAllBooksForDataTable');//->GET trae data
    Route::get('/GetABook/{book}', 'getABook');
    Route::post('/UpdateBook/{book}', 'updateBook');
    Route::delete('/DeleteABook/{book}', 'deleteBook'); 
});

//Rutas Categories
Route::group(['prefix' => 'Categories', 'controller' => CategorieController::class], function(){
  Route::get('/GetAllCategories', 'getAllCategories');//->GET trae data
  // Route::get('/GetAnCategorie/{categorie}', 'getAnCategorie');//->GET trae data por id
  // Route::post('/CreateCategorie', 'createCategorie');//->POST crea data
  // Route::put('/UpdateCategories/{categorie}', 'updateCategories');//->PUT actualza data
  // Route::delete('/DeleteCategories/{categorie}', 'deleteCategories');//->DELETE elimina data


});

//Rutas Authors
Route::group(['prefix' => 'Authors', 'controller' => AuthorController::class], function(){
  Route::get('/GetAllAuthors', 'getAllAuthors');//->GET trae data
  // Route::get('/GetAnAuthor/{author}', 'getAnAuthor');//->GET trae data por id
  // Route::post('/CreateAuthor', 'createAuthor');//->POST crea data
  // Route::put('/UpdateAuthors/{author}', 'updateAuthors');//->PUT actualza data
  // Route::delete('/DeleteAuthors/{author}', 'deleteAuthors');//->DELETE elimina data


});

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


