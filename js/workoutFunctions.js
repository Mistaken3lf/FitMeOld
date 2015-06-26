function printUsedExercises(str) {
    if (str == "") {
        document.getElementById("output").innerHTML = "";
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
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("output").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","printUsedExercises.php?listOfWorkouts="+str,true);
        xmlhttp.send();
    }
}

////////////////////////////////////////////////////////////////////////////////

function printWorkout(str) {
    if (str == "") {
        document.getElementById("output2").innerHTML = "";
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
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("output2").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","printWorkout.php?workout="+str,true);
        xmlhttp.send();
    }
}

////////////////////////////////////////////////////////////////////////////////

function confirmWrkOutRmv(){
return confirm("Are you sure you want to remove the Workout?");
}

$("#previousWorkoutForm").submit(function(e) {
  if(!$('input[type=checkbox]:checked').length) {
      alert("Please select an exercise to remove from workout.");

      //stop the form from submitting
      return false;
  }
});

////////////////////////////////////////////////////////////////////////////////



  //Validate the add workout form.
  var validator1 = $("#addWorkoutForm").bootstrapValidator({
    fields: {
      //Check for blank macro name.
      macro: {
        message: "Macro name is required",
        validators: {
          notEmpty: {
            message: "Please enter a macro name"
          }
        }
      },

      weeks: {
        message: "Number of weeks is required",
        validators: {
          notEmpty: {
            message: "Please enter the number of weeks"
          }
        }
      },

      days: {
        message: "Number of days is required",
        validators: {
          notEmpty: {
            message: "Please enter the number of days"
          }
        }
      },

      sport: {
        message: "Sport is required",
        validators: {
          notEmpty: {
            message: "Please enter a sport"
          }
        }
      }

    },

  });

  var validator2 = $("#removeWorkoutForm").bootstrapValidator({
    fields: {
      //Check for blank macro name.
      workoutToRemove: {
        message: "Workout is required",
        validators: {
          notEmpty: {
            message: "Please select a workout"
          }
        }
      }
    }
  });
////////////////////////////////////////////////////////////////////////////////

var select = document.getElementById("selectSets");

select.onchange = function() {
  if (select.value == "1") {
    document.getElementById("firsttable").style.display = "inline";
    document.getElementById("secondtable").style.display = "none";
    document.getElementById("thirdtable").style.display = "none";
    document.getElementById("fourthtable").style.display = "none";
    document.getElementById("fifthtable").style.display = "none";
    document.getElementById("sixthtable").style.display = "none";
    document.getElementById("seventhtable").style.display = "none";
    document.getElementById("eighthtable").style.display = "none";
    document.getElementById("ninethtable").style.display = "none";
    document.getElementById("tenthtable").style.display = "none";

  } else if (select.value == "2") {
    document.getElementById("firsttable").style.display = "inline";
    document.getElementById("secondtable").style.display = "inline";
    document.getElementById("thirdtable").style.display = "none";
    document.getElementById("fourthtable").style.display = "none";
    document.getElementById("fifthtable").style.display = "none";
    document.getElementById("sixthtable").style.display = "none";
    document.getElementById("seventhtable").style.display = "none";
    document.getElementById("eighthtable").style.display = "none";
    document.getElementById("ninethtable").style.display = "none";
    document.getElementById("tenthtable").style.display = "none";
  } else if (select.value == "3") {
    document.getElementById("firsttable").style.display = "inline";
    document.getElementById("secondtable").style.display = "inline";
    document.getElementById("thirdtable").style.display = "inline";
    document.getElementById("fourthtable").style.display = "none";
    document.getElementById("fifthtable").style.display = "none";
    document.getElementById("sixthtable").style.display = "none";
    document.getElementById("seventhtable").style.display = "none";
    document.getElementById("eighthtable").style.display = "none";
    document.getElementById("ninethtable").style.display = "none";
    document.getElementById("tenthtable").style.display = "none";
  } else if (select.value == "4") {
    document.getElementById("firsttable").style.display = "inline";
    document.getElementById("secondtable").style.display = "inline";
    document.getElementById("thirdtable").style.display = "inline";
    document.getElementById("fourthtable").style.display = "inline";
    document.getElementById("fifthtable").style.display = "none";
    document.getElementById("sixthtable").style.display = "none";
    document.getElementById("seventhtable").style.display = "none";
    document.getElementById("eighthtable").style.display = "none";
    document.getElementById("ninethtable").style.display = "none";
    document.getElementById("tenthtable").style.display = "none";
  } else if (select.value == "5") {
    document.getElementById("firsttable").style.display = "inline";
    document.getElementById("secondtable").style.display = "inline";
    document.getElementById("thirdtable").style.display = "inline";
    document.getElementById("fourthtable").style.display = "inline";
    document.getElementById("fifthtable").style.display = "inline";
    document.getElementById("sixthtable").style.display = "none";
    document.getElementById("seventhtable").style.display = "none";
    document.getElementById("eighthtable").style.display = "none";
    document.getElementById("ninethtable").style.display = "none";
    document.getElementById("tenthtable").style.display = "none";
  } else if (select.value == "6") {
    document.getElementById("firsttable").style.display = "inline";
    document.getElementById("secondtable").style.display = "inline";
    document.getElementById("thirdtable").style.display = "inline";
    document.getElementById("fourthtable").style.display = "inline";
    document.getElementById("fifthtable").style.display = "inline";
    document.getElementById("sixthtable").style.display = "inline";
    document.getElementById("seventhtable").style.display = "none";
    document.getElementById("eighthtable").style.display = "none";
    document.getElementById("ninethtable").style.display = "none";
    document.getElementById("tenthtable").style.display = "none";
  } else if (select.value == "7") {
    document.getElementById("firsttable").style.display = "inline";
    document.getElementById("secondtable").style.display = "inline";
    document.getElementById("thirdtable").style.display = "inline";
    document.getElementById("fourthtable").style.display = "inline";
    document.getElementById("fifthtable").style.display = "inline";
    document.getElementById("sixthtable").style.display = "inline";
    document.getElementById("seventhtable").style.display = "inline";
    document.getElementById("eighthtable").style.display = "none";
    document.getElementById("ninethtable").style.display = "none";
    document.getElementById("tenthtable").style.display = "none";
  } else if (select.value == "8") {
    document.getElementById("firsttable").style.display = "inline";
    document.getElementById("secondtable").style.display = "inline";
    document.getElementById("thirdtable").style.display = "inline";
    document.getElementById("fourthtable").style.display = "inline";
    document.getElementById("fifthtable").style.display = "inline";
    document.getElementById("sixthtable").style.display = "inline";
    document.getElementById("seventhtable").style.display = "inline";
    document.getElementById("eighthtable").style.display = "inline";
    document.getElementById("ninethtable").style.display = "none";
    document.getElementById("tenthtable").style.display = "none";
  } else if (select.value == "9") {
    document.getElementById("firsttable").style.display = "inline";
    document.getElementById("secondtable").style.display = "inline";
    document.getElementById("thirdtable").style.display = "inline";
    document.getElementById("fourthtable").style.display = "inline";
    document.getElementById("fifthtable").style.display = "inline";
    document.getElementById("sixthtable").style.display = "inline";
    document.getElementById("seventhtable").style.display = "inline";
    document.getElementById("eighthtable").style.display = "inline";
    document.getElementById("ninethtable").style.display = "inline";
    document.getElementById("tenthtable").style.display = "none";
  } else if (select.value == "10") {
    document.getElementById("firsttable").style.display = "inline";
    document.getElementById("secondtable").style.display = "inline";
    document.getElementById("thirdtable").style.display = "inline";
    document.getElementById("fourthtable").style.display = "inline";
    document.getElementById("fifthtable").style.display = "inline";
    document.getElementById("sixthtable").style.display = "inline";
    document.getElementById("seventhtable").style.display = "inline";
    document.getElementById("eighthtable").style.display = "inline";
    document.getElementById("ninethtable").style.display = "inline";
    document.getElementById("tenthtable").style.display = "inline";
  } else {
    document.getElementById("firsttable").style.display = "none"
    document.getElementById("secondtable").style.display = "none";
    document.getElementById("thirdtable").style.display = "none";
    document.getElementById("fourthtable").style.display = "none";
    document.getElementById("fifthtable").style.display = "none";
    document.getElementById("sixthtable").style.display = "none";
    document.getElementById("seventhtable").style.display = "none";
    document.getElementById("eighthtable").style.display = "none";
    document.getElementById("ninethtable").style.display = "none";
    document.getElementById("tenthtable").style.display = "none";
  }

}

