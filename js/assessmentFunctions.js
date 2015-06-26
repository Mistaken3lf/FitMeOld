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

      xmlhttp.open("GET","../lib/showCreateAssessment.php?q="+str,true);
      xmlhttp.send();
  }
}

///////////////////////////////////////////////////////////////////////////////

var checkflag = "false";
function check(field)
{
    if (checkflag == "false")
    {
        for (i = 0; i < field.length; i++)
        {
            field[i].checked = true;
        }
        checkflag = "true";
        return "Uncheck All";
    }
    else
    {
        for (i = 0; i < field.length; i++)
        {
            field[i].checked = false;
        }
    checkflag = "false";
    return "Check All";
    }
}

////////////////////////////////////////////////////////////////////////////////

$("#removeAssessmentForm").submit(function(e) {
  if(!$('input[type=checkbox]:checked').length) {
      alert("Please select an assessment to remove.");

      //stop the form from submitting
      return false;
  }

  return confirm("Are you sure you want to remove selected assessment(s)?");
});

$("#createAssessmentForm").submit(function(e) {
if(!$('input[type=checkbox]:checked').length) {
    alert("Please select an athlete to add assessment to.");

    //stop the form from submitting
    return false;
}
});

////////////////////////////////////////////////////////////////////////////////

    $('#currentAssessmentsTable').dataTable( {
        "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf"
        }
    } );
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

///////////////////////////////////////////////////////////////////////////////
