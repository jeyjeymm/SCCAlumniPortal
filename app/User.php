<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name', 
        'email', 
        'username',
        'password',
        'batch', 
        'department_id',
        'course_id',
        'role_id'

    ];



    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];





    public function articles(){

        return $this->hasMany('App\Article');

    }


    public function profile(){

        return $this->hasOne('App\Profile');

    }



    public function threads(){

        return $this->hasMany('App\Thread');

    }



    public function thread_comments(){

        return $this->hasMany('App\ThreadComment');

    }



    public function article_comments(){

        return $this->hasMany('App\ArticleComment');

    }



    public function department(){

        return $this->belongsTo('App\Department');

    }


    public function course(){
    
        return $this->belongsTo('App\Course');
            
    }


    public function role(){

        return $this->belongsTo('App\Role');

    }


    public function educational_attainments(){
    
        return $this->hasMany('App\EducationalAttainment');
            
    }

    public function professional_exams_passed(){
    
        return $this->hasMany('App\ProfessionalExamPassed');
            
    }

    public function trainings_or_advanced_studies(){
    
        return $this->hasMany('App\TrainingOrAdvancedStudy');
            
    }

    public function employment_data(){
    
        return $this->hasOne('App\EmploymentData');
            
    }

}