var select2 = document.getElementById("selectSets2");

select2.onchange = function() {
  if (select2.value == "1") {
    document.getElementById("firsttable2").style.display = "inline";
    document.getElementById("secondtable2").style.display = "none";
    document.getElementById("thirdtable2").style.display = "none";
    document.getElementById("fourthtable2").style.display = "none";
    document.getElementById("fifthtable2").style.display = "none";
    document.getElementById("sixthtable2").style.display = "none";
    document.getElementById("seventhtable2").style.display = "none";
    document.getElementById("eighthtable2").style.display = "none";
    document.getElementById("ninethtable2").style.display = "none";
    document.getElementById("tenthtable2").style.display = "none";

  } else if (select2.value == "2") {
    document.getElementById("firsttable2").style.display = "inline";
    document.getElementById("secondtable2").style.display = "inline";
    document.getElementById("thirdtable2").style.display = "none";
    document.getElementById("fourthtable2").style.display = "none";
    document.getElementById("fifthtable2").style.display = "none";
    document.getElementById("sixthtable2").style.display = "none";
    document.getElementById("seventhtable2").style.display = "none";
    document.getElementById("eighthtable2").style.display = "none";
    document.getElementById("ninethtable2").style.display = "none";
    document.getElementById("tenthtable2").style.display = "none";
  } else if (select2.value == "3") {
    document.getElementById("firsttable2").style.display = "inline";
    document.getElementById("secondtable2").style.display = "inline";
    document.getElementById("thirdtable2").style.display = "inline";
    document.getElementById("fourthtable2").style.display = "none";
    document.getElementById("fifthtable2").style.display = "none";
    document.getElementById("sixthtable2").style.display = "none";
    document.getElementById("seventhtable2").style.display = "none";
    document.getElementById("eighthtable2").style.display = "none";
    document.getElementById("ninethtable2").style.display = "none";
    document.getElementById("tenthtable2").style.display = "none";
  } else if (select2.value == "4") {
    document.getElementById("firsttable2").style.display = "inline";
    document.getElementById("secondtable2").style.display = "inline";
    document.getElementById("thirdtable2").style.display = "inline";
    document.getElementById("fourthtable2").style.display = "inline";
    document.getElementById("fifthtable2").style.display = "none";
    document.getElementById("sixthtable2").style.display = "none";
    document.getElementById("seventhtable2").style.display = "none";
    document.getElementById("eighthtable2").style.display = "none";
    document.getElementById("ninethtable2").style.display = "none";
    document.getElementById("tenthtable2").style.display = "none";
  } else if (select2.value == "5") {
    document.getElementById("firsttable2").style.display = "inline";
    document.getElementById("secondtable2").style.display = "inline";
    document.getElementById("thirdtable2").style.display = "inline";
    document.getElementById("fourthtable2").style.display = "inline";
    document.getElementById("fifthtable2").style.display = "inline";
    document.getElementById("sixthtable2").style.display = "none";
    document.getElementById("seventhtable2").style.display = "none";
    document.getElementById("eighthtable2").style.display = "none";
    document.getElementById("ninethtable2").style.display = "none";
    document.getElementById("tenthtable2").style.display = "none";
  } else if (select2.value == "6") {
    document.getElementById("firsttable2").style.display = "inline";
    document.getElementById("secondtable2").style.display = "inline";
    document.getElementById("thirdtable2").style.display = "inline";
    document.getElementById("fourthtable2").style.display = "inline";
    document.getElementById("fifthtable2").style.display = "inline";
    document.getElementById("sixthtable2").style.display = "inline";
    document.getElementById("seventhtable2").style.display = "none";
    document.getElementById("eighthtable2").style.display = "none";
    document.getElementById("ninethtable2").style.display = "none";
    document.getElementById("tenthtable2").style.display = "none";
  } else if (select2.value == "7") {
    document.getElementById("firsttable2").style.display = "inline";
    document.getElementById("secondtable2").style.display = "inline";
    document.getElementById("thirdtable2").style.display = "inline";
    document.getElementById("fourthtable2").style.display = "inline";
    document.getElementById("fifthtable2").style.display = "inline";
    document.getElementById("sixthtable2").style.display = "inline";
    document.getElementById("seventhtable2").style.display = "inline";
    document.getElementById("eighthtable2").style.display = "none";
    document.getElementById("ninethtable2").style.display = "none";
    document.getElementById("tenthtable2").style.display = "none";
  } else if (select2.value == "8") {
    document.getElementById("firsttable2").style.display = "inline";
    document.getElementById("secondtable2").style.display = "inline";
    document.getElementById("thirdtable2").style.display = "inline";
    document.getElementById("fourthtable2").style.display = "inline";
    document.getElementById("fifthtable2").style.display = "inline";
    document.getElementById("sixthtable2").style.display = "inline";
    document.getElementById("seventhtable2").style.display = "inline";
    document.getElementById("eighthtable2").style.display = "inline";
    document.getElementById("ninethtable2").style.display = "none";
    document.getElementById("tenthtable2").style.display = "none";
  } else if (select2.value == "9") {
    document.getElementById("firsttable2").style.display = "inline";
    document.getElementById("secondtable2").style.display = "inline";
    document.getElementById("thirdtable2").style.display = "inline";
    document.getElementById("fourthtable2").style.display = "inline";
    document.getElementById("fifthtable2").style.display = "inline";
    document.getElementById("sixthtable2").style.display = "inline";
    document.getElementById("seventhtable2").style.display = "inline";
    document.getElementById("eighthtable2").style.display = "inline";
    document.getElementById("ninethtable2").style.display = "inline";
    document.getElementById("tenthtable2").style.display = "none";
  } else if (select2.value == "10") {
    document.getElementById("firsttable2").style.display = "inline";
    document.getElementById("secondtable2").style.display = "inline";
    document.getElementById("thirdtable2").style.display = "inline";
    document.getElementById("fourthtable2").style.display = "inline";
    document.getElementById("fifthtable2").style.display = "inline";
    document.getElementById("sixthtable2").style.display = "inline";
    document.getElementById("seventhtable2").style.display = "inline";
    document.getElementById("eighthtable2").style.display = "inline";
    document.getElementById("ninethtable2").style.display = "inline";
    document.getElementById("tenthtable2").style.display = "inline";
  } else {
    document.getElementById("firsttable2").style.display = "none"
    document.getElementById("secondtable2").style.display = "none";
    document.getElementById("thirdtable2").style.display = "none";
    document.getElementById("fourthtable2").style.display = "none";
    document.getElementById("fifthtable2").style.display = "none";
    document.getElementById("sixthtable2").style.display = "none";
    document.getElementById("seventhtable2").style.display = "none";
    document.getElementById("eighthtable2").style.display = "none";
    document.getElementById("ninethtable2").style.display = "none";
    document.getElementById("tenthtable2").style.display = "none";
  }

}

var select3 = document.getElementById("selectSets3");

