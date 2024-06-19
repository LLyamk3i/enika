<?php

Use App\Http\Controllers\Api;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::post(uri:'/reports', action: [Api\ReportController::class, 'store']);
});
