<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return 'This is a test route.';
})->name('test');

Route::get('/hello/{name}', function ($name) {
    return "Hello, $name!";
})->name('hello')
->where('name', '[A-Za-z]+');

#Syntax Laravel 10
Route::get('/test1', function() {
    return view('hello');
});

#New Syntax
Route::view('/test2/{id}', 'hello', ['id' => 'testparameter']);

#Old form treatment syntax
Route::get('/afficherForm', function() {
    return "Affichage d'un formulaire";
});

Route::post('/traiterForm', function() {
    return "Traitement du formulaire";
});

#New form treatment syntax (Match combines both GET and POST)
Route::match(['GET', 'POST'], '/form', function() {
    if(request()->isMethod('post')) {
        return "Traitement du formulaire";
    }
    return "Affichage d'un formulaire";
});

Route::get('/welcomeController', [WelcomeController::class, 'index']);