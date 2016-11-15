<?php

	namespace App\Http\Controllers;


	use App\Flyer;
	use App\Photo;
	use App\Http\Requests;
	use Illuminate\Http\Request;
	use Illuminate\Http\UploadedFile;
	use App\Http\Requests\FlyerRequest;
	use App\Http\Controllers\Traits\AuthorizesUsers;

	class FlyersController extends Controller
	{

		use AuthorizesUsers;

		/**
		 * HousesController constructor.
		 */
		public function __construct() {
			$this->middleware('auth', ["except" => ['index', 'show']]);
		}

		public function index() {

			$flyers = Flyer::paginate(10);

			return view('flyer.index', compact('flyers'));
		}

		/**
		 * @param FlyerRequest $request
		 *
		 * @return \Illuminate\Http\RedirectResponse
		 */
		public function store(FlyerRequest $request) {

			$flyer = Flyer::create($request->all());

			flash()->overlay("Success!", "Flyer created successfully.");

			return redirect('/flyers/' . $flyer->zip . '/' . $flyer->street);
		}

		/**
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function create() {

			return view('flyer.create');
		}

		/**
		 * @param $zip
		 * @param $street
		 *
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function show($zip, $street) {

			$flyer = Flyer::locatedAt($zip, $street);

			return view('flyer.show', compact('flyer'));

		}

		public function edit($id) {

			$flyer = Flyer::findOrFail($id);

			return view('flyer.edit', compact('flyer'));
		}

		public function update(FlyerRequest $request) {

			$flyer = Flyer::findOrFail($request->id);

			$flyer->street = $request->street;
			$flyer->city = $request->city;
			$flyer->zip = $request->zip;
			$flyer->state = $request->state;
			$flyer->country = $request->country;
			$flyer->price = $request->price;
			$flyer->description = $request->description;
			$flyer->save();

			flash()->overlay("Success!", "Flyer updateed successfully.");

			return redirect('/flyers/' . $flyer->zip . '/' . $flyer->street);

		}

		/**
		 * @param         $zip
		 * @param         $street
		 * @param Request $request
		 *
		 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Symfony\Component\HttpFoundation\Response
		 */
		public function addPhoto($zip, $street, Request $request) {

			$this->validate($request,
				[
					'photo' => 'required|mimes:jpg,jpeg,png,bmp'
				]);


			if (! $this->userCreatedFlyer($request)) {
				return $this->unauthorized($request);
			}


			$photo = Photo::fromFile($request->file('photo'));

			Flyer::locatedAt($zip, $street)->addPhoto($photo);


		}


	}
