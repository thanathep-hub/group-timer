<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function showGroup()
    {
        return view('home.show-group');
    }

    public function createGroup(Request $request)
    {
        //
    }
}
