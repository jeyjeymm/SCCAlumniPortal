<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessionalExamPassed extends Model
{

	protected $fillable = [

		'name_of_exam',
		'date_taken',
		'rating'

	];

	protected $table = 'professional_exams_passed';
    
	public function user(){
	
	    return $this->belongsTo('App\User');
	    	
	}

}
