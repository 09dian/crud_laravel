<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardPostController;



// Route resource untuk DashboardPostController
Route::resource('/posts', DashboardPostController::class);
