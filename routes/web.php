<?php



Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password/change', 'HomeController@changePassword')->name('password.change');
Route::post('/password/update', 'HomeController@updatePassword')->name('password.update');
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

//coupon routes:
Route::get('admin/coupons', 'Admin\CouponController@index')->name('coupons');
Route::post('admin/coupon/store', 'Admin\CouponController@store')->name('store.coupon');
Route::get('admin/coupon/delete/{id}', 'Admin\CouponController@destroy')->name('destroy.coupon');
Route::get('admin/coupon/edit/{id}', 'Admin\CouponController@edit')->name('edit.coupon');
Route::post('admin/coupon/update/{id}', 'Admin\CouponController@update')->name('update.coupon');

//Product routes :
Route::get('admin/products', 'Admin\ProductController@index')->name('products');
Route::get('admin/product/create', 'Admin\ProductController@create')->name('product.create');
Route::post('admin/product/store', 'Admin\ProductController@store')->name('store.product');
Route::get('admin/product/show/{id}', 'Admin\ProductController@show')->name('show.product');
Route::get('admin/product/delete/{id}', 'Admin\ProductController@destroy')->name('destroy.product');
Route::get('admin/product/edit/{id}', 'Admin\ProductController@edit')->name('edit.product');
Route::post('admin/product/update/{id}', 'Admin\ProductController@update')->name('update.product');
Route::post('admin/product/update-photo/{id}', 'Admin\ProductController@updatePhoto')->name('update.product.photo');

Route::get('product/inactive/{id}', 'Admin\ProductController@inactive');
Route::get('product/active/{id}', 'Admin\ProductController@active');

// For Showing Sub category with ajax
Route::get('get/subcategory/{category_id}', 'Admin\ProductController@getSubCat');

//Wishlist route
Route::get('add/wishlist/{id}', 'WishlistController@addWishlist');

// Add to Cart Route 
Route::get('add/cart/{id}', 'CartController@AddToCart'); //add to cart from index page via ajax.
Route::get('check', 'CartController@check');
Route::get('mycart', 'CartController@ShowCart')->name('show.cart');
Route::get('mycart/remove/{rowId}', 'CartController@removeCart')->name('remove.cart');
Route::post('mycart/update', 'CartController@UpdateCart')->name('update.cartitem');

Route::get('/cart/product/view/{id}', 'CartController@ViewProduct');
Route::post('insert/into/cart/', 'CartController@insertCart')->name('insert.into.cart');

Route::get('checkout/', 'CartController@Checkout')->name('user.checkout');
Route::get('wishlist', 'CartController@wishlist')->name('user.wishlist');

//product details route
Route::get('product/{id}', 'ProductController@ShowDetails')->name('product.details');
Route::post('product/add-to-cart/{id}', 'ProductController@AddToCart')->name('product.add.cart');

