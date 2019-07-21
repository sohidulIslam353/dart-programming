<?php


Route::get('/', function () {
    return view('welcome');
});


Route::get('/{vue_capture?}',function () {
	    return view('welcome');
	})->where('vue_capture', '[\/\w\.-]*');




