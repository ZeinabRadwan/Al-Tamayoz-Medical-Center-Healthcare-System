<?php

use App\Http\Controllers\Api\V1\IntegrationController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('integrations')->group(function () {
        Route::get('/services', [IntegrationController::class, 'services']);
    });
});
