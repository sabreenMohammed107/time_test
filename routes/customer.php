
<?php

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
|
| 
|   \Customer
*/
Route::namespace('Customer')->group(function () {
  /*----------------------Home---------------------------*/
  Route::get('/index', 'IndexController@index');
  /*--------------------web shop -----------------------*/
  Route::get('/shop/{id}', 'ShopController@sliderView')->name('shop');
  Route::post('addReview', 'ShopController@addReview')->name('testReview');
  Route::post('addContact', 'ShopController@addContact');

  Route::get('/shop/fetch_data', 'ShopController@fetch_data');
  Route::get('/shop/fetch_product', 'ShopController@fetch_product');
  //filtter
  Route::get('/fetch_productWhere', 'ShopController@fetch_productWhere');
  Route::get('/fetch_productBrands', 'ShopController@fetch_productBrands');
  Route::get('/fetch_productGenders', 'ShopController@fetch_productGenders');
  Route::get('/fetch_productOffers', 'ShopController@fetch_productOffers');
  Route::get('/selectSort', 'ShopController@selectSort');

  //favourite
  Route::get('/shop/addfavourite', 'ShopController@addfavourite');
  Route::get('/shop/deletefavourite', 'ShopController@deletefavourite');

  Route::post('/fetch_productPrice', 'ShopController@fetch_productPrice');

  Route::get('/shop/getCatList', 'ShopController@getCatList');
  /*---------------------------web Category------------------------------ */
  Route::get('/category/{id}', 'CategoryController@index')->name('category');
  //filtter
  Route::get('/fetch_productWhereCategory', 'CategoryController@fetch_productWhere');
  Route::get('/fetch_productBrandsCategory', 'CategoryController@fetch_productBrands');
  Route::get('/fetch_productGendersCategory', 'CategoryController@fetch_productGenders');
  Route::get('/fetch_productOffersCategory', 'CategoryController@fetch_productOffers');
  Route::get('/fetch_productShopCategory', 'CategoryController@fetch_productShop');
  Route::post('/fetch_productPriceCategory', 'CategoryController@fetch_productPrice');
  Route::get('/selectSortCategory', 'CategoryController@selectSort');

  /*---------------------------web product------------------------------ */

      //Get Product Id
   Route::get('/product', 'ProductController@index')->name('product');
   Route::post('addProductReview', 'ProductController@addProductReview');
   Route::post('/product/fetch_data', 'ProductController@fetch_data');


   //favourite
   Route::get('/product/addfavourite', 'ProductController@addfavourite');
   Route::get('/product/deletefavourite', 'ProductController@deletefavourite');
   /*-----------------------------web cart------------------------------------*/
   Route::resource('/cart', 'CartController');
   Route::get('/cart/client/{id}', 'CartShowController@index')->name('cartShowing');
   Route::post('updatCart', 'CartShowController@updatCart')->name('updatCart');
   Route::post('destoryCart/{id}', 'CartShowController@destroy')->name('destoryCart');

   Route::post('confirmOrder', 'CartShowController@confirmOrder')->name('confirming');
   /*------------------------autocomplete Search------------------------------------------- */
   Route::get('autocomplete', 'IndexController@search')->name('autocomplete');

   /*-----------------------------------web profile ---------------------------------------------*/
   Route::get('/profile/{id}', 'ProfileController@index')->name('profile');
   Route::post('updateAccount', 'ProfileController@updateAccount');
   Route::get('/profilePass/{id}', 'ProfileController@changePass')->name('profilePass');

Route::get('fetch_data', 'ProfileController@fetch_data');
Route::get('fetch_orderData', 'ProfileController@fetch_orderData');
Route::get('/orderDetails/{id}', 'ProfileController@orderDetails')->name('orderDetails');
Route::get('deleteFromFavourite', 'ProfileController@deleteFromFavourite');


// //  Change Lang..
Route::get('changeLang/{lang}', function($lang){

	\Session::put('locale', $lang);

	return redirect()->back();

});

});

// Auth routes 
Auth::routes();
// Route::namespace('Auth')->group(function () {

//    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
//    Route::post('login', 'LoginController@login')->name('admin.login.post');

//    Route::post('/logout', 'AdminLoginController@admin_logout')->name('admin.logout');


//    Route::post('password/email', 'AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
//    Route::get('password/reset', 'AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
//    Route::post('password/reset', 'AdminResetPasswordController@reset')->name('admin.password.update');
//    Route::get('password/reset/{token}', 'AdminResetPasswordController@showResetForm')->name('admin.password.reset');

// });
