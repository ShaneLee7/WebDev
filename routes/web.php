<?php

use Illuminate\Support\Facades\Route;

// Route 1: Returns a string
Route::get('/route1', function () {
    return "Hello World";
});

// Route 2: Redirects to Route 1
Route::get('/route2', function () {
    return redirect('/route1');
});

// Route 3: Accepts a string parameter
Route::get('/output/{string}', function ($string) {
    return response($string);
});
