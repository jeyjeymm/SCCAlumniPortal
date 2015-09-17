<?php
$line_of_work = [
	
	'Agriculture, Hunting and Forestry',
	'Fishing',
	'Mining and Quarrying',
	'Manufacturing',
	'Electricity, Gas and Water Supply',
	'Construction',
	'Wholesale and Retail Trade',
	'Repair of Motor Vehicles, Motorcycles and Personal and Household Goods',
	'Hotels and Restaurants',
	'Transport Storage and Communication',
	'Financial Intermediation',
	'Real State, Renting and Business Activities',
	'Public Administration and Defense',
	'Education',
	'Health and Social Work',
	'Other community, Social and Personal Service Activities',
	'Private Households with Employed Persons',
	'Extra-territorial Organizations and Bodies'

];
?>

<select name="present_occupation" class="browser-default" required>
@foreach($line_of_work as $value)

	<option value="{{ $value }}">{{ $value }}</option>

@endforeach
</select>