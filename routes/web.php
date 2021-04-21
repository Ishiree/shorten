<?php

use App\Http\Livewire;
use App\Url;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return Redirect::to('https://griyayatim.com/');
    // return view('welcome');
});

Auth::routes();

Route::livewire('/user-page', 'user-page')
->middleware('auth')
->name('user-page');

Route::livewire('/administrator', 'administrator')
->middleware('auth','role:administrator')
->name('administrator');

Route::livewire('/platform', 'platform')
->middleware('auth')
->name('platform');

Route::livewire('/index','index')
->middleware('auth')
->name('index');

Route::livewire('/url','home')
->middleware('auth')
->name('home');

Route::get('/{link}', function (Url $link)
{
    $link->increment('visits');
        return redirect($link->original_url);
})->name('redirect');
