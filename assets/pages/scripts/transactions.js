$(document).ready(function(){
    $('body').on('click', '.partial_refund', function(e) {
        e.preventDefault();
        amount = parseFloat(prompt("refund amount"));
        if(amount > 0) {
            url = $(this).attr('href') + '/' + amount;
            window.location.href = url;
        }
    });
    $('.date-picker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
});