<script>

var    TabelLaporan = $('#TabelLaporan').DataTable(
		{
	        ajax			: 'jsonp.php?t=bonus&l='+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&nostok="+$("select[name=slcnostok]").val()+"&tipe="+$("select[name=slctipe]").val()+"&search="+$("input[name=txtfilter]").val(),
	        processing		: true,
				"scrollCollapse": true,
				"pageResize": true,
				autoWidth: false,
				"scrollX": false,
				"responsive": true,
			columnDefs: [{
			  targets: [4], className: 'numberColumn'
			},
				{responsivePriority: 1, targets: 0 },
				{responsivePriority: 2, targets: 4 },
				{responsivePriority: 3, targets: 1 },
				{responsivePriority: 4, targets: 2 },
				{responsivePriority: 5, targets: -1 }
			],
	        columns			: [
	            { "data": "tanggal" },
	            { "data": "noid" },
	            { "data": "nama" },
	            { "data": "ref" },
	            { "data": "bonus" },
	            { "data": "ketstatus" },
	            { "data": "ket" },
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
            total = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

 
            // Update footer
            $( api.column( 4 ).footer() ).html(
                ''+ addCommas(total) +''
            );
        }
	    });
		
function previewData()
{
	url = "jsonp.php?t=bonus&l="+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&nostok="+$("select[name=slcnostok]").val()+"&tipe="+$("select[name=slctipe]").val()+"&search="+$("input[name=txtfilter]").val();
	TabelLaporan.ajax.url( url ).load();	
	return false;
}

</script>
