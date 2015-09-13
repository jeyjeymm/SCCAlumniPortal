<!--

	@Params

	Profile $profile;
	String $action;

-->

<?php

	if ($action === 'create' || $action === 'survey') {

        $nickname = old('nickname');
        $permanent_address = old('permanent_address');
        $present_address = old('present_address');
        $contact_number = old('contact_number');
        $birthday = old('birthday');
		$civil_status = old('civil_status');
		$gender = old('gender');
		$region_of_origin = old('region_of_origin');
		$location_of_residence = old('location_of_residence');
        $province = old('province');
        $about_me = old('about_me');

	}else{

        $nickname = $profile->nickname;
        $permanent_address = $profile->permanent_address;
        $present_address = $profile->present_address;
        $contact_number = $profile->contact_number;
        $birthday = $profile->birthday;
		$civil_status = $profile->civil_status;
		$gender = $profile->gender;
		$region_of_origin = $profile->region_of_origin;
		$location_of_residence = $profile->location_of_residence;
        $province = $profile->province;
        $about_me = $profile->about_me;

	}

?>

<div class="input-field">

    <input name="nickname" type="text" value="{{ $nickname }}" required>

    <label for="nickname">Nickname: </label>

</div>

@if ($action !== 'survey')

    <div class="file-field input-field">

    	<div class="btn waves-effect waves-light red darken-1">

    		<span>

    			<i class="material-icons right">person</i>
    			Profile Picture

    		</span>
    		
    		<input name="image_file" type="file">

    	</div>

    	<div class="file-path-wrapper">
    		
    		<input type="text" name="image_name" class="file-path" readonly/>

    	</div>

    </div>

@endif

<div class="input-field">

    <input name="permanent_address" type="text" value="{{ $permanent_address }}" required />

    <label for="permanent_address">Permanent Address: </label>

</div>


<div class="input-field">

    <input name="present_address" type="text" value="{{ $present_address }}" />

    <label for="present_address">Present Address: </label>

</div>

<div class="input-field">

    <input name="contact_number" type="text" length="11" value="{{ $contact_number }}" />

    <label for="contact_number">Contact Number: </label>

</div>


<div class="input-field">

    <label>Birthday: </label>

    <input name="birthday" type="date" value="{{ $birthday }}" class="datepicker" />

</div>


<div class="input-field col s12 m4 l4">

    <select name="civil_status">

        <option disabled {{ $civil_status === null ? "selected" : "" }} >Choose option</option>

        <option value="Single" {{ $civil_status === "Single" ? "selected" : "" }} >Single</option>

        <option value="Married" {{ $civil_status === "Married" ? "selected" : "" }} >Married</option>

        <option value="Widowed" {{ $civil_status === "Widowed" ? "selected" : "" }} >Widowed</option>

        <option value="Separated" {{ $civil_status === "Separated" ? "selected" : "" }} >Separated</option>

    </select>

    <label>Civil Status: </label>

</div>

<div class="input-field col s12 m4 l4">

    <select name="gender">

        <option disabled {{ $gender === null ? "selected" : "" }} >Choose option</option>

        <option value="Male" {{ $gender === "Male" ? "selected" : "" }} >Male</option>

        <option value="Female" {{ $gender === "Female" ? "selected" : "" }} >Female</option>

    </select>

    <label>Gender: </label>

</div>


<div class="input-field col s12 m4 l4">

    <select name="location_of_residence">

        <option disabled {{ $location_of_residence === null ? "selected" : "" }} >Choose option</option>

        <option value="City" {{ $location_of_residence === "City" ? "selected" : "" }} >City</option>

        <option value="Municipality" {{ $location_of_residence === "Municipality" ? "selected" : "" }} >Municipality</option>

    </select>

    <label>Location of Residence: </label>

</div>


<div class="input-field col s12 m6 l6">

    <select name="region_of_origin" class="browser-default">

        <option disabled {{ $region_of_origin === null ? "selected" : "" }} >Region of origin</option>

        <option value="I" {{ $region_of_origin === "I" ? "selected" : "" }} >Region I</option>

        <option value="II" {{ $region_of_origin === "II" ? "selected" : "" }} >Region II</option>
        
        <option value="III" {{ $region_of_origin === "II" ? "selected" : "" }} >Region III</option>
        
        <option value="IV" {{ $region_of_origin === "IV" ? "selected" : "" }} >Region IV</option>
        
        <option value="V" {{ $region_of_origin === "V" ? "selected" : "" }} >Region V</option>
        
        <option value="VI" {{ $region_of_origin === "VI" ? "selected" : "" }} >Region VI</option>
        
        <option value="VII" {{ $region_of_origin === "VII" ? "selected" : "" }} >Region VII</option>
        
        <option value="VIII" {{ $region_of_origin === "VII" ? "selected" : "" }} >Region VIII</option>
        
        <option value="IX" {{ $region_of_origin === "IX" ? "selected" : "" }} >Region IX</option>
        
        <option value="X" {{ $region_of_origin === "X" ? "selected" : "" }} >Region X</option>
        
        <option value="XI" {{ $region_of_origin === "XI" ? "selected" : "" }} >Region XI</option>
        
        <option value="XII" {{ $region_of_origin === "XII" ? "selected" : "" }} >Region XII</option>
        
        <option value="NCR" {{ $region_of_origin === "NCR" ? "selected" : "" }} >NCR</option>
        
        <option value="CAR" {{ $region_of_origin === "CAR" ? "selected" : "" }} >CAR</option>
        
        <option value="ARMM" {{ $region_of_origin === "ARMM" ? "selected" : "" }} >ARMM</option>
        
        <option value="CARAGA" {{ $region_of_origin === "CARAGA" ? "selected" : "" }} >CARAGA</option>
    
    </select>
    
</div>


<div class="input-field col s12 m6 l6">

    <input name="province" type="text" value="{{ $province }}" />

    <label>Province: </label>

</div>

@if ($action !== 'survey')

    <div class="input-field col s12 m12 l12">

        <textarea name="about_me" class="materialize-textarea">{{ $about_me }}</textarea>

        <label>Say something about yourself like motto, principle, etc. </label>

    </div>

@endif