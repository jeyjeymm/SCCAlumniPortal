<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderObject extends Model
{
    
	protected $fillable = [

		'tagline',
		'tagline_color',
		'slogan',
		'slogan_color',
		'text_alignment',
		'image_name'

	];

}
