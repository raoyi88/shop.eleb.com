<?php
//商品分类的资源路由
Route::resource('shopcategory','Shop_CategoryController');
Route::resource('shop','ShopController');
Route::resource('user','UserController')->middleware('check');
Route::resource('session','SessionsController');
Route::delete('logout','SessionsController@logout')->name('logout');
Route::get('newpassword','UserController@newpassword')->name('newpassword');
Route::post('newpass','UserController@savenewpass')->name('newpass');
Route::resource('menucategory','MenuCategoryController');
Route::delete('destroy','MenuCategoryController@destroy')->name('destroy');
Route::resource('menu','MenuController');
Route::get('get_shops','ShopController@getShops');
Route::get('artivity','ArtivityController@index')->name('artivity');
Route::resource('order','OrderController');
//订单统计
Route::get('CountOrder','OrderController@CountOrder')->name('CountOrder');
Route::resource('event','EventController');
Route::get('baoming/{event}','EventController@baoming')->name('baoming');

