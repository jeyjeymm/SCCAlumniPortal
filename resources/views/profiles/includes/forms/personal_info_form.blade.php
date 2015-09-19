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

        <option disabled {{ old('civil_status') === null ? "selected" : "" }} >Choose option</option>

        <option value="Single" {{ old('civil_status') === "Single" ? "selected" : "" }} >Single</option>

        <option value="Married" {{ old('civil_status') === "Married" ? "selected" : "" }} >Married</option>

        <option value="Widowed" {{ old('civil_status') === "Widowed" ? "selected" : "" }} >Widowed</option>

        <option value="Separated" {{ old('civil_status') === "Separated" ? "selected" : "" }} >Separated</option>

    </select>

    <label>Civil Status: </label>

</div>

<div class="input-field col s12 m4 l4">

    <select name="gender">

        <option disabled {{ old('gender') === null ? "selected" : "" }} >Choose option</option>

        <option value="Male" {{ old('gender') === "Male" ? "selected" : "" }} >Male</option>

        <option value="Female" {{ old('gender') === "Female" ? "selected" : "" }} >Female</option>

    </select>

    <label>Gender: </label>

</div>


<div class="input-field col s12 m4 l4">

    <select name="location_of_residence">

        <option disabled {{ old('location_of_residence') === null ? "selected" : "" }} >Choose option</option>

        <option value="City" {{ old('location_of_residence') === "City" ? "selected" : "" }} >City</option>

        <option value="Municipality" {{ old('location_of_residence') === "Municipality" ? "selected" : "" }} >Municipality</option>

    </select>

    <label>Location of Residence: </label>

</div>


<div class="input-field col s12 m6 l6">

    <select name="region_of_origin" class="browser-default">

        <option disabled {{ old('region_of_origin') === null ? "selected" : "" }} >Region of origin</option>

        <option value="I" {{ old('region_of_origin') === "I" ? "selected" : "" }} >Region I</option>

        <option value="II" {{ old('region_of_origin') === "II" ? "selected" : "" }} >Region II</option>
        
        <option value="III" {{ old('region_of_origin') === "II" ? "selected" : "" }} >Region III</option>
        
        <option value="IV" {{ old('region_of_origin') === "IV" ? "selected" : "" }} >Region IV</option>
        
        <option value="V" {{ old('region_of_origin') === "V" ? "selected" : "" }} >Region V</option>
        
        <option value="VI" {{ old('region_of_origin') === "VI" ? "selected" : "" }} >Region VI</option>
        
        <option value="VII" {{ old('region_of_origin') === "VII" ? "selected" : "" }} >Region VII</option>
        
        <option value="VIII" {{ old('region_of_origin') === "VII" ? "selected" : "" }} >Region VIII</option>
        
        <option value="IX" {{ old('region_of_origin') === "IX" ? "selected" : "" }} >Region IX</option>
        
        <option value="X" {{ old('region_of_origin') === "X" ? "selected" : "" }} >Region X</option>
        
        <option value="XI" {{ old('region_of_origin') === "XI" ? "selected" : "" }} >Region XI</option>
        
        <option value="XII" {{ old('region_of_origin') === "XII" ? "selected" : "" }} >Region XII</option>
        
        <option value="NCR" {{ old('region_of_origin') === "NCR" ? "selected" : "" }} >NCR</option>
        
        <option value="CAR" {{ old('region_of_origin') === "CAR" ? "selected" : "" }} >CAR</option>
        
        <option value="ARMM" {{ old('region_of_origin') === "ARMM" ? "selected" : "" }} >ARMM</option>
        
        <option value="CARAGA" {{ old('region_of_origin') === "CARAGA" ? "selected" : "" }} >CARAGA</option>
    
    </select>
    
</div>


<div class="input-field col s12 m6 l6">

    <input name="province" type="text" value="{{ old('province') }}" />

    <label>Province: </label>

</div>