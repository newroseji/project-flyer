<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{

	/**
	 * PagesController constructor.
	 */
	public function __construct() {
		return $this->middleware('auth');
	}

	public function dashboard(){
		return view('pages.dashboard');
	}
}
