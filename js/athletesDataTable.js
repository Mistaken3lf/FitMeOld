$(document).ready(function(){
  $('#currentAthletesTable').dataTable( {
      "dom": 'T<"clear">lfrtip',
      "tableTools": {
          "sSwfPath": "//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf"
      }
  } );
});
