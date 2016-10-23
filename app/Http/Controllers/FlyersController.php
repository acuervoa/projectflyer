<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FlyersController extends Controller
{
    public function create()
    {
        return view('flyers.create');
    }

    public function store(Request $request)
    {

    }
}
