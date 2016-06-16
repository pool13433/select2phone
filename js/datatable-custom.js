/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$.fn.dataTable.isDataTable('.datatable');
$(document).ready(function () {
    $('.datatable').dataTable({
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
        "bDestroy": true,
        "bDom": '<"top"i>rt<"bottom"flp><"clear">'
    });
});

