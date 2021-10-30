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
                $(".statusin").html("Account isn't exist");
            } else {
                $(".statusin").html("Succesfully Logining...");
            	var timer = setTimeout(function() {
                  window.location='index.php'
                }, 2000);
            }
        }
    });
});
