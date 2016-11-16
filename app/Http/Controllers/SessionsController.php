<?php

	namespace App\Http\Controllers;

	use App\Http\Requests;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;

	class SessionsController extends Controller
	{

		/**
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
		public function login() {
			return view('auth.login');
		}

		/**
		 * @param Request $request
		 * @return \Illuminate\Http\RedirectResponse
         */
		public function postLogin(Request $request) {

			$this->validate($request,
				[
					'email'    => 'required|email',
					'password' => 'required'
				]);

			// attempt to login you in
			if (Auth::attempt($this->getCredentials($request))) {

				return redirect()->intended('/dashboard');
			}

			flash()->error("Oops!","Could not sign you in.");

			return redirect('login')->withInput($request->except('password'));


		}

		/**
		 * @param Request $request
		 * @return array
         */
		public function getCredentials(Request $request) {
			return [
				'email'    => $request->input('email'),
				'password' => $request->input('password'),
				'verified'  => true
			];
		}

		public function logout() {
			Auth::logout();


			flash()->success("See ya!","You have now been signed out.");

			return redirect('login');
		}
	}
