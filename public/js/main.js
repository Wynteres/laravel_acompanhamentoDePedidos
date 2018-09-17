
$(document).ready(function() {
    var table = $('#list-table').DataTable({
    	dom: 'lBfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ],
	     columnDefs: [
	     	{ type: 'date-eu', targets: 3 },
	     	{ type: 'range_date', targets: 3 },
       		{ type: 'date-eu', targets: 4 }
	     ]
    });

    $('#list-table-itens').DataTable({
    	dom: 'lBfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ],
	     columnDefs: [
	     	{ type: 'date-eu', targets: 5 }
	     ]
    });

    $('#list-table-entrega').DataTable({
    	dom: 'lBfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ],
	     columnDefs: [
	     	{ type: 'date-eu', targets: 5 }
	     ]
    });
    tableButtonsToIcon();
    
} );

function tableButtonsToIcon(){
	$(".buttons-print").empty()
	$(".buttons-print").append('<i class="fas fa-print"></i>')
	$(".buttons-pdf").empty()
	$(".buttons-pdf").append('<i class="fas fa-file-pdf"></i>')
	$(".buttons-excel").empty()
	$(".buttons-excel").append('<i class="fas fa-file-excel"></i>')

}