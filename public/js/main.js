
$(document).ready(function() {
    var table = $('#list-table').DataTable({
    	dom: 'lBfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ],
	     columnDefs: [
	     	{ type: 'date-eu', targets: 4 },
       		{ type: 'date-eu', targets: 5 }
	     ]
    });

    $('#list-table-itens').DataTable({
    	dom: 'lBfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ],
	     columnDefs: [
	     	{ type: 'date-eu', targets: 4 }
	     ]
    });

    $('#list-table-entrega').DataTable({
    	dom: 'lBfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ],
	     columnDefs: [
	     	{ type: 'date-eu', targets: 4 }
	     ]
    });

    $('#list-table-itens-pendentes').DataTable({
        dom: 'lBfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ],
         columnDefs: [
            { type: 'date-eu', targets: 1 },
            { type: 'date-eu', targets: 7 }
         ]
    });
    
    tableButtonsToIcon();
    
} );

function tableButtonsToIcon(){
	$(".buttons-print").empty()
    $(".buttons-print").attr("title", "Imprimir")
	$(".buttons-print").append('<i class="fas fa-print"></i>')

	$(".buttons-pdf").empty()
    $(".buttons-pdf").attr("title", "Baixar em PDF")
	$(".buttons-pdf").append('<i class="fas fa-file-pdf"></i>')
    
	$(".buttons-excel").empty()
    $(".buttons-excel").attr("title", "Baixar em Excel")
	$(".buttons-excel").append('<i class="fas fa-file-excel"></i>')

}