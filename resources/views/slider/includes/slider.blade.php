<!--

	@Params

	Collection $slider_objects;
	String $role;

-->

<div class="marg_20 col s12 m12 l12">

    <div class="slider">

        <ul class="slides hoverable z-depth-1-half">
	        
        	@foreach ($slider_objects as $slider_object)

            	@include('slider.includes.slider_object_template')

            @endforeach

        </ul>

    </div>

</div>