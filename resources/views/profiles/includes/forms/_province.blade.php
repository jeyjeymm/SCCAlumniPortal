<?php

   	$philippine_provinces = [

		['Ilocos Norte',
		'Ilocos Sur',
		'La Union',
		'Pangasinan'],

		['Batanes',
		'Cagayan',
		'Isabela',
		'Nueva Vizcaya',
		'Quirino'],

		['Aurora',
	    'Bataan',
	    'Bulacan',
	    'Nueva Ecija',
	    'Pampanga',
	    'Tarlac',
	    'Zambales'],

		['Batangas',
	    'Cavite',
	    'Laguna',
	    'Lucena',
	    'Quezon',
	    'Rizal'],

		['Marinduque',
	   'Occidental Mindoro',
	    'Oriental Mindoro',
	    'Palawan',
	    'Romblon'],

		['Albay',
		'Camarines Norte',
		'Camarines Sur',
		'Catanduanes',
		'Masbate',
		'Sorsogon'],

		['Aklan',
		'Antique',
		'Capiz',
		'Guimaras',
		'Iloilo'],

		['Bohol',
	    'Cebu',
	    'Siquijor'],

		['Biliran',
	    'Eastern Samar',
	    'Leyte',
	    'Northern Samar',
	    'Ormoc',
	    'Samar',
	    'Southern Leyte',
	    'Tacloban'],

		['Zamboanga del Norte',
		'Zamboanga del Sur',
		'Zamboanga Sibuga'],

		['Bukidnon',
		'Camiguin',
		'Lanao del Norte',
		'Misamis Occidental',
		'Misamis Oriental'],

		['Compostela Valley',
		'Davao del Norte',
		'Davao del Sur',
		'Davao Oriental',
		'Davao Occidental'],

		['Cotabato',
	    'Sarangani',
	    'South Cotabato',
	    'Sultan Kudarat'],

		['Agusan del Norte',
	    'Agusan del Sur',
	    'Dinagat Islands',
	    'Surigao del Norte',
	    'Surigao del Sur'],

		['Negros Occidental',
	    'Negros Oriental'],

		['Basilan',
	    'Lanao del Sur',
	    'Maguindanao',
	    'Sulu',
	    'Tawi-Tawi'],

		['Abra',
		'Apayao',
		'Baguio',
		'Benguet',
		'Ifugao',
		'Kalinga',
		'Mountain Province'],

		['Caloocan',
	    'Las Piñas',
	    'Makati',
	    'Malabon',
	    'Mandaluyong',
	    'Manila',
	    'Marikina',
	    'Muntinlupa',
	    'Navotas',
	    'Parañaque',
	    'Pasay',
	    'Pasig',
	    'Pateros',
	    'Quezon City',
	    'San Juan',
	    'Taguig',
	    'Valenzuela']

    ];

?>

<div class="input-field col s12 m6 l6">

    <select name="province" class="browser-default">

        <option disabled {{ old('province') === null ? "selected" : null }} >Select your province</option>

        @for($i = 0; $i < count($philippine_regions); $i++)

        	<option class="red-text right" disabled value="{{ $philippine_regions[$i] }}" >{{ $philippine_regions[$i] }}</option>

        	<li class="divider"></li>
        	
        	@for($j = 0; $j < count($philippine_provinces[$i]); $j++)

        		<option value="{{ $philippine_provinces[$i][$j] }}" {{ old('province') === $philippine_provinces[$i][$j] ? "selected" : null }} >{{ $philippine_provinces[$i][$j] }}</option>

        	@endfor

        @endfor

    </select>

</div>