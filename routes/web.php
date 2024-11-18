<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\PersonalLibraryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\seriesController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\Guest;
use App\Http\Middleware\Headers;
use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
    return redirect()->route('movies.index');
})->name('main');

Route::middleware([Headers::class])->group(function ()
{
    Route::controller(MoviesController::class)
        ->prefix('movies')
        ->group(function ()
        {
            Route::get('/', 'index')->name('movies.index');
            Route::get('/{movie}', 'show')->name('movies.show');
        });

    Route::controller(ActorController::class)
        ->prefix('actors')
        ->group(function ()
        {
            Route::get('/', 'index')->name('actors.index');
            Route::get('/{actor}', 'show')->name('actors.show');
        });

    Route::controller(seriesController::class)
        ->prefix('series')
        ->group(function ()
        {
            Route::get('/', 'index')->name('series.index');
            Route::get('/{tvShow}', 'show')->name('series.show');
        });

    // Login And Registration Routes they should be accessible only by guest users
    Route::middleware(Guest::class)->group(function ()
    {
        Route::controller(LoginController::class)->group(function ()
        {
            Route::get('/login', 'create')->name('login');
            Route::post('/login', 'authenticate')->name('login.post');
        });

        Route::controller(RegistrationController::class)->group(function ()
        {
            Route::get('/register', 'create')->name('register');
            Route::post('/register', 'store')->name('register.post');
        });
    });

    //Protected Routes
    Route::middleware(Authenticate::class)->group(function ()
    {
        Route::controller(LoginController::class)->group(function ()
        {
            Route::get('/logout', 'logout')->name('logout');
        });

        Route::controller(PersonalLibraryController::class)
            ->prefix('library')
            ->group(function ()
            {
                Route::get('/', 'index')->name('library.favorites');
            });

    });

});
