<?php
use app\controllers\HomeController;
use app\controllers\AdminController;

use rutex\Route;

//USUAIRO COMUN
Route::get("/"          , [HomeController::class, "index"]);
Route::get("/producto"  , [HomeController::class, "producto"]);
Route::get("/catalogo"  , [HomeController::class, "catalogo"]);


//ADMINISTRADOR
Route::get("/admin"          , [AdminController::class, "login"]);
Route::post("/ValidarIngreso", [AdminController::class, "ValidarIngreso"]);

Route::get("/admin/productos", [AdminController::class, "productos"]);
Route::get("/admin/reservas" , [AdminController::class, "reservas"]);