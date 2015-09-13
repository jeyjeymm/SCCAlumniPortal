<?php

namespace App;

use App\Users;
use App\Articles;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

	public function users(){

    	return $this->hasMany('App\User');

    }



    public function courses(){
    
        return $this->hasMany('App\Course');
        	
    }



    public function articles(){

    	return $this->hasMany('App\Article');

    }



    public function threads(){

    	return $this->hasMany('App\Thread');

    }

}
