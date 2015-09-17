<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Article extends Model
{

    protected $fillable = [

    	'title',
		'description',
		'body',
		'image_name',
        'mime_type',
		'published_at'

	];



    protected $dates = ['published_at'];





    public function comments(){
    
        return $this->hasMany('App\ArticleComment');
            
    }


    public function user(){

    	return $this->belongsTo('App\User');

    }


    public function department(){

    	return $this->belongsTo('App\Department');

    }





    public function scopePublished($query){

    	return $query->where('published_at','<=',Carbon::now());
    	
    }


    public function scopeUnpublished($query){

    	return $query->where('published_at','>',Carbon::now());
    	
    }


    public function scopeDepartmentArticles($query,$id){

    	return $query->where('department_id',$id)->orWhere('department_id',1)->published();

    }


    public function scopePublicArticles($query){

    	return $query->where('department_id',1)->published();

    }


    public function scopeApproved($query){

        return $query->where('status','APPROVED');

    }


    public function scopeNotApproved($query){

        return $query->where('status','');

    }





    public function setBodyAttribute($body){

    	$this->attributes['body'] = str_replace('\r\n', "<br />", $body);

    }



    //public function setImagePathAttribute($image_path){

    //	$this->attributes['image_path'] = "/images/article_images/".$image_path;

    //}



    public function setPublishedAtAttribute($published_at){

    	$this->attributes['published_at'] = Carbon::createFromFormat('j F, Y',$published_at);

    }

}
