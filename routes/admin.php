<?php

use Illuminate\Support\Facades\Route;

route::get('/admin', function(){
 
 return 'Hola Mundo';

});


route::prefix('/admin')->group(function(){

    route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'getDashboard'])->name('dashboard');
    route::get('/user/{var?}', [App\Http\Controllers\Admin\UserController::class, 'getuser'])->name('index_user');
    route::get('/user/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edituser'])->name('edit_user');
    route::post('/user/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'updateuser'])->name('edit_user');
    route::get('/user/permission/{id}', [App\Http\Controllers\Admin\UserController::class, 'permissionuser'])->name('permission_user');
    route::post('/user/permission/{id}', [App\Http\Controllers\Admin\UserController::class, 'post_permissionuser'])->name('permission_user');

    route::post('/user/role/{id}', [App\Http\Controllers\Admin\UserController::class, 'roleuser'])->name('role_user');
    
    route::post('/user/suspender/{id}', [App\Http\Controllers\Admin\UserController::class, 'suspenderuser'])->name('suspender_user');




    
    route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'getcategory'])->name('index_category');

    route::get('/categories/create/{id_category?}', [App\Http\Controllers\Admin\CategoryController::class, 'categoryadd'])->name('create_category');
   route::post('/categories/create/{id_category?}', [App\Http\Controllers\Admin\CategoryController::class, 'categoryStore'])->name('create_category');


   route::get('/categories/edit/{id_category}/{search?}', [App\Http\Controllers\Admin\CategoryController::class, 'categoryedit'])->name('edit_category');
  route::post('/categories/edit/{id_category}/{search?}', [App\Http\Controllers\Admin\CategoryController::class, 'categoryupdate'])->name('edit_category');

   route::delete('/categories/delete/{id_category}', [App\Http\Controllers\Admin\CategoryController::class, 'categorydelete'])->name('category.delete');




    route::get('/products/index/{estado?}', [App\Http\Controllers\Admin\ProductorController::class, 'getproduct'])->name('index_product');

   

    route::get('/products/create', [App\Http\Controllers\Admin\ProductorController::class, 'productadd'])->name('create_product');

    route::post('/products/create', [App\Http\Controllers\Admin\ProductorController::class, 'productstore'])->name('create_product');

    route::get('/products/edit/{id_products}', [App\Http\Controllers\Admin\ProductorController::class, 'productedit'])->name('edit_product');

    route::POST('/products/edit/{id_products}', [App\Http\Controllers\Admin\ProductorController::class, 'productsupdate'])->name('edit_product');



    route::POST('/products/update/{id_products}/product_gallery', [App\Http\Controllers\Admin\ProductorController::class, 'addImage'])->name('product.gallery');

    route::get('/products/delete/{id_products}', [App\Http\Controllers\Admin\ProductorController::class, 'productdestroy'])->name('product_destroy');

    route::get('/products/restore/{id_products}', [App\Http\Controllers\Admin\ProductorController::class, 'productrestore'])->name('product_restore');

    route::DELETE('/product_gallery/delete/{id}', [App\Http\Controllers\Admin\ProductorController::class, 'product_gallerydestroy'])->name('gallery.destroy');

});