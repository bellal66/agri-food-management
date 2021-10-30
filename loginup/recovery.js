
$(".step-one-regi-recovery").on("click", function () {
    var userId = $(".userId").val();
    var recovery = $(".recovery").val();
    
    $.ajax({
        method: "POST",
        url: "recoveryCheck.php",
        data: {userId: userId, recovery: recovery},
        success: function (data) {

            if (data == "okk") {
              $(".status").html('');
              $(".step-two").delay(100).fadeIn(100);
              $(".step-one").fadeOut(100);
              $(".userId-check").val(userId);
            } else {
            	$(".status").html(data);
            }
        }
    });
});
$(".btn-recover").on("click", function () {
    var npassword = $(".npassword").val();
    var confirmNPassword = $(".confirmNPassword").val();
    var userId = $(".userId-check").val();
    
    $.ajax({
        method: "POST",
        url: "newPassword.php",
        data: {npassword: npassword, confirmNPassword: confirmNPassword, userId: userId},
        success: function (data) {

            if (data == "okk") {
              $(".status").html('<span style="color: green;">Succesful. Please login.<span>');
            } else {
              $(".status").html(data);
            }
        }
    });
});