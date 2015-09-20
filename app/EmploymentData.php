<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentData extends Model
{

	protected $fillable = [
		'employment_status',
		'industry',
		'present_occupation',
		'name_of_company_or_org',
		'place_of_work',
		'work_address',
		'salary',
		'job_finding_how',
		'job_finding_duration',
		'is_curriculum_relevant',
		'competencies_learned',
		'reasons_not_yet_employed',
		'reasons_not_yet_employed_others'

	];

	/*protected $fillable = [
		'employment_status',
		'present_occupation',
		'name_of_company_or_org',
		'place_of_work',
		'work_address',
		'is_first_job',
		'reasons_for_changing_job',
		'reasons_for_changing_job_others',
		'job_duration',
		'method_of_finding_job',
		'method_of_finding_job_others',
		'job_finding_duration',
		'job_finding_duration_others',
		'salary',
		'is_curriculum_relevant',
		'reasons_not_yet_employed',
		'reasons_not_yet_employed_others'

	];*/


	protected $table = 'employment_data';




    
	public function user(){
	
	    return $this->belongsTo('App\User');
	    	
	}


	public function department(){
	
	    return $this->belongsTo('App\Department');
	    	
	}

}
