<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Http\Requests\AddPhotoRequest;

use App\Photo;
use App\Http\Requests\FlyerRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class FlyersController extends Controller
{



    /**
     * FlyersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);

    }

    public function index()
    {
        
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
     * @param string          $zip
     * @param string          $street
     * @param AddPhotoRequest $request
     *
     * @return string
     */
    public function addPhoto($zip, $street, AddPhotoRequest $request)
    {
        $photo = Photo::fromFile($request->file('photo'));//->upload();

        Flyer::locatedAt($zip, $street)->addPhoto($photo);

    }


}
