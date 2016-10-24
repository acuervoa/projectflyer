<?php

namespace App\Http\Controllers;


use App\Http\Requests\FlyerRequest;




class FlyersController extends Controller
{
    public function create()
    {
        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FlyerRequest $request
     *
     * @return Response
     */
    public function store(FlyerRequest $request)
    {
        \App\Flyer::create($request->all());

        // flash messaging

        return redirect()->back(); //temporary

    }
}
