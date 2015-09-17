<!--

	@Params

	Array $fab_array['id',href','icon','tooltip','color'];

-->

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">

	    @for ($i = 0; $i < count($fab_array); $i++)

	        	@if ($i === 0)

	        		<a {{ array_key_exists('id', $fab_array[$i]) ? 'id=' . $fab_array[$i]['id'] : '' }} 
	        			{{ array_key_exists('href', $fab_array[$i]) ? 'href=' . url($fab_array[$i]['href']) : '' }}  
	        				class="btn-floating waves-effect btn-large tooltipped {{ $fab_array[$i]['color'] }}"
	        				data-delay="300" 
	        				data-position="left" 
	        				data-tooltip="{{ $fab_array[$i]['tooltip'] }}">
	               
	                	<i class="large material-icons"> {{ $fab_array[$i]['icon'] }}</i>

	                </a>

	            <ul>

	        	@else

	                <li>
		               
		                <a {{ array_key_exists('id', $fab_array[$i]) ? 'id=' . $fab_array[$i]['id'] : '' }} 
		                	{{ array_key_exists('href', $fab_array[$i]) ? 'href=' . url($fab_array[$i]['href']) : '' }}
		                		class="btn-floating waves-effect tooltipped {{ $fab_array[$i]['color'] }} " 
		                			data-delay="300" data-position="left" data-tooltip="{{ $fab_array[$i]['tooltip'] }}">
		                    
		                    <i class="material-icons">{{ $fab_array[$i]['icon'] }}</i>
		                
		                </a>
	                
	                </li>

	            @endif

	    @endfor

	    		</ul>

</div>