<?php  

Route::group(['namespace'=>'ShopAdmin'],function () { 
    
Route::get('/shop-manager', 'shopController@adminHome')->name('shop-manager');
/*--------------------shopData-----------------------*/
Route::resource('/shop-manager/shop', 'shopController');

Route::get('subcategories/{id}','shopController@fetch');
Route::post('shop_category', 'shopController@shop_category')->name('shop_categories');
Route::post('shop_categorydestroy/{id}', 'shopController@shop_categoryDestroy')->name('shop_categoryDestroy');

Route::get('fetch_reviews', 'ShopController@fetchReviews');
Route::get('fetch_contacts', 'ShopController@fetchContacts');
Route::get('imageslider_update/{id}','shopController@fetch_slider');

Route::post('imageslider_update/{id}', 'shopController@imageSliderUpdate')->name('imagesSlider_update');

Route::post('imageslider_store/{id}', 'shopController@imageSliderStore')->name('imagesSlider_store');

Route::post('imageSliderDestroy/{id}', 'shopController@imageSliderDestroy')->name('imageSliderDestroy');

/*--------------------- Products -----------------------------*/

Route::resource('/shop-manager/products', 'productsController');
Route::get('productslider_update/{id}','productsController@edit_slider');

Route::post('productslider_update/{id}', 'productsController@productSliderUpdate')->name('productSlider_update');
Route::post('productslider_store/{id}', 'productsController@productSliderStore')->name('productSlider_store');
Route::post('productSliderDestroy/{id}', 'productsController@productSliderDestroy')->name('productSlider_destroy');

Route::post('relatedproducts_store/{id}', 'productsController@relatedProductsStore')->name('relatedproducts_store');

Route::post('relatedproducts_destroy/{id}', 'productsController@relatedProductsDestroy')->name('relatedproducts_destroy');
Route::get('fetch_productreviews', 'productsController@fetchReviews');

Route::post('productFeature_store/{id}', 'productsController@productFeatureStore')->name('productFeature_store');
Route::post('productFeatureDestroy/{id}', 'productsController@productFeatureDestroy')->name('productFeature_destroy');
Route::get('productfeature_update/{id}','productsController@edit_feature');
Route::post('productfeature_update/{id}', 'productsController@productFeatureUpdate')->name('productFeature_update');

/*--------------------- Orders -----------------------------*/
Route::resource('/shop-manager/orders', 'ordersController');


});

Route::get('shop-login', 'Auth\loginShopAdminController@showLoginForm');
Route::post('shop-login', 'Auth\loginShopAdminController@login')->name('shop-login');
Route::post('shopadmin-logout', 'Auth\loginShopAdminController@logout')->name('shopadmin-logout');