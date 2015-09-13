<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    

	protected $fillable = [

		'title',
		'body'

	];



	public function user(){

		return $this->belongsTo('App\User');

	}


	public function comments(){

		return $this->hasMany('App\ThreadComment');

	}


	public function department(){

		return $this->belongsTo('App\Department');

	}


}
