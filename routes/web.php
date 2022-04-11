<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
    Route::get('/indexTeknisi', function () {
        return view('teknisi.technician');
    })->name('teknisi.index');
// });

Route::prefix('/')->group(function () {
    Route::get('login-page', function () {
        return view('auth.login', ['title' => 'Login']);
    })->name('login.auth');


    Route::get('register-page', function () {
        return view('auth.register', ['title' => 'Register']);
    })->name('register.auth');

    Route::get('', function () {
        return view('index', [
            'title'=> 'Home'
        ]);
    })->name('index.home');

    Route::get('service', function () {
        return view('service', [
            'title' => 'Service'
        ]);
    })->name('service.home');

    Route::get('contact', function () {
        return view('contact', [
            'title' => 'Contact'
        ]);
    })->name('contact.home');

    Route::get('about', function () {
        return view('about', [
            'title' => 'About'
        ]);
    })->name('about.home');

    Route::get('tec', function () {
        return view('teknisi.technician', [
            'title' => 'Teknisi'
        ]);
    });
});


Route::group(['middleware' => 'auth'], function () {
    //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/inbox', [MessageController::class, 'index'])->name('inbox.index');
    Route::get('/inbox/{id}', [MessageController::class, 'show', 'title' => 'Message'])->name('inbox.show');
    Route::get('/detailOrder', function () {
        return view(
            'teknisi.detailOrder',
            ['title' => 'Order Detail'])
        ;
    })->name('teknisi.detailOrder');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
