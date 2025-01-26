<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetTimeController extends Controller
{
    public function setTime()
    {
        return view('home.set-time');
    }
}
