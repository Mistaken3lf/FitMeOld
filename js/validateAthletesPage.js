$(document).ready(function() {

  //Validate the add athlete form.
  var validator1 = $("#addAthleteForm").bootstrapValidator({
    fields: {
      //Make sure the username is not empty.
      newUsername: {
        message: "Username is required",
        validators: {
          notEmpty: {
            message: "Please enter a username"
          }
        }

      },

      //Make sure the password is not empty.
      userPassword: {
        message: "Password is required",
        validators: {
          notEmpty: {
            message: "Please enter a password"
          }

        }

      },

      //Make sure the email is not empty.
      athleteEmail: {
        message: "Email is required",
        validators: {
          notEmpty: {
            message: "Please enter an email"
          }
        }
      },

      //Make sure the first name is not empty.
      firstName: {
        message: "First name is required",
        validators: {
          notEmpty: {
            message: "Please enter first name"
          }
        }
      },

      //Make sure the last name is not empty.
      lastName: {
        message: "Last name is required",
        validators: {
          notEmpty: {
            message: "Please enter last name"
          }
        }
      },

      //Make sure sport is not empty.
      sport: {
        message: "Sport is required",
        validators: {
          notEmpty: {
            message: "Please enter athletes sport"
          }
        }
      },

      //Make sure the athletes height is not empty.
      athleteHeight: {
        message: "Height is required",
        validators: {
          notEmpty: {
            message: "Please enter athletes height"
          }
        }
      },

      //Make sure the weight is not empty.
      athleteWeight: {
        message: "Athletes weight is required",
        validators: {
          notEmpty: {
            message: "Please enter the athletes weight"
          }
        }
      },

    }

  });

  //Validate the athlete deletion form.
  var validator2 = $("#deleteAthleteForm").bootstrapValidator({
    fields: {
      //Make sure the username is not blank.
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

  //Validate the athlete deletion form.
  var validator3 = $("#assignWorkoutForm").bootstrapValidator({
    fields: {
      //Make sure the username is not blank.
      workoutName: {
        message: "Workout name required",
        validators: {
          notEmpty: {
            message: "Please select a workout"
          }
        }
      }
    }

  });


});
