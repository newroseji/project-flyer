<?php


	namespace app\Http\Controllers\Traits;


	use App\Flyer;
	use Illuminate\Http\Request;

	Trait AuthorizesUsers
	{
		/**
		 * @param Request $request
		 *
		 * @return mixed
		 */
		protected function userCreatedFlyer(Request $request) {

			return Flyer::where([
				'zip'     => $request->zip,
				'street'  => $request->street,
				'user_id' => \Auth::user()->id,
			])->exists();
		}

		/**
		 * @param Request $request
		 *
		 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Symfony\Component\HttpFoundation\Response
		 */
		protected function unauthorized(Request $request) {

			if ($request->ajax()) {
				return response(['message' => 'No way.'], 403);
			}

			flash()->info("Hey you!", "No way.");

			return redirect('login');

		}
	}