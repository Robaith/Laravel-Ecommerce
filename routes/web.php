<?php



Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');


/*                              ADMIN ROUTES                                */
//Category routes :
Route::get('admin/categories', 'Admin\Category\CategoryController@index')->name('categories');
Route::post('admin/category/store', 'Admin\Category\CategoryController@store')->name('store.category');
Route::get('admin/category/delete/{id}', 'Admin\Category\CategoryController@destroy')->name('destroy.category');
Route::get('admin/category/edit/{id}', 'Admin\Category\CategoryController@edit')->name('edit.category');
Route::post('admin/category/update/{id}', 'Admin\Category\CategoryController@update')->name('update.category');

//Brand routes :
Route::get('admin/brands', 'Admin\Category\BrandController@index')->name('brands');
Route::post('admin/brand/store', 'Admin\Category\BrandController@store')->name('store.brand');
Route::get('admin/brand/delete/{id}', 'Admin\Category\BrandController@destroy')->name('destroy.brand');
Route::get('admin/brand/edit/{id}', 'Admin\Category\BrandController@edit')->name('edit.brand');
Route::post('admin/brand/update/{id}', 'Admin\Category\BrandController@update')->name('update.brand');

//Sub Category routes :
Route::get('admin/subcategories', 'Admin\Category\SubCategoryController@index')->name('subcategories');
Route::post('admin/subcategory/store', 'Admin\Category\SubCategoryController@store')->name('store.subcategory');
Route::get('admin/subcategory/delete/{id}', 'Admin\Category\SubCategoryController@destroy')->name('destroy.subcategory');
Route::get('admin/subcategory/edit/{id}', 'Admin\Category\SubCategoryController@edit')->name('edit.subcategory');
Route::post('admin/subcategory/update/{id}', 'Admin\Category\SubCategoryController@update')->name('update.subcategory');
