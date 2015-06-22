$(document).ready(function() {

  //Validate the new user form.
  var validator1 = $("#createAssessmentForm").bootstrapValidator({
    fields: {
      //Check for empty date.
      date: {
        message: "Date is required",
        validators: {
          notEmpty: {
            message: "Please select a date"
          }
        }

      },

      //Check for empty sport.
      sport: {
        message: "Sport is required",
        validators: {
          notEmpty: {
            message: "Please select a sport"
          }

        }

      },

      //Check for blank athlete.
      athlete: {
        message: "Athlete is required",
        validators: {
          notEmpty: {
            message: "Please select an athlete"
          }
        }
      },

      //Check for blank exercise.
      exercise: {
        message: "Exercise is required",
        validators: {
          notEmpty: {
            message: "Please select an exercise"
          }
        }
      },

      //Check for emtpy assessment type.
      assessmentType: {
        message: "Assessment type is required",
        validators: {
          notEmpty: {
            message: "Please select an assessment type"
          }
        }
      },

      //Check for an empty score.
      score: {
        message: "Score is required",
        validators: {
          notEmpty: {
            message: "Please enter a score"
          }
        }
      }
    },

  });

});
