$(document).ready(function() {

  //Validate the login form.
  var validator = $("#loginForm").bootstrapValidator({
    fields: {
      //Check for a blank username.
      username: {
        message: "Username is required",
        validators: {
          notEmpty: {
            message: "Please enter username"
          }
        }

      },

      //Check for a blank password.
      password: {
        message: "Password is required",
        validators: {
          notEmpty: {
            message: "Please enter a password"
          }

        }

      }
    }
  });

});
