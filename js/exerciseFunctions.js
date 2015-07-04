$("#removeExerciseForm").submit(function(e) {
    if (!$('input[type=checkbox]:checked').length) {
        alert("Please select an exercise to remove.");

        //stop the form from submitting
        return false;
    }

    return confirm("Are you sure you want to remove selected exercise(s)?");
});

////////////////////////////////////////////////////////////////////////////////

function handleSelect() {
    //If trunk is selected disable the other options.
    if (workoutCategory.value == "Trunk") {
        document.getElementById("workoutMovement").disabled = true;
        document.getElementById("workoutStyle").disabled = true;
        document.getElementById('workoutMovement').selectedIndex = 0;
        document.getElementById('workoutStyle').selectedIndex = 0;

        document.getElementById("workoutPlane").options[1].disabled = true;
        document.getElementById("workoutPlane").options[2].disabled = true;
        document.getElementById("workoutPlane").options[3].disabled = true;
        document.getElementById("workoutPlane").options[4].disabled = false;
        document.getElementById("workoutPlane").options[5].disabled = false;
        document.getElementById("workoutPlane").options[6].disabled = false;
        document.getElementById("workoutPlane").options[7].disabled = false;
    }

    //Trunk is not selected so disable the other options.
    else {
        document.getElementById("workoutMovement").disabled = false;
        document.getElementById("workoutStyle").disabled = false;
        document.getElementById('workoutPlane').selectedIndex = 0;

        document.getElementById("workoutPlane").options[1].disabled = false;
        document.getElementById("workoutPlane").options[2].disabled = false;
        document.getElementById("workoutPlane").options[3].disabled = false;
        document.getElementById("workoutPlane").options[4].disabled = true;
        document.getElementById("workoutPlane").options[5].disabled = true;
        document.getElementById("workoutPlane").options[6].disabled = true;
        document.getElementById("workoutPlane").options[7].disabled = true;
    }

}

////////////////////////////////////////////////////////////////////////////////

$('#currentExercisesTable').dataTable({
    "dom": 'T<"clear">lfrtip',
    "tableTools": {
        "sSwfPath": "//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf"
    }
});

////////////////////////////////////////////////////////////////////////////////


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
