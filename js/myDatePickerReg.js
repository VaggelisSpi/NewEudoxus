$(function() {

    $('.my-calendar .input-group-addon').daterangepicker({
        locale: {format: 'DD/MM/YYYY'},
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1930,
        maxYear: 2000,
        autoUpdateInput: false
    }, function(chosen_date) {
      $('input[name="date"]').val(chosen_date.format('DD/MM/YYYY'));
    });

    $('input[name="date"]').daterangepicker({
        locale: {format: 'DD/MM/YYYY'},
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1930,
        maxYear: 2000,
        autoUpdateInput: false
    }, function(chosen_date) {
      $('input[name="date"]').val(chosen_date.format('DD/MM/YYYY'));
    });


});
