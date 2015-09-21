<!--

	@Params

	Profile $profile;

-->

<?php

	if ($profile->first()) {

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

	}else{

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

	}

?>

<div class="input-field">

    <input name="nickname" type="text" value="{{ $nickname }}" required>

    <label for="nickname">Nickname: </label>

</div>

<div class="file-field input-field">

	<div class="btn waves-effect waves-light red darken-1">

		<span>

			<i class="material-icons">photo</i>

		</span>
		
		<input name="image_file" type="file">

	</div>

	<div class="file-path-wrapper">
		
		<input type="text" name="image_name" class="file-path" placeholder="Profile Picture" readonly/>

	</div>

</div>

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


@include('profiles.includes.forms._region_of_origin')

@include('profiles.includes.forms._province')


<div class="input-field col s12 m12 l12">

    <textarea name="about_me" class="materialize-textarea">{{ $about_me }}</textarea>

    <label>Say something about yourself like motto, principle, etc. </label>

</div>