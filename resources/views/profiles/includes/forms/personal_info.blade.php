<div class="input-field">

    <input name="nickname" type="text" value="{{ old('nickname') }}" required>

    <label for="nickname">Nickname: </label>

</div>

<div class="input-field">

    <input name="permanent_address" type="text" value="{{ old('permanent_address') }}" required />

    <label for="permanent_address">Permanent Address: </label>

</div>


<div class="input-field">

    <input name="present_address" type="text" value="{{ old('present_address') }}" />

    <label for="present_address">Present Address: </label>

</div>

<div class="input-field">

    <input name="contact_number" type="text" length="11" value="{{ old('contact_number') }}" />

    <label for="contact_number">Contact Number: </label>

</div>


<div class="input-field">

    <label>Birthday: </label>

    <input name="birthday" type="date" value="{{ old('birthday') }}" class="datepicker" />

</div>


<div class="input-field col s12 m4 l4">

    <select name="civil_status">

        <option disabled {{ old('civil_status') === null ? "selected" : null }} >Choose option</option>

        <option value="Single" {{ old('civil_status') === "Single" ? "selected" : null }} >Single</option>

        <option value="Married" {{ old('civil_status') === "Married" ? "selected" : null }} >Married</option>

        <option value="Widowed" {{ old('civil_status') === "Widowed" ? "selected" : null }} >Widowed</option>

        <option value="Separated" {{ old('civil_status') === "Separated" ? "selected" : null }} >Separated</option>

    </select>

    <label>Civil Status: </label>

</div>

<div class="input-field col s12 m4 l4">

    <select name="gender">

        <option disabled {{ old('gender') === null ? "selected" : null }} >Choose option</option>

        <option value="Male" {{ old('gender') === "Male" ? "selected" : null }} >Male</option>

        <option value="Female" {{ old('gender') === "Female" ? "selected" : null }} >Female</option>

    </select>

    <label>Gender: </label>

</div>


<div class="input-field col s12 m4 l4">

    <select name="location_of_residence">

        <option disabled {{ old('location_of_residence') === null ? "selected" : null }} >Choose option</option>

        <option value="City" {{ old('location_of_residence') === "City" ? "selected" : null }} >City</option>

        <option value="Municipality" {{ old('location_of_residence') === "Municipality" ? "selected" : null }} >Municipality</option>

    </select>

    <label>Location of Residence: </label>

</div>

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

?>

@include('profiles.includes.forms._region_of_origin')

@include('profiles.includes.forms._province')