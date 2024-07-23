<?php

use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Guest\IndexController as GuestIndexController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

route::get("/", [HomePageController::class, "home"])->name("home");

route::get("/index", [GuestIndexController::class, "index"])->name("guest.index");

route::get("/index", [AnimalController::class, "index"])->name("admin.animals.index");

route::get("/index/create", [AnimalController::class, "create"])->name("admin.animal.create");

route::post("/index", [AnimalController::class, "store"])->name("admin.animal.store");

route::get("/index/{id}", [AnimalController::class, "show"])->name("admin.animals.show");
