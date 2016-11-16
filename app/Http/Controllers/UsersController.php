<?php

	namespace App\Http\Controllers;

	use App\Flyer;
	use App\Http\Requests\UserPasswordUpdateRequest;
	use App\Http\Requests\UserUpdateRequest;
	use App\User;
	use Illuminate\Http\Request;

	use App\Http\Requests;

	class UsersController extends Controller
	{


		/**
		 * UsersController constructor.
		 */
		public function __construct() {
			$this->middleware('auth');
		}


		public function dashboard() {
			$flyers = Flyer::where('user_id', \Auth::user()->id)->paginate(10);

			return view('user.dashboard', compact('flyers'));
		}

		public function profile(User $user) {

			return view('user.profile', compact('user'));
		}

		public function edit(User $user) {

			return view('user.edit', compact('user'));
		}

		public function update(UserUpdateRequest $request) {

			$user = User::findOrFail($request->id);

			$user->firstname = $request->firstname;
			$user->middlename = $request->middlename;
			$user->lastname = $request->lastname;
			$user->address1 = $request->address1;
			$user->address2 = $request->address2;
			$user->city = $request->city;
			$user->zip = $request->zip;
			$user->state = $request->state;
			$user->country = $request->country;
			$user->email = $request->email;

			$user->save();

			flash()->overlay("Success!", "User updateed successfully.");

			return redirect('/user/profile/' . $request->id );
		}

		public function pwUpdate(UserPasswordUpdateRequest $request) {

			$user = User::findOrFail($request->id);

			if (! \Auth::attempt(['email'=>$user->email,'password'=>$request->input('old_password'),'verified'=>true])) {


				flash()->error("Sorry!", "Old password did not match.");

				//dd($user->email, $request->input('password'));
				if ($request->ajax()) {
					return response(['message' => 'Password did not match.'], 403);

				}

				return redirect('user/profile/' . $request->id)->withInput($request->except(['old_password']));
			}

			$user->password = bcrypt($request->input('password'));
			$user->save();

			flash()->overlay("Success!", "Password updated successfully.");

			return redirect('/user/profile/' . $request->id );
		}

	}
