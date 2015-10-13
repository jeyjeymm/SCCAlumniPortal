<?php

	/*

		$industries = [
		
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

	*/

	$industries = [
		
		'Accountancy and Financial Management',
		'Civil and Structural Engineering',
		'Construction and Building Services',
		'Consumer Goods and FMCG',
		'Engineering',
		'Financial Services and Insurance',
		'Healthcare',
		'Hospitality, Leisure and Travel',
		'Human Resources and Recruitment',
		'Investment Banking and Investment',
		'IT and Technology',
		'Law Barristers',
		'Law Solicitors',
		'Logistics, Transport and Supply Chain',
		'Management and Business',
		'Management Consulting',
		'Marketing, Advertising and Personal Relations',
		'Media, Journalism and Publishing',
		'Property',
		'Public Service, Charity and Social Work',
		'Quantity Surveying and Building Surveying',
		'Retail, Buying and Merchandising',
		'Sales',
		'Science and Research',
		'Teaching and Education'

	];

	$selected = isset($employment_data) ? $employment_data->industries : null ;

?>

	<label>Industries</label>

	<select name="industry" class="browser-default" required>

		@foreach($industries as $value)

			<option value="{{ $value }}" {{ $selected === $value ? 'selected' : null }}>{{ $value }}</option>

		@endforeach

	</select>