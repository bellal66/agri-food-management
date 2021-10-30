$(function() {
          $('#login-form-link').click(function(e) {
		     $("#login-form").delay(100).fadeIn(100);
 		     $("#register-form").fadeOut(100);
		     $('#register-form-link').removeClass('active');
		     $(this).addClass('active');
		     e.preventDefault();
	      });
	      $('#register-form-link').click(function(e) {
		     $("#register-form").delay(100).fadeIn(100);
 		     $("#login-form").fadeOut(100);
		     $('#login-form-link').removeClass('active');
		     $(this).addClass('active');
		      e.preventDefault();
	      });
	      $('.step-one-regi').click(function(e) {
		     $(".step-two").delay(100).fadeIn(100);
 		     $(".step-one").fadeOut(100);
		      e.preventDefault();
	      });
	      $('.step-two-regi').click(function(e) {
		     $(".step-three").delay(100).fadeIn(100);
 		     $(".step-two").fadeOut(100);
		      e.preventDefault();
	      });
          $('.step-two-regi-back').click(function(e) {
             $(".step-one").delay(100).fadeIn(100);
             $(".step-two").fadeOut(100);
              e.preventDefault();
          });
          $('.step-three-regi-back').click(function(e) {
             $(".step-two").delay(100).fadeIn(100);
             $(".step-three").fadeOut(100);
              e.preventDefault();
          });
        });
$(".btn-login").on("click", function () {
     $(".statusin").html("Logining...");
    var userIdOfuser = $(".userIdOfuser").val();
    var passwordOfuser = $(".passwordOfuser").val();

    $.ajax({
        method: "POST",
        url: "userLogin.php",
        data: {userId: userIdOfuser,
            password: passwordOfuser},
        success: function (data) {
         
            if (data === "no") {
                $(".statusin").html("<h3>Account isn't exist</h3>");
            } else {
                $(".statusin").html("<h3>Succesfully Logining...</h3>");
            	var timer = setTimeout(function() {
                  window.location='index.php'
                }, 2000);
            }
        }
    });
});
$(".btn-register").on("click", function () {
  $(".status").html("<h3>Wait Please...</h3>");
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

            if (data!== "") {
                $(".status").text(data);
            } else {
            	$(".status").html("<h3>Succesfully Logining...</h3>");
              var timer = setTimeout(function() {
                  window.location='index.php'
                }, 2000);
            }
        }
    });
});