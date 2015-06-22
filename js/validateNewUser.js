$(document).ready(function() {

  //Validate the new user form.
  var validator1 = $("#addUserForm").bootstrapValidator({
    fields: {
      //Check for blank username.
      adminUser: {
        message: "Username is required",
        validators: {
          notEmpty: {
            message: "Please enter a username"
          }
        }

      },

      //Check for blank password.
      adminPass: {
        message: "Password is required",
        validators: {
          notEmpty: {
            message: "Please enter a password"
          }

        }

      },

      //Check for blank first name.
      firstName: {
        message: "First name is required",
        validators: {
          notEmpty: {
            message: "Please enter first name"
          }
        }
      },

      //Check for blank last name.
      lastName: {
        message: "Last name is required",
        validators: {
          notEmpty: {
            message: "Please enter last name"
          }
        }
      },

      //Check for blank email.
      email: {
        message: "Email is required",
        validators: {
          notEmpty: {
            message: "Please enter email address"
          }
        }
      },

      //Check to make sure they select the permissions.
      userPermissions: {
        message: "User permissions is required",
        validators: {
          notEmpty: {
            message: "Please select the user's permissions"
          }
        }
      }
    },

  });

  //Validate the remove user form.
  var validator2 = $("#removeUserForm").bootstrapValidator({
    fields: {
      //Check for blank username.
      removeUserName: {
        message: "Username is required",
        validators: {
          notEmpty: {
            message: "Please enter the username to remove"
          }
        }
      }
    }

  });


});
