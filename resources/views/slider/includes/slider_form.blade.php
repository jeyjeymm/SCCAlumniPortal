<!--

	@Params

	SliderObject $slider_object;
	String $action;

 -->

<?php

	$tagline_color = old('tagline_color');
	$tagline_shade = old('tagline_shade');
	$tagline_shade_value = old('tagline_shade_value');

	$slogan_color = old('slogan_color');
	$slogan_shade = old('slogan_shade');
	$slogan_shade_value = old('slogan_shade_value');

	$text_alignment = old('text_alignment');

	if($action === 'edit'){

		//Explode Tagline Color into 3 values: Color class, Color shade and Color shade intensity
		$tagline_color_class = $slider_object->tagline_color;

		$tagline_color = explode(' ',$tagline_color_class)[0];

		$tagline_shade_array = explode('-',explode(' ',$tagline_color_class)[1]);
		$tagline_shade = $tagline_shade_array[0].'-'.$tagline_shade_array[1];

		$tagline_shade_value = substr($tagline_color_class, -1);


		//Explode Slogan Color into 3 values: Color class, Color shade and Color shade intensity
		$slogan_color_class = $slider_object->slogan_color;

		$slogan_color= explode(' ',$slogan_color_class)[0];

		$slogan_shade_array = explode('-',explode(' ',$slogan_color_class)[1]);
		$slogan_shade = $slogan_shade_array[0].'-'.$slogan_shade_array[1];

		$slogan_shade_value = substr($slogan_color_class, -1);

		$text_alignment =$slider_object->text_alignment;

	}

?>

<div class="input-field">
	
    <input name="tagline" type="text" value="{{ $action === 'create' ? old('tagline') : $slider_object->tagline }}" required>

    <label for="tagline">Tagline: </label>

</div>

<div class="row">

	<div class="input-field col s4 m4 l4">

	    <select name="tagline_color">

	    	<option value="black-text" {{ $tagline_color === 'black-text' ? 'selected' : '' }} >Black</option>
	    	<option value="white-text" {{ $tagline_color === 'white-text' ? 'selected' : '' }} >White</option>
	    	<option value="blue-text" {{ $tagline_color === 'blue-text' ? 'selected' : '' }} >Blue</option>
	    	<option value="red-text" {{ $tagline_color === 'red-text' ? 'selected' : '' }} >Red</option>
	    	<option value="green-text" {{ $tagline_color === 'green-text' ? 'selected' : '' }} >Green</option>
	    	<option value="yellow-text" {{ $tagline_color === 'yellow-text' ? 'selected' : '' }} >Yellow</option>

	    </select>

	    <label>Tagline Color</label>

	</div>


	<div class="input-field col s4 m4 l4">

	    <select name="tagline_shade">

	    	<option value="text-lighten" {{ $tagline_shade === 'text-lighten' ? 'selected' : '' }}>Lighten</option>
	    	<option value="text-darken" {{ $tagline_shade === 'text-darken' ? 'selected' : '' }}>Darken</option>

	    </select>

	    <label>Color Shade</label>

	</div>


	<div class="input-field col s4 m4 l4">

	    <select name="tagline_shade_value">

	    	<option value="1" {{ $tagline_shade_value === '1' ? 'selected' : '' }} >1</option>
	    	<option value="2" {{ $tagline_shade_value === '2' ? 'selected' : '' }} >2</option>
	    	<option value="3" {{ $tagline_shade_value === '3' ? 'selected' : '' }} >3</option>
	    	<option value="4" {{ $tagline_shade_value === '4' ?'selected' : '' }} >4</option>

	    </select>

	    <label>Shade Value</label>

	</div>
	
</div>


<div class="input-field">

    <input name="slogan" type="text" value="{{ $action === 'create' ? old('slogan') : $slider_object->slogan }}" required>

    <label>Slogan: </label>

</div>


<div class="row">

	<div class="input-field col s4 m4 l4">

	    <select name="slogan_color">

	    	<option value="black-text" {{ $slogan_color === 'black-text' ? 'selected' : '' }} >Black</option>
	    	<option value="white-text" {{ $slogan_color === 'white-text' ? 'selected' : '' }} >White</option>
	    	<option value="blue-text" {{ $slogan_color === 'blue-text' ? 'selected' : '' }} >Blue</option>
	    	<option value="red-text" {{ $slogan_color === 'red-text' ? 'selected' : '' }} >Red</option>
	    	<option value="green-text" {{ $slogan_color === 'green-text' ? 'selected' : '' }} >Green</option>
	    	<option value="yellow-text" {{ $slogan_color === 'yellow-text' ? 'selected' : '' }} >Yellow</option>

	    </select>

	    <label>Slogan Color</label>

	</div>


	<div class="input-field col s4 m4 l4">

	    <select name="slogan_shade">

	    	<option value="text-lighten" {{ $slogan_shade === 'text-lighten' ? 'selected' : '' }}>Lighten</option>
	    	<option value="text-darken" {{ $slogan_shade === 'text-darken' ? 'selected' : '' }}>Darken</option>

	    </select>

	    <label>Color Shade</label>

	</div>


	<div class="input-field col s4 m4 l4">

	    <select name="slogan_shade_value">

	    	<option value="1" {{ $tagline_shade_value === '1' ? 'selected' : '' }} >1</option>
	    	<option value="2" {{ $tagline_shade_value === '2' ? 'selected' : '' }} >2</option>
	    	<option value="3" {{ $tagline_shade_value === '3' ? 'selected' : '' }} >3</option>
	    	<option value="4" {{ $tagline_shade_value === '4' ? 'selected' : '' }} >4</option>

	    </select>

	    <label>Shade Value</label>

	</div>
	
</div>


<div class="input-field">

    <select name="text_alignment">

    	<option value="center-align" {{ $text_alignment === 'center-align' ? 'selected' : '' }} >Center</option>
    	<option value="right-align" {{ $text_alignment === 'right-align' ? 'selected' : '' }} >Right</option>
    	<option value="left-align" {{ $text_alignment === 'left-align' ? 'selected' : '' }} >Left</option>

    </select>

    <label>Text Alignment</label>

</div>


<div class="file-field input-field">

    <button class="btn orange darken-4 waves-effect waves-light">

      <span><i class="material-icons left">insert_photo</i>Slider Image</span>

      <input name="image_file" type="file" required/>

    </button>

    <div class="file-path-wrapper">

        <input name="image_name" class="file-path" type="text" value="{{ $action === 'create' ? old('image_name') : $slider_object->image_name }}" readonly/>

    </div>

</div>