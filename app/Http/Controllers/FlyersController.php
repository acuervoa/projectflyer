<?php

namespace App\Http\Controllers;


use App\Http\Requests\FlyerRequest;




class FlyersController extends Controller
{
    public function create()
    {

        flash()->overlay('Welcome Aboard', 'Thank you for signing up.');
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

        //flash('Success!', 'Your flyer has been created.');
        flash()->success('Success!', 'Your flyer has been created.');
        return redirect()->back(); //temporary

    }
}
