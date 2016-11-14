<?php

namespace App\Http\Controllers;


use App\Flyer;
use App\Http\Requests;
use App\Http\Requests\FlyerRequest;

class FlyersController extends Controller {

    /**
     * HousesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $flyers = Flyer::all();
        return view('flyer.index',compact('flyers'));
    }

    /**
     * @param FlyerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FlyerRequest $request)
    {

        Flyer::create($request->all());

        flash()->overlay("Success!", "Flyer created successfully.");

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        return view('flyer.create');
    }
}
