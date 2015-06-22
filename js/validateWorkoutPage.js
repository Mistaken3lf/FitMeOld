$(document).ready(function() {

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

});

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
