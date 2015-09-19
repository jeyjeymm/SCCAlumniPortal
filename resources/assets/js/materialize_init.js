$(document).ready(function () {
    init_materialize_components();
});

function init_materialize_components() {

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 100 // Creates a dropdown of 15 years to control year
    });
    $('select').material_select();
    $('.slider').slider({full_width: true});
    $('.scrollspy').scrollSpy();
    $('.modal-trigger').leanModal();
    $('.button-collapse').sideNav();
    $('.dropdown-button').dropdown();
    
}