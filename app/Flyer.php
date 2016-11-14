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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos(){
        return $this->hasMany('App\Photo');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function boot(){
        parent::boot();

        static::creating(function($flyer){
           $flyer->user_id=Auth::user()->id;
        });
    }
}
