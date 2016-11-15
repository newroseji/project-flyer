<?php

namespace App\Http\Controllers;

use App\Flyer;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller {


    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function dashboard()
    {
        $flyers = Flyer::where('user_id',\Auth::user()->id)->paginate(3);

        return view('user.dashboard',compact('flyers'));
    }

    public function profile()
    {
        return view('user.profile');
    }
}