select3.onchange = function() {
  if (select3.value == "1") {
    document.getElementById("firsttable3").style.display = "inline";
    document.getElementById("secondtable3").style.display = "none";
    document.getElementById("thirdtable3").style.display = "none";
    document.getElementById("fourthtable3").style.display = "none";
    document.getElementById("fifthtable3").style.display = "none";
    document.getElementById("sixthtable3").style.display = "none";
    document.getElementById("seventhtable3").style.display = "none";
    document.getElementById("eighthtable3").style.display = "none";
    document.getElementById("ninethtable3").style.display = "none";
    document.getElementById("tenthtable3").style.display = "none";

  } else if (select3.value == "2") {
    document.getElementById("firsttable3").style.display = "inline";
    document.getElementById("secondtable3").style.display = "inline";
    document.getElementById("thirdtable3").style.display = "none";
    document.getElementById("fourthtable3").style.display = "none";
    document.getElementById("fifthtable3").style.display = "none";
    document.getElementById("sixthtable3").style.display = "none";
    document.getElementById("seventhtable3").style.display = "none";
    document.getElementById("eighthtable3").style.display = "none";
    document.getElementById("ninethtable3").style.display = "none";
    document.getElementById("tenthtable3").style.display = "none";
  } else if (select3.value == "3") {
    document.getElementById("firsttable3").style.display = "inline";
    document.getElementById("secondtable3").style.display = "inline";
    document.getElementById("thirdtable3").style.display = "inline";
    document.getElementById("fourthtable3").style.display = "none";
    document.getElementById("fifthtable3").style.display = "none";
    document.getElementById("sixthtable3").style.display = "none";
    document.getElementById("seventhtable3").style.display = "none";
    document.getElementById("eighthtable3").style.display = "none";
    document.getElementById("ninethtable3").style.display = "none";
    document.getElementById("tenthtable3").style.display = "none";
  } else if (select3.value == "4") {
    document.getElementById("firsttable3").style.display = "inline";
    document.getElementById("secondtable3").style.display = "inline";
    document.getElementById("thirdtable3").style.display = "inline";
    document.getElementById("fourthtable3").style.display = "inline";
    document.getElementById("fifthtable3").style.display = "none";
    document.getElementById("sixthtable3").style.display = "none";
    document.getElementById("seventhtable3").style.display = "none";
    document.getElementById("eighthtable3").style.display = "none";
    document.getElementById("ninethtable3").style.display = "none";
    document.getElementById("tenthtable3").style.display = "none";
  } else if (select3.value == "5") {
    document.getElementById("firsttable3").style.display = "inline";
    document.getElementById("secondtable3").style.display = "inline";
    document.getElementById("thirdtable3").style.display = "inline";
    document.getElementById("fourthtable3").style.display = "inline";
    document.getElementById("fifthtable3").style.display = "inline";
    document.getElementById("sixthtable3").style.display = "none";
    document.getElementById("seventhtable3").style.display = "none";
    document.getElementById("eighthtable3").style.display = "none";
    document.getElementById("ninethtable3").style.display = "none";
    document.getElementById("tenthtable3").style.display = "none";
  } else if (select3.value == "6") {
    document.getElementById("firsttable3").style.display = "inline";
    document.getElementById("secondtable3").style.display = "inline";
    document.getElementById("thirdtable3").style.display = "inline";
    document.getElementById("fourthtable3").style.display = "inline";
    document.getElementById("fifthtable3").style.display = "inline";
    document.getElementById("sixthtable3").style.display = "inline";
    document.getElementById("seventhtable3").style.display = "none";
    document.getElementById("eighthtable3").style.display = "none";
    document.getElementById("ninethtable3").style.display = "none";
    document.getElementById("tenthtable3").style.display = "none";
  } else if (select3.value == "7") {
    document.getElementById("firsttable3").style.display = "inline";
    document.getElementById("secondtable3").style.display = "inline";
    document.getElementById("thirdtable3").style.display = "inline";
    document.getElementById("fourthtable3").style.display = "inline";
    document.getElementById("fifthtable3").style.display = "inline";
    document.getElementById("sixthtable3").style.display = "inline";
    document.getElementById("seventhtable3").style.display = "inline";
    document.getElementById("eighthtable3").style.display = "none";
    document.getElementById("ninethtable3").style.display = "none";
    document.getElementById("tenthtable3").style.display = "none";
  } else if (select3.value == "8") {
    document.getElementById("firsttable3").style.display = "inline";
    document.getElementById("secondtable3").style.display = "inline";
    document.getElementById("thirdtable3").style.display = "inline";
    document.getElementById("fourthtable3").style.display = "inline";
    document.getElementById("fifthtable3").style.display = "inline";
    document.getElementById("sixthtable3").style.display = "inline";
    document.getElementById("seventhtable3").style.display = "inline";
    document.getElementById("eighthtable3").style.display = "inline";
    document.getElementById("ninethtable3").style.display = "none";
    document.getElementById("tenthtable3").style.display = "none";
  } else if (select3.value == "9") {
    document.getElementById("firsttable3").style.display = "inline";
    document.getElementById("secondtable3").style.display = "inline";
    document.getElementById("thirdtable3").style.display = "inline";
    document.getElementById("fourthtable3").style.display = "inline";
    document.getElementById("fifthtable3").style.display = "inline";
    document.getElementById("sixthtable3").style.display = "inline";
    document.getElementById("seventhtable3").style.display = "inline";
    document.getElementById("eighthtable3").style.display = "inline";
    document.getElementById("ninethtable3").style.display = "inline";
    document.getElementById("tenthtable3").style.display = "none";
  } else if (select3.value == "10") {
    document.getElementById("firsttable3").style.display = "inline";
    document.getElementById("secondtable3").style.display = "inline";
    document.getElementById("thirdtable3").style.display = "inline";
    document.getElementById("fourthtable3").style.display = "inline";
    document.getElementById("fifthtable3").style.display = "inline";
    document.getElementById("sixthtable3").style.display = "inline";
    document.getElementById("seventhtable3").style.display = "inline";
    document.getElementById("eighthtable3").style.display = "inline";
    document.getElementById("ninethtable3").style.display = "inline";
    document.getElementById("tenthtable3").style.display = "inline";
  } else {
    document.getElementById("firsttable3").style.display = "none"
    document.getElementById("secondtable3").style.display = "none";
    document.getElementById("thirdtable3").style.display = "none";
    document.getElementById("fourthtable3").style.display = "none";
    document.getElementById("fifthtable3").style.display = "none";
    document.getElementById("sixthtable3").style.display = "none";
    document.getElementById("seventhtable3").style.display = "none";
    document.getElementById("eighthtable3").style.display = "none";
    document.getElementById("ninethtable3").style.display = "none";
    document.getElementById("tenthtable3").style.display = "none";
  }

}

var select4 = document.getElementById("selectSets4");

