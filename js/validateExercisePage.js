$(document).ready(function() {
  //Validate the create exercise form.
  var validator = $("#createExerciseForm").bootstrapValidator({
    fields: {
      //Make sure the exercise name is not blank.
      exerciseName: {
        message: "Exercise Name is required",
        validators: {
          notEmpty: {
            message: "Please enter the exercise name"
          }
        }

      },

      //Make sure the workout category is not blank.
      workoutCategory: {
        message: "Workout Category is required",
        validators: {
          notEmpty: {
            message: "Please select a workout category"
          }

        }

      },

      //Make sure the workout plane is not blank.
      workoutPlane: {
        message: "Workout plane is required",
        validators: {
          notEmpty: {
            message: "Please select a workout plane"
          }
        }
      },

      //Make sure the movement is not blank.
      workoutMovement: {
        message: "Workout movement is required",
        validators: {
          notEmpty: {
            message: "Please select a workout movement"
          }
        }
      },

      //Make sure the style is not blank.
      workoutStyle: {
        message: "Workout style is required",
        validators: {
          notEmpty: {
            message: "Please select a workout style"
          }
        }
      },
    }
  });

  //Validate the remove exercise form.
  var removeExerciseValidator = $("#removeExerciseForm").bootstrapValidator({
    fields: {
      //Make sure the exercise name to remove is not blank.
      removeExerciseName: {
        message: "Exercise Name is required",
        validators: {
          notEmpty: {
            message: "Please enter the exercise name to remove"
          }
        }

      }
    }

  });

});
