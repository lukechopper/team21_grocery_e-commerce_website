$(function(){

    const origPrice = turnStringToNum($('#display_amount').html());

    $('#hidden_total').val(Number(origPrice).toFixed(2));

    function turnStringToNum(strInput){
        let match = strInput.match(/([0-9]|\.)+/g);
        if(match) match = match[0];
        return Number(match);
    }

    $('#amount_number').on('input', function() {
        const newVal = $(this).val();
        $('#display_amount').html('£'+Number(origPrice*newVal).toFixed(2));
        $('#hidden_total').val(Number(origPrice*newVal).toFixed(2));
    });
});
