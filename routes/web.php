<?php

use App\Http\Livewire;
use App\Url;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // return Redirect::to('https://griyayatim.com/');
    return view('welcome');
});

// Route::get('/', function (){
//     return view('welcome');
// })
Auth::routes();

// Route::livewire('/datatable', 'datatable')->name('datatable');

Route::livewire('/home','home')->middleware('auth')->name('home');
Route::get('/{link}', function (Url $link)
{
    $link->increment('visits');
        return redirect($link->original_url);
})->name('redirect');

Route::livewire('/create','create')->middleware('auth')->name('createUrl');


// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/{link}', 'HomeController@mount')->name('redirect');
// Route::post('{link}/{id}', 'HomeController@edit')->name('edit');
// Route::post('{link}/{id}', 'HomeController@delete')->name('delete');