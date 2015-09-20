<div class="input-field col s12 m6 l6">

    <select name="region_of_origin" class="browser-default">

        <option disabled {{ old('region_of_origin') === null ? "selected" : "" }} >Region of origin</option>

        @foreach($philippine_regions as $region)

            <option value="{{ $region }}" {{ old('region_of_origin') === $region ? "selected" : "" }} >{{ $region }}</option>

        @endforeach
    
    </select>
    
</div>