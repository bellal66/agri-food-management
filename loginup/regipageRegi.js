$(".btn-register").on("click", function () {
  $(".status").text("Loading...");
    var userId = $(".userId").val();
    var name = $(".name").val();
    var email = $(".email").val();
    var password = $(".password").val();
    var club = $(".club").val();
    var mobileNumber = $(".mobileNumber").val();
    var sponsor = $(".sponsor").val();
    var confirmPassword = $(".confirmPassword").val();
    var recoveryPassword = $(".recoveryPassword").val();
    
    $.ajax({
        method: "POST",
        url: "userSignUp.php",
        data: {name: name, userId: userId, email: email, password: password,confirmPassword:confirmPassword, mobileNumber: mobileNumber, sponsor: sponsor, club: club, recoveryPassword: recoveryPassword},
        success: function (data) {

            if (data == "Succesfull") {
                $(".status").html("Succesfull");
                  var timer = setTimeout(function() {
                  window.location='index.php'
                }, 2000);
            }else  {
            	$(".status").text(data);
            }
        }
    });
});