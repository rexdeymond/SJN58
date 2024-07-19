<script>
var    TabelLaporan = $('#TabelLaporan').DataTable(
		{
	        ajax			: 'jsonp.php?t=ro&l='+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&nostok="+$("select[name=slcnostok]").val()+"&kdbrg="+$("select[name=slcproduk]").val()+"&search="+$("input[name=txtfilter]").val(),
	        processing		: true,
				"scrollCollapse": true,
				"pageResize": true,
				autoWidth: false,
				"scrollX": false,
				"responsive": true,
	        columns			: [
	            { "data": "used" },
	            { "data": "noid" },
	            { "data": "nama" },
	            { "data": "kota" },
	            { "data": "kodepin" },
	            { "data": "produk" },
	            { "data": "nostok" },
	        ]
	    });
		
function previewData()
{
	url = "jsonp.php?t=ro&l="+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&nostok="+$("select[name=slcnostok]").val()+"&kdbrg="+$("select[name=slcproduk]").val()+"&search="+$("input[name=txtfilter]").val();
	TabelLaporan.ajax.url( url ).load();	
	return false;
}

</script>
