<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

	protected $fillable = [

		'nickname',
		'image_name',
		'mime_type',
		'present_address',
		'permanent_address',
		'contact_number',
		'civil_status',
		'gender',
		'birthday',
		'region_of_origin',
		'province',
		'location_of_residence',
		'about_me'

	];
    

	public function user(){

		return $this->belongsTo('App\User');

	}

}