select4.onchange = function() {
  if (select4.value == "1") {
    document.getElementById("firsttable4").style.display = "inline";
    document.getElementById("secondtable4").style.display = "none";
    document.getElementById("thirdtable4").style.display = "none";
    document.getElementById("fourthtable4").style.display = "none";
    document.getElementById("fifthtable4").style.display = "none";
    document.getElementById("sixthtable4").style.display = "none";
    document.getElementById("seventhtable4").style.display = "none";
    document.getElementById("eighthtable4").style.display = "none";
    document.getElementById("ninethtable4").style.display = "none";
    document.getElementById("tenthtable4").style.display = "none";

  } else if (select4.value == "2") {
    document.getElementById("firsttable4").style.display = "inline";
    document.getElementById("secondtable4").style.display = "inline";
    document.getElementById("thirdtable4").style.display = "none";
    document.getElementById("fourthtable4").style.display = "none";
    document.getElementById("fifthtable4").style.display = "none";
    document.getElementById("sixthtable4").style.display = "none";
    document.getElementById("seventhtable4").style.display = "none";
    document.getElementById("eighthtable4").style.display = "none";
    document.getElementById("ninethtable4").style.display = "none";
    document.getElementById("tenthtable4").style.display = "none";
  } else if (select4.value == "3") {
    document.getElementById("firsttable4").style.display = "inline";
    document.getElementById("secondtable4").style.display = "inline";
    document.getElementById("thirdtable4").style.display = "inline";
    document.getElementById("fourthtable4").style.display = "none";
    document.getElementById("fifthtable4").style.display = "none";
    document.getElementById("sixthtable4").style.display = "none";
    document.getElementById("seventhtable4").style.display = "none";
    document.getElementById("eighthtable4").style.display = "none";
    document.getElementById("ninethtable4").style.display = "none";
    document.getElementById("tenthtable4").style.display = "none";
  } else if (select4.value == "4") {
    document.getElementById("firsttable4").style.display = "inline";
    document.getElementById("secondtable4").style.display = "inline";
    document.getElementById("thirdtable4").style.display = "inline";
    document.getElementById("fourthtable4").style.display = "inline";
    document.getElementById("fifthtable4").style.display = "none";
    document.getElementById("sixthtable4").style.display = "none";
    document.getElementById("seventhtable4").style.display = "none";
    document.getElementById("eighthtable4").style.display = "none";
    document.getElementById("ninethtable4").style.display = "none";
    document.getElementById("tenthtable4").style.display = "none";
  } else if (select4.value == "5") {
    document.getElementById("firsttable4").style.display = "inline";
    document.getElementById("secondtable4").style.display = "inline";
    document.getElementById("thirdtable4").style.display = "inline";
    document.getElementById("fourthtable4").style.display = "inline";
    document.getElementById("fifthtable4").style.display = "inline";
    document.getElementById("sixthtable4").style.display = "none";
    document.getElementById("seventhtable4").style.display = "none";
    document.getElementById("eighthtable4").style.display = "none";
    document.getElementById("ninethtable4").style.display = "none";
    document.getElementById("tenthtable4").style.display = "none";
  } else if (select4.value == "6") {
    document.getElementById("firsttable4").style.display = "inline";
    document.getElementById("secondtable4").style.display = "inline";
    document.getElementById("thirdtable4").style.display = "inline";
    document.getElementById("fourthtable4").style.display = "inline";
    document.getElementById("fifthtable4").style.display = "inline";
    document.getElementById("sixthtable4").style.display = "inline";
    document.getElementById("seventhtable4").style.display = "none";
    document.getElementById("eighthtable4").style.display = "none";
    document.getElementById("ninethtable4").style.display = "none";
    document.getElementById("tenthtable4").style.display = "none";
  } else if (select4.value == "7") {
    document.getElementById("firsttable4").style.display = "inline";
    document.getElementById("secondtable4").style.display = "inline";
    document.getElementById("thirdtable4").style.display = "inline";
    document.getElementById("fourthtable4").style.display = "inline";
    document.getElementById("fifthtable4").style.display = "inline";
    document.getElementById("sixthtable4").style.display = "inline";
    document.getElementById("seventhtable4").style.display = "inline";
    document.getElementById("eighthtable4").style.display = "none";
    document.getElementById("ninethtable4").style.display = "none";
    document.getElementById("tenthtable4").style.display = "none";
  } else if (select4.value == "8") {
    document.getElementById("firsttable4").style.display = "inline";
    document.getElementById("secondtable4").style.display = "inline";
    document.getElementById("thirdtable4").style.display = "inline";
    document.getElementById("fourthtable4").style.display = "inline";
    document.getElementById("fifthtable4").style.display = "inline";
    document.getElementById("sixthtable4").style.display = "inline";
    document.getElementById("seventhtable4").style.display = "inline";
    document.getElementById("eighthtable4").style.display = "inline";
    document.getElementById("ninethtable4").style.display = "none";
    document.getElementById("tenthtable4").style.display = "none";
  } else if (select4.value == "9") {
    document.getElementById("firsttable4").style.display = "inline";
    document.getElementById("secondtable4").style.display = "inline";
    document.getElementById("thirdtable4").style.display = "inline";
    document.getElementById("fourthtable4").style.display = "inline";
    document.getElementById("fifthtable4").style.display = "inline";
    document.getElementById("sixthtable4").style.display = "inline";
    document.getElementById("seventhtable4").style.display = "inline";
    document.getElementById("eighthtable4").style.display = "inline";
    document.getElementById("ninethtable4").style.display = "inline";
    document.getElementById("tenthtable4").style.display = "none";
  } else if (select4.value == "10") {
    document.getElementById("firsttable4").style.display = "inline";
    document.getElementById("secondtable4").style.display = "inline";
    document.getElementById("thirdtable4").style.display = "inline";
    document.getElementById("fourthtable4").style.display = "inline";
    document.getElementById("fifthtable4").style.display = "inline";
    document.getElementById("sixthtable4").style.display = "inline";
    document.getElementById("seventhtable4").style.display = "inline";
    document.getElementById("eighthtable4").style.display = "inline";
    document.getElementById("ninethtable4").style.display = "inline";
    document.getElementById("tenthtable4").style.display = "inline";
  } else {
    document.getElementById("firsttable4").style.display = "none"
    document.getElementById("secondtable4").style.display = "none";
    document.getElementById("thirdtable4").style.display = "none";
    document.getElementById("fourthtable4").style.display = "none";
    document.getElementById("fifthtable4").style.display = "none";
    document.getElementById("sixthtable4").style.display = "none";
    document.getElementById("seventhtable4").style.display = "none";
    document.getElementById("eighthtable4").style.display = "none";
    document.getElementById("ninethtable4").style.display = "none";
    document.getElementById("tenthtable4").style.display = "none";
  }

}

function run() {

  //AUTO FILL THE ASSESSMENT DROP DOWNS FOR SETS 2 - 10 FOR WEEK ONE
  document.getElementById("assessment2W1").value = document.getElementById("assessment1W1").value;
  document.getElementById("assessment3W1").value = document.getElementById("assessment1W1").value;
  document.getElementById("assessment4W1").value = document.getElementById("assessment1W1").value;
  document.getElementById("assessment5W1").value = document.getElementById("assessment1W1").value;
  document.getElementById("assessment6W1").value = document.getElementById("assessment1W1").value;
  document.getElementById("assessment7W1").value = document.getElementById("assessment1W1").value;
  document.getElementById("assessment8W1").value = document.getElementById("assessment1W1").value;
  document.getElementById("assessment9W1").value = document.getElementById("assessment1W1").value;
  document.getElementById("assessment10W1").value = document.getElementById("assessment1W1").value;

  //AUTO FILL THE ASSESSMENT DROP DOWNS FOR SETS 2 - 10 FOR WEEK TWO
  document.getElementById("assessment2W2").value = document.getElementById("assessment1W2").value;
  document.getElementById("assessment3W2").value = document.getElementById("assessment1W2").value;
  document.getElementById("assessment4W2").value = document.getElementById("assessment1W2").value;
  document.getElementById("assessment5W2").value = document.getElementById("assessment1W2").value;
  document.getElementById("assessment6W2").value = document.getElementById("assessment1W2").value;
  document.getElementById("assessment7W2").value = document.getElementById("assessment1W2").value;
  document.getElementById("assessment8W2").value = document.getElementById("assessment1W2").value;
  document.getElementById("assessment9W2").value = document.getElementById("assessment1W2").value;
  document.getElementById("assessment10W2").value = document.getElementById("assessment1W2").value;

  //AUTO FILL THE ASSESSMENT DROP DOWNS FOR SETS 2 - 10 FOR WEEK THREE
  document.getElementById("assessment2W3").value = document.getElementById("assessment1W3").value;
  document.getElementById("assessment3W3").value = document.getElementById("assessment1W3").value;
  document.getElementById("assessment4W3").value = document.getElementById("assessment1W3").value;
  document.getElementById("assessment5W3").value = document.getElementById("assessment1W3").value;
  document.getElementById("assessment6W3").value = document.getElementById("assessment1W3").value;
  document.getElementById("assessment7W3").value = document.getElementById("assessment1W3").value;
  document.getElementById("assessment8W3").value = document.getElementById("assessment1W3").value;
  document.getElementById("assessment9W3").value = document.getElementById("assessment1W3").value;
  document.getElementById("assessment10W3").value = document.getElementById("assessment1W3").value;

  //AUTO FILL THE ASSESSMENT DROP DOWNS FOR SETS 2 - 10 FOR WEEK FOUR
  document.getElementById("assessment2W4").value = document.getElementById("assessment1W4").value;
  document.getElementById("assessment3W4").value = document.getElementById("assessment1W4").value;
  document.getElementById("assessment4W4").value = document.getElementById("assessment1W4").value;
  document.getElementById("assessment5W4").value = document.getElementById("assessment1W4").value;
  document.getElementById("assessment6W4").value = document.getElementById("assessment1W4").value;
  document.getElementById("assessment7W4").value = document.getElementById("assessment1W4").value;
  document.getElementById("assessment8W4").value = document.getElementById("assessment1W4").value;
  document.getElementById("assessment9W4").value = document.getElementById("assessment1W4").value;
  document.getElementById("assessment10W4").value = document.getElementById("assessment1W4").value;

}

