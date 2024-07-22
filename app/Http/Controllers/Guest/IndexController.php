<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class IndexController extends Controller
{
    //

    public function index() {
        $animals = Animal::all();

        return view("guest.index", compact("animals"));
    }
}
