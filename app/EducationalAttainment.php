<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalAttainment extends Model
{

	protected $fillable = [

		'degree',
		'college_or_university',
		'year_graduated',
		'honors_or_awards'

	];





    
	public function user(){
	
	    return $this->belongsTo('App\User');
	    	
	}

	public function department(){
	
	    return $this->belongsTo('App\Department');
	    	
	}

}
