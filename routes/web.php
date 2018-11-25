<?php

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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::resource('suggestions', 'SuggestionController');
    Route::get('health-science', function(){
        return view('components.health');
    });
    Route::get('pure-applied', function(){
        return view('components.applied');
    });
    Route::get('human-resource', function(){
        return view('components.human');
    });
    Route::get('engineering-tech', function(){
        return view('components.engineering');
    });
    Route::get('agriculture', function(){
        return view('components.agriculture');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
