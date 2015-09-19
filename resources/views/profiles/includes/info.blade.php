<!--

	@param
	Profile $profile


-->

<div class="card pad_20">

	<h5>basic info:</h5>

	<hr />

		<p class="col s6 m6 l6"><b>Nickname:</b></p>

	    <p class="col s6 m6 l6" name="email"> {{ $profile->nickname }} </p>    



		<p class="col s6 m6 l6"><b>Email:</b></p>

	    <p class="col s6 m6 l6" name="email"> {{ $profile->user->email }} </p>    



		<p class="col s6 m6 l6"><b>Birthday:</b></p>

	    <p class="col s6 m6 l6" name="birthday"> {{ $profile->birthday }} </p>   



	    <p class="col s6 m6 l6"><b>Civil Status:</b></p>

	    <p class="col s6 m6 l6" name="civil_status"> {{ $profile->civil_status }} </p>     



		<p class="col s6 m6 l6"><b>Present Address:</b></p>

	    <p class="col s6 m6 l6" name="present_address"> {{ $profile->present_address }} </p>    



		<p class="col s6 m6 l6"><b>Contact Number:</b></p>

	    <p class="col s6 m6 l6" name="contact_number"> {{ $profile->contact_number }} </p>    


</div>