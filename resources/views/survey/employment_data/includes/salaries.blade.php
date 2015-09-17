 <!-- Salary -->
<?php

    $salaries = [

        'Below P5,000.00',
        'P15,000.00 to less than P20,000.00',
        'P5,000.00 to less than P10,000.00',
        'P20,000.00 to less than P25,000.00',
        'P10,000.00 to less than P15,000.00',
        'P25,000.00 and above'

    ];

?>

<div class="input-field">

    <h5>What is your initial gross monthly earning?</h5>
    
    <select name="salary" class="browser-default">
    @foreach ($salaries as $value)

        <option value="{{ $value }}">{{ $value }}</option>

    @endforeach
    </select>

</div>