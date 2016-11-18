<?php

	namespace App\Http\Controllers;

	use App\Http\Requests\UserRegisterRequest;
	use App\Mailers\AppMailer;
	use App\User;
	use Illuminate\Http\Request;

	class RegistrationController extends Controller
	{

		public function register() {
			return view('auth.register');
		}

		public function postRegister(UserRegisterRequest $request, AppMailer $mailer) {

			// create the user
			$user = User::create(
				[
					'username'=> $request->input('username'),
					'firstname'=> $request->input('firstname'),
					'middlename'=> $request->input('middlename'),
					'lastname'=> $request->input('lastname'),
					'address1'=> $request->input('address1'),
					'address2'=> $request->input('address2'),
					'city'=> $request->input('city'),
					'state'=> $request->input('state'),
					'zip'=> $request->input('zip'),
					'country'=> $request->input('country'),
					'email'=> $request->input('email'),
					'password'=> bcrypt($request->input('password'))
				]

			);

			// email them a confirmation link
			$mailer->sendEmailConfirmationTo($user);

			// flashes message
			flash()->overlay("Registered!","Now, please confirm your " . $request->email . " email.");

			// redirect to login
			return back();
		}

		public function confirmEmail($token) {

			$user = User::whereToken($token)->firstOrFail()->confirmEmail();

			flash()->success("Wala!","You are now confirmed. Please login.");

			return redirect('login');
		}


	}
