<!--

	@Params

	SliderObject $slider_object;

-->

<li>
    <img src=" {{ route('getPhoto',['url' => 'slider','name' => $slider_object->image_name]) }} ">

    <div class="caption {{ $slider_object->text_alignment }}">

        <h3 class="{{ $slider_object->tagline_color }}">

        	{{ $slider_object->tagline }}

        </h3>

        <h5 class="{{ $slider_object->slogan_color }}">
        	
        	{{ $slider_object->slogan }}
        
        </h5>

        @if (Auth::check() && Auth::user()->role->name === 'admin') 
        	
        	<a href="{{ url( 'slider/' . $slider_object->id . '/edit' ) }}" 
        		class="btn-flat waves-effect waves-dark white-text blue darken-1">

        		Edit

        	</a>
        	
    	    <form action="{{ url( 'slider/' . $slider_object->id ) }}" method="post">

    	    	{!! method_field('delete') !!}
    	
    	    	{!! csrf_field() !!}       	
    	        
    	        <button type="submit" class="btn-flat waves-effect waves-dark white-text red darken-1">

    	        	Delete

    	        </button>	        
    	
    	    </form>

        @endif

    </div>

</li>