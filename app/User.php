<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
		'firstname',
		'middlename',
		'lastname',
		'address1',
		'address2',
		'city',
		'state',
		'zip',
		'country',
		'email',
		'password',
		'verified',
		'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	/**
	 * Boot
	 */
	public static function boot(){
		parent::boot();

		static::creating(function($user){
			$user->token=str_random(30);
		});
	}

	/**
	 * @param $password
	 */
	public function setPasswordAttribute($password){
		$this->attributes['password']= bcrypt($password);
	}

	/**
	 * Confirm email after registration.
	 */
	public function confirmEmail(){
		$this->verified = true;
		$this->token = null;
		$this->save();
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function flyers(){
		return $this->hasMany(Flyer::class);
	}

	public function owns($relation){

		return $relation->user_id == $this->id;
	}
}