////////////////////////////////////////////////////////////////////////////////

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

////////////////////////////////////////////////////////////////////////////////

<!-- WEEK ONE SHOW HIDE FUNCTION FOR WIGHT/PERCENTAGE -->
  $("#percent1W1").change(function () {
      if ($('#percent1W1').val() == "") {
         $("#intensity1W1").removeAttr("disabled");
         $("#assessment1W1").prop("disabled", true);
      }

      if ($('#percent1W1').val() != "") {
         $("#intensity1W1").attr("disabled", "disabled");
         $("#assessment1W1").prop("disabled", false);
      }
  });

  $("#intensity1W1").change(function() {
    if ($('#intensity1W1').val() == "") {
         $("#percent1W1").removeAttr("disabled");
         $("#assessment").prop("disabled", false);
         }

      if ($('#intensity1W1').val() != "") {
         $("#percent1W1").attr("disabled", "disabled");
         $("#assessment1W1").prop("disabled", true);
      }
  });



  $("#percent2W1").change(function () {
      if ($('#percent2W1').val() == "") {
         $("#intensity2W1").removeAttr("disabled");
         $("#assessment2W1").prop("disabled", true);
      }

      if ($('#percent2W1').val() != "") {
         $("#intensity2W1").attr("disabled", "disabled");
         $("#assessment2W1").prop("disabled", false);
      }
  });

  $("#intensity2W1").change(function() {
    if ($('#intensity2W1').val() == "") {
         $("#percent2W1").removeAttr("disabled");
         $("#assessment2W1").prop("disabled", false);
         }

      if ($('#intensity2W1').val() != "") {
         $("#percent2W1").attr("disabled", "disabled");
         $("#assessment2W1").prop("disabled", true);
      }
  });



  $("#percent3W1").change(function () {
      if ($('#percent3W1').val() == "") {
         $("#intensity3W1").removeAttr("disabled");
         $("#assessment3W1").prop("disabled", true);
      }

      if ($('#percent3W1').val() != "") {
         $("#intensity3W1").attr("disabled", "disabled");
         $("#assessment3W1").prop("disabled", false);
      }
  });

  $("#intensity3W1").change(function() {
    if ($('#intensity3W1').val() == "") {
         $("#percent3W1").removeAttr("disabled");
         $("#assessment3").prop("disabled", false);
         }

      if ($('#intensity3W1').val() != "") {
         $("#percent3W1").attr("disabled", "disabled");
         $("#assessment3W1").prop("disabled", true);
      }
  });



  $("#percent4W1").change(function () {
      if ($('#percent4W1').val() == "") {
         $("#intensity4W1").removeAttr("disabled");
         $("#assessment4W1").prop("disabled", true);
      }

      if ($('#percent4W1').val() != "") {
         $("#intensity4W1").attr("disabled", "disabled");
         $("#assessment4W1").prop("disabled", false);
      }
  });

  $("#intensity4W1").change(function() {
    if ($('#intensity4W1').val() == "") {
         $("#percent4W1").removeAttr("disabled");
         $("#assessment4W1").prop("disabled", false);
         }

      if ($('#intensity4W1').val() != "") {
         $("#percent4W1").attr("disabled", "disabled");
         $("#assessment4W1").prop("disabled", true);
      }
  });



  $("#percent5W1").change(function () {
      if ($('#percent5W1').val() == "") {
         $("#intensity5W1").removeAttr("disabled");
         $("#assessment5W1").prop("disabled", true);
      }

      if ($('#percent5W1').val() != "") {
         $("#intensity5W1").attr("disabled", "disabled");
         $("#assessment5W1").prop("disabled", false);
      }
  });

  $("#intensity5W1").change(function() {
    if ($('#intensity5W1').val() == "") {
         $("#percent5W1").removeAttr("disabled");
         $("#assessment5W1").prop("disabled", false);
         }

      if ($('#intensity5W1').val() != "") {
         $("#percent5W1").attr("disabled", "disabled");
         $("#assessment5W1").prop("disabled", true);
      }
  });



  $("#percent6W1").change(function () {
      if ($('#percent6W1').val() == "") {
         $("#intensity6W1").removeAttr("disabled");
         $("#assessment6W1").prop("disabled", true);
      }

      if ($('#percent6W1').val() != "") {
         $("#intensity6W1").attr("disabled", "disabled");
         $("#assessment6W1").prop("disabled", false);
      }
  });

  $("#intensity6W1").change(function() {
    if ($('#intensity6W1').val() == "") {
         $("#percent6W1").removeAttr("disabled");
         $("#assessment6W1").prop("disabled", false);
         }

      if ($('#intensity6W1').val() != "") {
         $("#percent6W1").attr("disabled", "disabled");
         $("#assessment6W1").prop("disabled", true);
      }
  });



  $("#percent7W1").change(function () {
      if ($('#percent7W1').val() == "") {
         $("#intensity7W1").removeAttr("disabled");
         $("#assessment7W1").prop("disabled", true);
      }

      if ($('#percent7W1').val() != "") {
         $("#intensity7W1").attr("disabled", "disabled");
         $("#assessment7W1").prop("disabled", false);
      }
  });

  $("#intensity7W1").change(function() {
    if ($('#intensity7W1').val() == "") {
         $("#percent7W1").removeAttr("disabled");
         $("#assessment7W1").prop("disabled", false);
         }

      if ($('#intensity7W1').val() != "") {
         $("#percent7W1").attr("disabled", "disabled");
         $("#assessment7W1").prop("disabled", true);
      }
  });



  $("#percent8W1").change(function () {
      if ($('#percent8W1').val() == "") {
         $("#intensity8W1").removeAttr("disabled");
         $("#assessment8W1").prop("disabled", true);
      }

      if ($('#percent8W1').val() != "") {
         $("#intensity8W1").attr("disabled", "disabled");
         $("#assessment8W1").prop("disabled", false);
      }
  });

  $("#intensity8W1").change(function() {
    if ($('#intensity8W1').val() == "") {
         $("#percent8W1").removeAttr("disabled");
         $("#assessment8W1").prop("disabled", false);
         }

      if ($('#intensity8W1').val() != "") {
         $("#percent8W1").attr("disabled", "disabled");
         $("#assessment8W1").prop("disabled", true);
      }
  });



  $("#percent9W1").change(function () {
      if ($('#percent9W1').val() == "") {
         $("#intensity9W1").removeAttr("disabled");
         $("#assessment9W1").prop("disabled", true);
      }

      if ($('#percent9W1').val() != "") {
         $("#intensity9W1").attr("disabled", "disabled");
         $("#assessment9W1").prop("disabled", false);
      }
  });

  $("#intensity9W1").change(function() {
    if ($('#intensity9W1').val() == "") {
         $("#percent9W1").removeAttr("disabled");
         $("#assessment9W1").prop("disabled", false);
         }

      if ($('#intensity9W1').val() != "") {
         $("#percent9W1").attr("disabled", "disabled");
         $("#assessment9W1").prop("disabled", true);
      }
  });



  $("#percent10W1").change(function () {
      if ($('#percent10W1').val() == "") {
         $("#intensity10W1").removeAttr("disabled");
         $("#assessment10W1").prop("disabled", true);
      }

      if ($('#percent10W1').val() != "") {
         $("#intensity10W1").attr("disabled", "disabled");
         $("#assessment10W1").prop("disabled", false);
      }
  });

  $("#intensity10W1").change(function() {
    if ($('#intensity10W1').val() == "") {
         $("#percent10W1").removeAttr("disabled");
         $("#assessment10W1").prop("disabled", false);
         }

      if ($('#intensity10W1').val() != "") {
         $("#percent10W1").attr("disabled", "disabled");
         $("#assessment10W1").prop("disabled", true);
      }
  });

