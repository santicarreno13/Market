<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;

// Rutas User
Route::group(['prefix' => 'Users', 'controller' => UserController::class], function(){

    Route::get('/GetAllUsers', 'getAllUsers');//->GET trae data
    Route::get('/GetAnUser/{user}', 'getAnUser');//->GET trae data por id

    Route::post('/CreateUser', 'createUser');//->POST crea data
    Route::put('/UpdateUser/{user}', 'updateUser');//->PUT actualza data
    Route::delete('/DeleteUser/{user}', 'deleteUser');//->DELETE elimina data

});




//Rutas Categories
Route::group(['prefix' => 'Categories', 'controller' => CategorieController::class], function(){
    Route::get('/GetAllCategories', 'getAllCategories');//->GET trae data
    Route::get('/GetAnCategorie/{categorie}', 'getAnCategorie');//->GET trae data por id
    Route::post('/CreateCategorie', 'createCategorie');//->POST crea data
    Route::put('/UpdateCategories/{categorie}', 'updateCategories');//->PUT actualza data
    Route::delete('/DeleteCategories/{categorie}', 'deleteCategories');//->DELETE elimina data


});

//Rutas Products
Route::group(['prefix' => 'Products', 'controller' => ProductController::class], function(){
    Route::get('/GetAllProducts', 'getAllProducts');//->GET trae data
    Route::get('/GetAllProducts', 'getAllProducts')->name('products');//->GET trae data
    Route::get('/GetAnProduct/{product}', 'getAnProduct');//->GET trae data por id
    Route::post('/CreateProduct', 'createProduct');//->POST crea data
    Route::get('/GetAllProductsDataTable', 'getAllProductsForDataTable');//->GET trae data
    Route::post('/SaveProduct', 'saveProduct');//->POST crea data

    Route::put('/UpdateProducts/{product}', 'updateProducts');//->PUT actualza data
    Route::delete('/DeleteProducts/{product}', 'deleteProducts');//->DELETE elimina data


});



