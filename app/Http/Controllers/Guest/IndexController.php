<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class IndexController extends Controller
{
    //

    public function index() {

        return view("guest.index");
    }
}