<!-- WEEK TWO SHOW HIDE FUNCTION FOR WEIGHT/PERCENT -->

$("#percent1W2").change(function () {
      if ($('#percent1W2').val() == "") {
         $("#intensity1W2").removeAttr("disabled");
         $("#assessment1W2").prop("disabled", true);
      }

      if ($('#percent1W2').val() != "") {
         $("#intensity1W2").attr("disabled", "disabled");
         $("#assessment1W2").prop("disabled", false);
      }
  });

  $("#intensity1W2").change(function() {
    if ($('#intensity1W2').val() == "") {
         $("#percent1W2").removeAttr("disabled");
         $("#assessment1W2").prop("disabled", false);
         }

      if ($('#intensity1W2').val() != "") {
         $("#percent1W2").attr("disabled", "disabled");
         $("#assessment1W2").prop("disabled", true);
      }
  });



  $("#percent2W2").change(function () {
      if ($('#percent2W2').val() == "") {
         $("#intensity2W2").removeAttr("disabled");
         $("#assessment2W2").prop("disabled", true);
      }

      if ($('#percent2W2').val() != "") {
         $("#intensity2W2").attr("disabled", "disabled");
         $("#assessment2W2").prop("disabled", false);
      }
  });

  $("#intensity2W2").change(function() {
    if ($('#intensity2W2').val() == "") {
         $("#percent2W2").removeAttr("disabled");
         $("#assessment2W2").prop("disabled", false);
         }

      if ($('#intensity2W2').val() != "") {
         $("#percent2W2").attr("disabled", "disabled");
         $("#assessment2W2").prop("disabled", true);
      }
  });



  $("#percent3W2").change(function () {
      if ($('#percent3W2').val() == "") {
         $("#intensity3W2").removeAttr("disabled");
         $("#assessment3W2").prop("disabled", true);
      }

      if ($('#percent3W2').val() != "") {
         $("#intensity3W2").attr("disabled", "disabled");
         $("#assessment3W2").prop("disabled", false);
      }
  });

  $("#intensity3W2").change(function() {
    if ($('#intensity3W2').val() == "") {
         $("#percent3W2").removeAttr("disabled");
         $("#assessment2W2").prop("disabled", false);
         }

      if ($('#intensity3W2').val() != "") {
         $("#percent3W2").attr("disabled", "disabled");
         $("#assessment3W2").prop("disabled", true);
      }
  });



  $("#percent4W2").change(function () {
      if ($('#percent4W2').val() == "") {
         $("#intensity4W2").removeAttr("disabled");
         $("#assessment4W2").prop("disabled", true);
      }

      if ($('#percent4W2').val() != "") {
         $("#intensity4W2").attr("disabled", "disabled");
         $("#assessment4W2").prop("disabled", false);
      }
  });

  $("#intensity4W2").change(function() {
    if ($('#intensity4W2').val() == "") {
         $("#percent4W2").removeAttr("disabled");
         $("#assessment4W2").prop("disabled", false);
         }

      if ($('#intensity4W2').val() != "") {
         $("#percent4W2").attr("disabled", "disabled");
         $("#assessment4W2").prop("disabled", true);
      }
  });



  $("#percent5W2").change(function () {
      if ($('#percent5W2').val() == "") {
         $("#intensity5W2").removeAttr("disabled");
         $("#assessment5W2").prop("disabled", true);
      }

      if ($('#percent5W2').val() != "") {
         $("#intensity5W2").attr("disabled", "disabled");
         $("#assessment5W2").prop("disabled", false);
      }
  });

  $("#intensity5W2").change(function() {
    if ($('#intensity5W2').val() == "") {
         $("#percent5W2").removeAttr("disabled");
         $("#assessment5W2").prop("disabled", false);
         }

      if ($('#intensity5W2').val() != "") {
         $("#percent5W2").attr("disabled", "disabled");
         $("#assessment5W2").prop("disabled", true);
      }
  });



  $("#percent6W2").change(function () {
      if ($('#percent6W2').val() == "") {
         $("#intensity6W2").removeAttr("disabled");
         $("#assessment6W2").prop("disabled", true);
      }

      if ($('#percent6W2').val() != "") {
         $("#intensity6W2").attr("disabled", "disabled");
         $("#assessment6W2").prop("disabled", false);
      }
  });

  $("#intensity6W2").change(function() {
    if ($('#intensity6W2').val() == "") {
         $("#percent6W2").removeAttr("disabled");
         $("#assessment6W2").prop("disabled", false);
         }

      if ($('#intensity6W2').val() != "") {
         $("#percent6W2").attr("disabled", "disabled");
         $("#assessment6W2").prop("disabled", true);
      }
  });



  $("#percent7W2").change(function () {
      if ($('#percent7W2').val() == "") {
         $("#intensity7W2").removeAttr("disabled");
         $("#assessment7W2").prop("disabled", true);
      }

      if ($('#percent7W2').val() != "") {
         $("#intensity7W2").attr("disabled", "disabled");
         $("#assessment7W2").prop("disabled", false);
      }
  });

  $("#intensity7W2").change(function() {
    if ($('#intensity7W2').val() == "") {
         $("#percent7W2").removeAttr("disabled");
         $("#assessment7W2").prop("disabled", false);
         }

      if ($('#intensity7W2').val() != "") {
         $("#percent7W2").attr("disabled", "disabled");
         $("#assessment7W2").prop("disabled", true);
      }
  });



  $("#percent8W2").change(function () {
      if ($('#percent8W2').val() == "") {
         $("#intensity8W2").removeAttr("disabled");
         $("#assessment8W2").prop("disabled", true);
      }

      if ($('#percent8W2').val() != "") {
         $("#intensity8W2").attr("disabled", "disabled");
         $("#assessment8W2").prop("disabled", false);
      }
  });

  $("#intensity8W2").change(function() {
    if ($('#intensity8W2').val() == "") {
         $("#percent8W2").removeAttr("disabled");
         $("#assessment8W2").prop("disabled", false);
         }

      if ($('#intensity8W2').val() != "") {
         $("#percent8W2").attr("disabled", "disabled");
         $("#assessment8W2").prop("disabled", true);
      }
  });



  $("#percent9W2").change(function () {
      if ($('#percent9W2').val() == "") {
         $("#intensity9W2").removeAttr("disabled");
         $("#assessment9W2").prop("disabled", true);
      }

      if ($('#percent9W2').val() != "") {
         $("#intensity9W2").attr("disabled", "disabled");
         $("#assessment9W2").prop("disabled", false);
      }
  });

  $("#intensity9W2").change(function() {
    if ($('#intensity9W2').val() == "") {
         $("#percent9W2").removeAttr("disabled");
         $("#assessment9W2").prop("disabled", false);
         }

      if ($('#intensity9W2').val() != "") {
         $("#percent9W2").attr("disabled", "disabled");
         $("#assessment9W2").prop("disabled", true);
      }
  });



  $("#percent10W2").change(function () {
      if ($('#percent10W2').val() == "") {
         $("#intensity10W2").removeAttr("disabled");
         $("#assessment10W2").prop("disabled", true);
      }

      if ($('#percent10W2').val() != "") {
         $("#intensity10W2").attr("disabled", "disabled");
         $("#assessment10W2").prop("disabled", false);
      }
  });

  $("#intensity10W2").change(function() {
    if ($('#intensity10W2').val() == "") {
         $("#percent10W2").removeAttr("disabled");
         $("#assessment10W2").prop("disabled", false);
         }

      if ($('#intensity10W2').val() != "") {
         $("#percent10W2").attr("disabled", "disabled");
         $("#assessment10W2").prop("disabled", true);
      }
  });

