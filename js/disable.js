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
