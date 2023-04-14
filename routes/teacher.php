<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group(
    [

        'middleware' => [ 'auth:teacher']
    ], function () {

    //==============================dashboard============================
    Route::get('/teacher/dashboard', function () {
        return view('admin.studant.dashboard');
    });

});