<!-- WEEK THREE SHOW HIDE FUNCTION FOR WEIGHT/PERCENT -->

$("#percent1W3").change(function () {
      if ($('#percent1W3').val() == "") {
         $("#intensity1W3").removeAttr("disabled");
         $("#assessment1W3").prop("disabled", true);
      }

      if ($('#percent1W3').val() != "") {
         $("#intensity1W3").attr("disabled", "disabled");
         $("#assessment1W3").prop("disabled", false);
      }
  });

  $("#intensity1W3").change(function() {
    if ($('#intensity1W3').val() == "") {
         $("#percent1W3").removeAttr("disabled");
         $("#assessment1W3").prop("disabled", false);
         }

      if ($('#intensity1W3').val() != "") {
         $("#percent1W3").attr("disabled", "disabled");
         $("#assessment1W3").prop("disabled", true);
      }
  });



  $("#percent2W3").change(function () {
      if ($('#percent2W3').val() == "") {
         $("#intensity2W3").removeAttr("disabled");
         $("#assessment2W3").prop("disabled", true);
      }

      if ($('#percent2W3').val() != "") {
         $("#intensity2W3").attr("disabled", "disabled");
         $("#assessment2W3").prop("disabled", false);
      }
  });

  $("#intensity2W3").change(function() {
    if ($('#intensity2W3').val() == "") {
         $("#percent2W3").removeAttr("disabled");
         $("#assessment2W3").prop("disabled", false);
         }

      if ($('#intensity2W3').val() != "") {
         $("#percent2W3").attr("disabled", "disabled");
         $("#assessment2W3").prop("disabled", true);
      }
  });



  $("#percent3W3").change(function () {
      if ($('#percent3W3').val() == "") {
         $("#intensity3W3").removeAttr("disabled");
         $("#assessment3W3").prop("disabled", true);
      }

      if ($('#percent3W3').val() != "") {
         $("#intensity3W3").attr("disabled", "disabled");
         $("#assessment3W3").prop("disabled", false);
      }
  });

  $("#intensity3W3").change(function() {
    if ($('#intensity3W3').val() == "") {
         $("#percent3W3").removeAttr("disabled");
         $("#assessment3W3").prop("disabled", false);
         }

      if ($('#intensity3W3').val() != "") {
         $("#percent3W3").attr("disabled", "disabled");
         $("#assessment3W3").prop("disabled", true);
      }
  });



  $("#percent4W3").change(function () {
      if ($('#percent4W3').val() == "") {
         $("#intensity4W3").removeAttr("disabled");
         $("#assessment4W3").prop("disabled", true);
      }

      if ($('#percent4W3').val() != "") {
         $("#intensity4W3").attr("disabled", "disabled");
         $("#assessment4W3").prop("disabled", false);
      }
  });

  $("#intensity4W3").change(function() {
    if ($('#intensity4W3').val() == "") {
         $("#percent4W3").removeAttr("disabled");
         $("#assessment4W3").prop("disabled", false);
         }

      if ($('#intensity4W3').val() != "") {
         $("#percent4W3").attr("disabled", "disabled");
         $("#assessment4W3").prop("disabled", true);
      }
  });



  $("#percent5W3").change(function () {
      if ($('#percent5W3').val() == "") {
         $("#intensity5W3").removeAttr("disabled");
         $("#assessment5W3").prop("disabled", true);
      }

      if ($('#percent5W3').val() != "") {
         $("#intensity5W3").attr("disabled", "disabled");
         $("#assessment5W3").prop("disabled", false);
      }
  });

  $("#intensity5W3").change(function() {
    if ($('#intensity5W3').val() == "") {
         $("#percent5W3").removeAttr("disabled");
         $("#assessment5W3").prop("disabled", false);
         }

      if ($('#intensity5W3').val() != "") {
         $("#percent5W3").attr("disabled", "disabled");
         $("#assessment5W3").prop("disabled", true);
      }
  });



  $("#percent6W3").change(function () {
      if ($('#percent6W3').val() == "") {
         $("#intensity6W3").removeAttr("disabled");
         $("#assessment6W3").prop("disabled", true);
      }

      if ($('#percent6W3').val() != "") {
         $("#intensity6W3").attr("disabled", "disabled");
         $("#assessment6W3").prop("disabled", false);
      }
  });

  $("#intensity6W3").change(function() {
    if ($('#intensity6W3').val() == "") {
         $("#percent6W3").removeAttr("disabled");
         $("#assessment6W3").prop("disabled", false);
         }

      if ($('#intensity6W3').val() != "") {
         $("#percent6W3").attr("disabled", "disabled");
         $("#assessment6W3").prop("disabled", true);
      }
  });



  $("#percent7W3").change(function () {
      if ($('#percent7W3').val() == "") {
         $("#intensity7W3").removeAttr("disabled");
         $("#assessment7W3").prop("disabled", true);
      }

      if ($('#percent7W3').val() != "") {
         $("#intensity7W3").attr("disabled", "disabled");
         $("#assessment7W3").prop("disabled", false);
      }
  });

  $("#intensity7W3").change(function() {
    if ($('#intensity7W3').val() == "") {
         $("#percent7W3").removeAttr("disabled");
         $("#assessment7W3").prop("disabled", false);
         }

      if ($('#intensity7W3').val() != "") {
         $("#percent7W3").attr("disabled", "disabled");
         $("#assessment7W3").prop("disabled", true);
      }
  });



  $("#percent8W3").change(function () {
      if ($('#percent8W3').val() == "") {
         $("#intensity8W3").removeAttr("disabled");
         $("#assessment8W3").prop("disabled", true);
      }

      if ($('#percent8W3').val() != "") {
         $("#intensity8W3").attr("disabled", "disabled");
         $("#assessment8W3").prop("disabled", false);
      }
  });

  $("#intensity8W3").change(function() {
    if ($('#intensity8W3').val() == "") {
         $("#percent8W3").removeAttr("disabled");
         $("#assessment8W3").prop("disabled", false);
         }

      if ($('#intensity8W3').val() != "") {
         $("#percent8W3").attr("disabled", "disabled");
         $("#assessment8W3").prop("disabled", true);
      }
  });



  $("#percent9W3").change(function () {
      if ($('#percent9W3').val() == "") {
         $("#intensity9W3").removeAttr("disabled");
         $("#assessment9W3").prop("disabled", true);
      }

      if ($('#percent9W3').val() != "") {
         $("#intensity9W3").attr("disabled", "disabled");
         $("#assessment9W3").prop("disabled", false);
      }
  });

  $("#intensity9W3").change(function() {
    if ($('#intensity9W3').val() == "") {
         $("#percent9W3").removeAttr("disabled");
         $("#assessment9W3").prop("disabled", false);
         }

      if ($('#intensity9W3').val() != "") {
         $("#percent9W3").attr("disabled", "disabled");
         $("#assessment9W3").prop("disabled", true);
      }
  });



  $("#percent10W3").change(function () {
      if ($('#percent10W3').val() == "") {
         $("#intensity10W3").removeAttr("disabled");
         $("#assessment10W3").prop("disabled", true);
      }

      if ($('#percent10W3').val() != "") {
         $("#intensity10W3").attr("disabled", "disabled");
         $("#assessment10W3").prop("disabled", false);
      }
  });

  $("#intensity10W3").change(function() {
    if ($('#intensity10W3').val() == "") {
         $("#percent10W3").removeAttr("disabled");
         $("#assessment10W3").prop("disabled", false);
         }

      if ($('#intensity10W3').val() != "") {
         $("#percent10W3").attr("disabled", "disabled");
         $("#assessment10W3").prop("disabled", true);
      }
  });

