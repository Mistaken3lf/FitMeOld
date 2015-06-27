//Validate checkbox on assign workout
$("#assignWorkoutForm").submit(function(e) {
  if(!$('input[type=checkbox]:checked').length) {
      alert("Please select an athlete to assign a workout to.");

      //stop the form from submitting
      return false;
  }
});

$("#removeAthleteForm").submit(function(e) {
  if(!$('input[type=checkbox]:checked').length) {
      alert("Please select an athlete to remove.");

      //stop the form from submitting
      return false;
  }

  return confirm("Are you sure you want to remove selected athlete(s)?");
});
//****************************************************************************

//AJAX Script to show avaliabel athletes on assign workout
function showAvailableAthletes(str) {
if (str == "") {
    document.getElementById("showTable").innerHTML = "";
    return;
} else {
  if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
  } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
              document.getElementById("showTable").innerHTML = xmlhttp.responseText;
          }
      }

      xmlhttp.open("GET","showAssignWorkouts.php?q="+str,true);
      xmlhttp.send();
  }
}
//******************************************************************************

//Data table to the current athletes
  $('#currentAthletesTable').dataTable( {
      "dom": 'T<"clear">lfrtip',
      "tableTools": {
          "sSwfPath": "//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf"
      }
  } );
//*****************************************************************************

//Validation for athletes pages
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
//*****************************************************************************

//Tab reload script
    $('#myTab a').click(function(e) {
      e.preventDefault();
      $(this).tab('show');
    });

    // store the currently selected tab in the hash value
    $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
      var id = $(e.target).attr("href").substr(1);
      window.location.hash = id;
    });

    // on load of the page: switch to the currently selected tab
    var hash = window.location.hash;
    $('#myTab a[href="' + hash + '"]').tab('show');

//******************************************************************************
