<?php

use App\Models\User;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\Api\TechnicianController as ApiTechnicianController;


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


Route::prefix('/')->group(function () {
    Route::get('login-page', function () {
        return view('auth.login', ['title' => 'Login']);
    })->name('login.auth');

    Route::get('register-page', function () {
        return view('auth.register', ['title' => 'Register']);
    })->name('register.auth');

    Route::get('', function () {
        return view('index', [
            'title' => 'Home'
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

    Route::get('techs', function () {
        return view('teknisi.technician', [
            'title' => 'Teknisi'
        ]);
    });
    Route::get('form-transc1', function () {
        return view('transactionForm', [
            'title' => 'Transaksi Form',
        ]);
    });
    Route::get('form-transc', function () {
        return view('transactionForm1', [
            'title' => 'Transaksi Form',
        ]);
    });

    // Route::get('profile', function () {
    //     return view('profile', [
    //         'title' => 'Profile'
    //     ]);
    // });

    Route::get('notifikasi', function () {
        return view('notifikasi', [
            'title' => 'Notifikasi'
        ]);
    });

    Route::get('/tech', [TechnicianController::class, 'showAll'])->name('tech.show');
    Route::get('/tech/{id_tech}', [TechnicianController::class, 'showTech'])->name('tech.detail');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/inbox', [MessageController::class, 'index'])->name('inbox.index');
    Route::get('/statistik', [TechnicianController::class, 'statistik'])->name('statisik');
    //Route::get('/profile', [TechnicianController::class, 'myProfile'])->name('profile');
    Route::get('/profile/{username}', [CustomerController::class, 'edit'])->name('profile');
    Route::get('/tech/profile/{username}', [TechnicianController::class, 'edit'])->name('profile.tech');
    Route::put('/profile/{username}', [CustomerController::class, 'updateCust'])->name('cust.update');
    Route::put('/tech//profile/{username}', [TechnicianController::class, 'updateCust'])->name('tech.update');
    Route::get('/detailOrder', function () {
        return view(
            'teknisi.detailOrder',
            ['title' => 'Order Detail']
        );
    })->name('teknisi.detailOrder');
});
