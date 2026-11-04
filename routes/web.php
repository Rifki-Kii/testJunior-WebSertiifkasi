
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MovieList;
use App\Http\Livewire\Order;
use App\Http\Livewire\OrderHistory;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;


Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});



Route::middleware('auth')->group(function () {
    Route::get('/', MovieList::class)->name('dashboard');
    Route::get('/order/{movie_id?}', Order::class)->name('order');
    Route::get('/history', OrderHistory::class)->name('history');

    Route::post('/logout', function () {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});

