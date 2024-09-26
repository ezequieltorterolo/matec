<?php
use app\controllers\HomeController;
use app\controllers\AdminController;

use rutex\Route;

Route::get("/"          , [HomeController::class, "index"]);
Route::get("/producto"  , [HomeController::class, "producto"]);
Route::get("/catalogo"  , [HomeController::class, "catalogo"]);