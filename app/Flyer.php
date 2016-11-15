<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\Auth;

	class Flyer extends Model
	{


		protected $fillable = [
			'street',
			'city',
			'zip',
			'state',
			'country',
			'price',
			'description',
		];

		/**
		 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
		 */
		public function owner() {
			return $this->belongsTo('App\user', 'user_id');
		}

		/**
		 * @param User $user
		 *
		 * @return bool
		 */
		public function ownedBy(User $user) {

			return $this->user_id == $user->id;
		}

		/**
		 * @param $price
		 *
		 * @return string
		 */
		public function getPriceAttribute($price) {
			return '$' . number_format($price);
		}

		/**
		 * @param Photo $photo
		 *
		 * @return Model
		 */
		public function addPhoto(Photo $photo) {
			return $this->photos()->save($photo);
		}


		/**
		 * @param $zip
		 * @param $street
		 *
		 * @return mixed
		 */
		public static function locatedAt($zip, $street) {
			$street = str_replace('-', ' ', $street);

			return static::where(compact('zip', 'street'))->firstOrFail();
		}

		/**
		 * @return \Illuminate\Database\Eloquent\Relations\HasMany
		 */
		public function photos() {
			return $this->hasMany('App\Photo');
		}


		/**
		 * Create user_id while creating the User record.
		 */
		public static function boot() {
			parent::boot();

			static::creating(function ($flyer) {
				$flyer->user_id = Auth::user()->id;
			});
		}

	}
