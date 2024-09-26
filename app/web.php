<?php
use app\controllers\TestController;
use app\controllers\HomeController;

use rutex\Route;

Route::get("/"                      , [HomeController::class, "index"]);
Route::get("/producto"              , [HomeController::class, "producto"]);
Route::get("/catalogo"              , [HomeController::class, "catalogo"]);

Route::get("/login"                 , [HomeController::class, "login"]);
Route::get("/registro"          , [HomeController::class, "registro"]);


Route::post("/login"                , [HomeController::class, "ValidarIngreso"]);
Route::post("/ValidarRegistro"      , [HomeController::class, "ValidarRegistro"]);