<script>

var    TabelLaporan = $('#TabelLaporan').DataTable(
		{
	        ajax			: 'jsonp.php?t=vwwidraw&l='+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&status="+$("select[name=slcstatus]").val()+"&search="+$("input[name=txtfilter]").val(),
	        processing		: true,
				"scrollCollapse": true,
				"pageResize": true,
				autoWidth: false,
				"scrollX": false,
				"responsive": true,
			columnDefs: [{
			  targets: [6], className: 'numberColumn'
			},
				{responsivePriority: 1, targets: 0 },
				{responsivePriority: 2, targets: 6 },
				{responsivePriority: 3, targets: 1 },
				{responsivePriority: 4, targets: 2 },
				{responsivePriority: 5, targets: -1 }
			],
	        columns			: [
	            { "data": "tanggal" },
	            { "data": "noid" },
	            { "data": "nama" },
	            { "data": "bank" },
	            { "data": "norek" },
	            { "data": "atasnama" },
	            { "data": "nominal" },
	            { "data": "tgltransfer" },
	            { "data": "ketstatus" },
	            { 
	            	"data": "ket",
	            	"targets": 0,
	                "render": function ( data, type, row, meta ) 
	                	{
	                		return '<button class="btn btn-success" '+ (row['tgltransfer']!=""?' disabled ':'') +' title="Edit" onclick="ModalUpdateWD(\''+ row['tanggal'] +'\',\''+ row['noid'] +'\',\''+ row['nominal'] +'\')"><i class="fa fa-pencil"></i></button>';
	                	}

	            },
	        ],
			
			"footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,. \t]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
						//console.log(intVal);
 
            // Total over all pages
            totalwd = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

 
            // Update footer
            $( api.column( 6 ).footer() ).html(
                ''+ addCommas(totalwd) +''
            );
        }
			
	    });
		
function previewData()
{
	url = "jsonp.php?t=vwwidraw&l="+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&status="+$("select[name=slcstatus]").val()+"&search="+$("input[name=txtfilter]").val();
	console.log(url);
	TabelLaporan.ajax.url( url ).load();	
	return false;
}

function showXLS()
{
    document.lapdaftar.action="xls.php?t=vwwidraw&l="+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&status="+$("select[name=slcstatus]").val()+"&search="+$("input[name=txtfilter]").val();
    document.lapdaftar.target="_BLANK";
    document.lapdaftar.method="post";
    document.lapdaftar.submit();
}
function ModalUpdateWD(tgl,noid,nominal){
	$.ajax({
		type 		:	"POST",
		url			:	"ajax/widrawUpdateAJAX.php",
		chache		:	false,
		data		:	{tgl:tgl, noid:noid, nominal:nominal},
		beforeSend: function()
						{
							$("#appenddedForm").html("<div class='modal-backdrop fade in' style='z-index:10;'><h1>Loading</h1></div>");
						},
		success		:	function(msg)
						{
							$("#appenddedForm").html(msg);
							$('#ModalTransaksi').modal('show');
						},
		datatype	:	"html"
	});
	return false;
}


</script>
