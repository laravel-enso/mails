<?php

use Illuminate\Support\Facades\Route;
use LaravelEnso\Mails\Http\Controllers\PreviewController;

Route::middleware('web')
    ->prefix('enso-mails-preview')
    ->as('enso-mails-preview.')
    ->group(function () {
        Route::get('/', [PreviewController::class, 'index'])->name('index');
        Route::get('{preview}', [PreviewController::class, 'show'])->name('show');
    });
