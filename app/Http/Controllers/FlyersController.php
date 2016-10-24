<?php

namespace App\Http\Controllers;


use App\Flyer;
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
        Flyer::create($request->all());

        flash()->success('Success!', 'Your flyer has been created.');
        return redirect()->back(); //temporary

    }


    /**
     * Display the specified resource.
     *
     * @param int   $id
     * @return Response
     */
    public function show($zip, $street)
    {

        $flyer =  Flyer::locatedAt($zip, $street)->first();

        return view('flyers.show', compact('flyer'));
    }
}
