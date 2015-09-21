<?php

    $philippine_regions = [

        'Region I',

        'Region II',

        'Region III',

        'Region IV-A',

        'Region IV-B',

        'Region V',

        'Region VI',

        'Region VII',

        'Region VIII',

        'Region IX',

        'Region X',

        'Region XI',

        'Region XII',

        'Region XIII',

        'Region XVIII',

        'ARMM',

        'CAR',

        'NCR'

    ];

    $isSelected = $profile->first() ? $profile->region_of_origin : old('region_of_origin') ;

?>

<div class="input-field col s12 m6 l6">

    <select name="region_of_origin" class="browser-default">

        <option disabled {{ $isSelected === null ? "selected" : null }} >Region of origin</option>

        @foreach($philippine_regions as $region)

            <option value="{{ $region }}" {{ $isSelected === $region ? "selected" : null }}>

            	{{ $region }}

            </option>

        @endforeach
    
    </select>
    
</div>