$(document).ready(function(){
  $('#currentExercisesTable').dataTable( {
      "dom": 'T<"clear">lfrtip',
      "tableTools": {
          "sSwfPath": "../swf/copy_csv_xls_pdf.swf"
      }
  } );
});
