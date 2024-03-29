<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

// api front
Route::get('/home', 'Front\HomeController@index')->name('index');
Route::get('/', 'Front\HomeController@index')->name('index');
Route::get('/hidroponik', 'Front\ProductController@hidroponik')->name('hidroponik');
Route::get('/cafe', 'Front\ProductController@cafe')->name('cafe');
Route::get('/edufarm', 'Front\ProductController@edufarm')->name('edufarm');
Route::get('/phone', 'Front\ProductController@phone')->name('phone');
Route::get('/article', 'Front\ArticleController@index')->name('article');
Route::get('/article_detail', 'Front\ArticleController@detail')->name('article_detail');
Route::get('/about_us', 'Front\AboutusController@index')->name('about_us');
Route::get('/contact_us', 'Front\ContactusController@index')->name('contact_us');
Route::post('/contact_us/create', 'Front\ContactusController@create')->name('contact_us');

/**
 * Admin routes
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
    Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
    Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);
    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::get('/forgotPassword', 'Backend\Auth\ForgotPasswordController@showForgotPasswordForm')->name('admin.forgotPassword');

    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');
    Route::post('/checkSendMail', 'Backend\Auth\ForgotPasswordController@checkSendMail')->name('admin.forgotPassword.checkSendMail');
    Route::get('/verifyToken/{token}', 'Backend\Auth\ForgotPasswordController@verifyToken')->name('admin.forgotPassword.verifyToken');
    Route::post('/checkPassword', 'Backend\Auth\ForgotPasswordController@checkPassword')->name('admin.forgotPassword.checkPassword');

    // Logout Routes
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');

    // Forget Password Routes
    // Route::get('/password/reset', 'Backend\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    // Route::post('/password/reset/submit', 'Backend\Auth\ForgetPasswordController@reset')->name('admin.password.update');

    Route::resource('jabatans', 'Backend\JabatanController', ['names' => 'admin.jabatans']);
    Route::resource('optionMaps', 'Backend\OptionMapController', ['names' => 'admin.optionMaps']);
    Route::resource('produks', 'Backend\ProdukController', ['names' => 'admin.produks']);
    Route::resource('kategoris', 'Backend\KategoriController', ['names' => 'admin.kategoris']);
    Route::resource('kontakKami', 'Backend\KontakKamiController', ['names' => 'admin.kontakKami']);
    Route::post('replayMessage', 'Backend\KontakKamiController@replayMessage')->name('admin.replayMessage');


    
    // Route::resource('kontakUnitBisnis', 'Backend\KontakUnitBisnisController', ['names' => 'admin.kontakUnitBisnis']);
    Route::resource('visiMisi', 'Backend\VisiMisiController', ['names' => 'admin.visiMisi']);
    Route::resource('artikels', 'Backend\ArtikelController', ['names' => 'admin.artikels']);
    Route::resource('kontakBisnis', 'Backend\KontakUnitBisnisController', ['names' => 'admin.kontakBisnis']);
    Route::resource('homes', 'Backend\HomeController', ['names' => 'admin.homes']);
    Route::resource('tentangKita', 'Backend\TentangKitaController', ['names' => 'admin.tentangKita']);
    Route::resource('mailSetting', 'Backend\TableMailSettingController', ['names' => 'admin.mailSetting']);

    
});
