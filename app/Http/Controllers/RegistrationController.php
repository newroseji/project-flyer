<?php

	namespace App\Http\Controllers;

	use App\Mailers\AppMailer;
	use App\User;
	use Illuminate\Http\Request;

	class RegistrationController extends Controller
	{

		public function register() {
			return view('auth.register');
		}

		public function postRegister(Request $request, AppMailer $mailer) {

			// validate the request
			$this->validate($request,
				[
					'username' => 'required|min:3|max:50|unique:users',
					'firstname' => 'required|min:3|max:50',
					'middlename' => 'max:20',
					'lastname'  => 'required|min:3|max:50',
					'address1'  => 'max:60',
					'address2'  => 'max:30',
					'city'      => 'max:50',
					'state'     => 'max:2',
					'zip'       => 'max:55',
					'country'   => 'max:50',
					'email'     => 'required|email|unique:users',
					'password'  => 'required|min:6|max:50|confirmed',
					'password_confirmation'=>'required|min:6|max:50'

				]);

			// create the user
			$user = User::create($request->all());

			// email them a confirmation link
			$mailer->sendEmailConfirmationTo($user);

			// flashes message
			flash()->overlay("Registered!","Now, please confirm your email address.");

			// redirect to login
			return redirect('login');
		}

		public function confirmEmail($token) {

			$user = User::whereToken($token)->firstOrFail()->confirmEmail();

			flash()->success("Wala!","You are now confirmed. Please login.");

			return redirect('login');
		}


	}
