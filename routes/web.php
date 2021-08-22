<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;


// Backend Route

//Backend Login Route

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('admin.login.form');
    Route::post('/login', 'LoginController@login')->name('admin.login');

    Route::middleware(['auth:admin'])->group(function () {
        Route::post('/logout', 'LoginController@logout')->name('admin.logout');
        Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    });
});

// Backend Controller Route 

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    //Route::get('/', 'IndexController@index')->name('index');


    //Admin Category

    //Route::resource('category', 'CategoryController', ['names' => 'admin.category']);

    //Admin Slider

    Route::resource('slider', 'SliderController', ['names' => 'admin.slider']);
    Route::post('slider/inactive', 'SliderController@inactive')->name('admin.slider.inactive');

    //Admin Product

    Route::resource('product', 'productController', ['names' => 'admin.product']);
    Route::post('product/inactive', 'ProductController@inactive')->name('admin.product.inactive');

    //Admin Plantation

    Route::resource('plantation', 'PlantationController', ['names' => 'admin.plantation']);
    Route::post('plantation/inactive', 'PlantationController@inactive')->name('admin.plantation.inactive');

    //Admin Plantation

    Route::resource('plantation-right', 'PlantationrightController', ['names' => 'admin.plantationright']);
    Route::post('plantation-right/inactive', 'PlantationrightController@inactive')->name('admin.plantationright.inactive');

    //Admin About Us

    Route::resource('about', 'AboutController', ['names' => 'admin.about']);
    Route::post('about/inactive', 'AboutController@inactive')->name('admin.about.inactive');

    //Admin Footer

    Route::resource('footer', 'FooterController', ['names' => 'admin.footer']);
    Route::post('footer/inactive', 'FooterController@inactive')->name('admin.footer.inactive');

    //Admin Topbar

    //Route::resource('topbar', 'TopbarController', ['names' => 'admin.topbar']);

    //Admin Profile

    Route::get('profile', 'ProfileController@index')->name('admin.profile');
    Route::put('profile-update', 'ProfileController@updateProfile')->name('admin.profile.update');
    Route::get('password', 'ProfileController@Password')->name('admin.password');
    Route::put('password-update', 'ProfileController@updatePassword')->name('admin.update.password');

    // Admin General Setting

    Route::get('setting', 'SettingController@index')->name('admin.setting');
    Route::patch('setting-update', 'SettingController@update')->name('admin.setting.update');

    // Admin Appearance Setting

    Route::get('appearance', 'SettingController@appearance')->name('admin.appearance');
    Route::patch('appearance-update', 'SettingController@appearanceUpdate')->name('admin.appearance.update');

    // Admin Mail Setting

    Route::get('mail', 'SettingController@mail')->name('admin.mail');
    Route::patch('mail-update', 'SettingController@mailUpdate')->name('admin.mail.update');
});





// Frontend Route

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/contact', 'IndexController@contact')->name('contact');
    Route::get('/test', 'IndexController@test')->name('test');
});

//Route::view('/ss', 'backend.property.index')->name('ss');


Auth::routes();

// Socialite routes
Route::group(['as' => 'login.', 'prefix' => 'login', 'namespace' => 'Auth'], function () {
    Route::get('/{provider}', 'LoginController@redirectToProvider')->name('provider');
    Route::get('/{provider}/callback', 'LoginController@handleProviderCallback')->name('callback');
});

Route::get('/home', 'HomeController@index')->name('home');
