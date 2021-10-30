$('.farmer-name').keyup(function () {
    var itemcode = 0;
    $('.farmer-name').each(function() {
        itemcode = $(this).val();
    });
    $.ajax({
        method: "POST",
        url: "getValueForBuyingSelling.php",
        data: {
            farmerName: itemcode,
        },
        success: function (data) {
            $('.address').val(data);
        }
    });
}); 

$('.quantity').keyup(function(){
    $eachTotalAmount1=0;
    $eachTotalAmountLast=0;
    $quantity = $(this).val();
    $eachPrice = $('.eachPrice').val();
    $('.eachTotalAmount').text($quantity * $eachPrice);
    $eachTotalAmount1 = Number($('.eachTotalAmount1').text());
    $eachTotalAmountLast = Number($('.eachTotalAmountLast').text());
    $('.totalAmount').text(($quantity * $eachPrice) + $eachTotalAmount1 + $eachTotalAmountLast);
});

