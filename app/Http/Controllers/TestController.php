<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\UserRegistion;

class TestController extends Controller
{
    public function event(){
    $name=request()->name;

    event(new UserRegistion($name));

    return view('userRegistration');
    }
}
