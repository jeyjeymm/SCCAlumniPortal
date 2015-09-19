<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingOrAdvancedStudy extends Model
{

	protected $fillable = [

		'training_or_advanced_study',
		'duration',
		'institution'

	];

	protected $table = 'trainings_or_advanced_studies';




    
	public function user(){
	
	    return $this->belongsTo('App\User');
	    	
	}


	public function department(){
	
	    return $this->belongsTo('App\Department');
	    	
	}

}