<!-- WEEK FOUR SHOW HID FUNCTION FOR WEIGHT/ PERCENT -->

$("#percent1W4").change(function () {
      if ($('#percent1W4').val() == "") {
         $("#intensity1W4").removeAttr("disabled");
         $("#assessment1W4").prop("disabled", true);
      }

      if ($('#percent1W4').val() != "") {
         $("#intensity1W4").attr("disabled", "disabled");
         $("#assessment1W4").prop("disabled", false);
      }
  });

  $("#intensity1W4").change(function() {
    if ($('#intensity1W4').val() == "") {
         $("#percent1W4").removeAttr("disabled");
         $("#assessment1W4").prop("disabled", false);
         }

      if ($('#intensity1W4').val() != "") {
         $("#percent1W4").attr("disabled", "disabled");
         $("#assessment1W4").prop("disabled", true);
      }
  });



  $("#percent2W4").change(function () {
      if ($('#percent2W4').val() == "") {
         $("#intensity2W4").removeAttr("disabled");
         $("#assessment2W4").prop("disabled", true);
      }

      if ($('#percent2W4').val() != "") {
         $("#intensity2W4").attr("disabled", "disabled");
         $("#assessment2W4").prop("disabled", false);
      }
  });

  $("#intensity2W4").change(function() {
    if ($('#intensity2W4').val() == "") {
         $("#percent2W4").removeAttr("disabled");
         $("#assessment2W4").prop("disabled", false);
         }

      if ($('#intensity2W4').val() != "") {
         $("#percent2W4").attr("disabled", "disabled");
         $("#assessment2W4").prop("disabled", true);
      }
  });



  $("#percent3W4").change(function () {
      if ($('#percent3W4').val() == "") {
         $("#intensity3W4").removeAttr("disabled");
         $("#assessment3W4").prop("disabled", true);
      }

      if ($('#percent3W4').val() != "") {
         $("#intensity3W4").attr("disabled", "disabled");
         $("#assessment3W4").prop("disabled", false);
      }
  });

  $("#intensity3W4").change(function() {
    if ($('#intensity3W4').val() == "") {
         $("#percent3W4").removeAttr("disabled");
         $("#assessment3W4").prop("disabled", false);
         }

      if ($('#intensity3W4').val() != "") {
         $("#percent3W4").attr("disabled", "disabled");
         $("#assessment3W4").prop("disabled", true);
      }
  });



  $("#percent4W4").change(function () {
      if ($('#percent4W4').val() == "") {
         $("#intensity4W4").removeAttr("disabled");
         $("#assessment4W4").prop("disabled", true);
      }

      if ($('#percent4W4').val() != "") {
         $("#intensity4W4").attr("disabled", "disabled");
         $("#assessment4W4").prop("disabled", false);
      }
  });

  $("#intensity4W4").change(function() {
    if ($('#intensity4W4').val() == "") {
         $("#percent4W4").removeAttr("disabled");
         $("#assessment4W4").prop("disabled", false);
         }

      if ($('#intensity4W4').val() != "") {
         $("#percent4W4").attr("disabled", "disabled");
         $("#assessment4W4").prop("disabled", true);
      }
  });



  $("#percent5W4").change(function () {
      if ($('#percent5W4').val() == "") {
         $("#intensity5W4").removeAttr("disabled");
         $("#assessment5W4").prop("disabled", true);
      }

      if ($('#percent5W4').val() != "") {
         $("#intensity5W4").attr("disabled", "disabled");
         $("#assessment5W4").prop("disabled", false);
      }
  });

  $("#intensity5W4").change(function() {
    if ($('#intensity5W4').val() == "") {
         $("#percent5W4").removeAttr("disabled");
         $("#assessment5W4").prop("disabled", false);
         }

      if ($('#intensity5W4').val() != "") {
         $("#percent5W4").attr("disabled", "disabled");
         $("#assessment5W4").prop("disabled", true);
      }
  });



  $("#percent6W4").change(function () {
      if ($('#percent6W4').val() == "") {
         $("#intensity6W4").removeAttr("disabled");
         $("#assessment6W4").prop("disabled", true);
      }

      if ($('#percent6W4').val() != "") {
         $("#intensity6W4").attr("disabled", "disabled");
         $("#assessment6W4").prop("disabled", false);
      }
  });

  $("#intensity6W4").change(function() {
    if ($('#intensity6W4').val() == "") {
         $("#percent6W4").removeAttr("disabled");
         $("#assessment6W4").prop("disabled", false);
         }

      if ($('#intensity6W4').val() != "") {
         $("#percent6W4").attr("disabled", "disabled");
         $("#assessment6W4").prop("disabled", true);
      }
  });



  $("#percent7W4").change(function () {
      if ($('#percent7W4').val() == "") {
         $("#intensity7W4").removeAttr("disabled");
         $("#assessment7W4").prop("disabled", true);
      }

      if ($('#percent7W4').val() != "") {
         $("#intensity7W4").attr("disabled", "disabled");
         $("#assessment7W4").prop("disabled", false);
      }
  });

  $("#intensity7W4").change(function() {
    if ($('#intensity7W4').val() == "") {
         $("#percent7W4").removeAttr("disabled");
         $("#assessment7W4").prop("disabled", false);
         }

      if ($('#intensity7W4').val() != "") {
         $("#percent7W4").attr("disabled", "disabled");
         $("#assessment7W4").prop("disabled", true);
      }
  });



  $("#percent8W4").change(function () {
      if ($('#percent8W4').val() == "") {
         $("#intensity8W4").removeAttr("disabled");
         $("#assessment8W4").prop("disabled", true);
      }

      if ($('#percent8W4').val() != "") {
         $("#intensity8W4").attr("disabled", "disabled");
         $("#assessment8W4").prop("disabled", false);
      }
  });

  $("#intensity8W4").change(function() {
    if ($('#intensity8W4').val() == "") {
         $("#percent8W4").removeAttr("disabled");
         $("#assessment8W4").prop("disabled", false);
         }

      if ($('#intensity8W4').val() != "") {
         $("#percent8W4").attr("disabled", "disabled");
         $("#assessment8W4").prop("disabled", true);
      }
  });



  $("#percent9W4").change(function () {
      if ($('#percent9W4').val() == "") {
         $("#intensity9W4").removeAttr("disabled");
         $("#assessment9W4").prop("disabled", true);
      }

      if ($('#percent9W4').val() != "") {
         $("#intensity9W4").attr("disabled", "disabled");
         $("#assessment9W4").prop("disabled", false);
      }
  });

  $("#intensity9W4").change(function() {
    if ($('#intensity9W4').val() == "") {
         $("#percent9W4").removeAttr("disabled");
         $("#assessment9W4").prop("disabled", false);
         }

      if ($('#intensity9W4').val() != "") {
         $("#percent9W4").attr("disabled", "disabled");
         $("#assessment9W4").prop("disabled", true);
      }
  });



  $("#percent10W4").change(function () {
      if ($('#percent10W4').val() == "") {
         $("#intensity10W4").removeAttr("disabled");
         $("#assessment10W4").prop("disabled", true);
      }

      if ($('#percent10W4').val() != "") {
         $("#intensity10W4").attr("disabled", "disabled");
         $("#assessment10W4").prop("disabled", false);
      }
  });

  $("#intensity10W4").change(function() {
    if ($('#intensity10W4').val() == "") {
         $("#percent10W4").removeAttr("disabled");
         $("#assessment10W4").prop("disabled", false);
         }

      if ($('#intensity10W4').val() != "") {
         $("#percent10W4").attr("disabled", "disabled");
         $("#assessment10W4").prop("disabled", true);
      }
  });
