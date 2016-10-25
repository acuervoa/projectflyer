<?php

namespace App\Http\Controllers;



use App\Flyer;
use App\Photo;

use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;




class FlyersController extends Controller
{


    /**
     * FlyersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        $flyer =  Flyer::locatedAt($zip, $street);

        return view('flyers.show', compact('flyer'));
    }

    /**
     * Apply a photo to referenced flyer.
     *
     * @param string        $zip
     * @param string        $street
     * @param Request       $request
     *
     * @return string
     */
    public function addPhoto($zip, $street, Request $request)
    {

        $this->validate($request, [
           'photo' => "required|mimes:jpg,jpeg,png,bmp"
        ]);


        $photo = Photo::fromForm($request->file('photo'));
        Flyer::locatedAt($zip, $street)->addPhoto($photo);



        return 'Done';

    }
}
