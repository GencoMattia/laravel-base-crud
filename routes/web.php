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

route::get("/guest/animals/index", [GuestIndexController::class, "index"])->name("guest.animals.index");

route::get("/admin/animals/index", [AnimalController::class, "index"])->name("admin.animals.index");

route::get("/admin/animals/create", [AnimalController::class, "create"])->name("admin.animals.create");

route::post("/admin/animals/index", [AnimalController::class, "store"])->name("admin.animals.store");

route::get("/admin/animals/index/{animal}", [AnimalController::class, "show"])->name("admin.animals.show");

route::get("/admin/animals/index/{animal}/edit", [AnimalController::class, "edit"])->name("admin.animals.edit");

route::put("/admin/animals/index/{animal}", [AnimalController::class, "update"])->name("admin.animals.update");
