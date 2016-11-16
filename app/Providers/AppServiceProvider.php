<?php

	namespace App\Providers;

	use Illuminate\Support\ServiceProvider;


	class AppServiceProvider extends ServiceProvider
	{
		/**
		 * Bootstrap any application services.
		 *
		 * @return void
		 */
		public function boot() {

			// construct a main navigation
			$navItems = array(
				array(

					'title' => 'home',
					'url'   => '/',
				),
				array(

					'title' => 'flyers',
					'url'   => 'flyers',
				)
			);

			view()->composer(['app'], function ($view) use ($navItems) {
				$view->with('navItems', $navItems);
			});
		}

		/**
		 * Register any application services.
		 *
		 * @return void
		 */
		public function register() {

		}
	}
