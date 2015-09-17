<!--

	@Params

	Collection $slider_objects;
	String $role;

-->

<div class="slider">

    <ul class="slides">
        
    	@foreach ($slider_objects as $slider_object)

        	@include('slider.includes.slider_object_template')

        @endforeach

    </ul>

</div>