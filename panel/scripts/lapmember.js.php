
<script>
var    TabelLaporan = $('#TabelLaporan').DataTable(
		{
	        ajax			: 'jsonp.php?t=member&l='+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&nostok="+$("select[name=slcnostok]").val()+"&search="+$("input[name=txtfilter]").val(),
	        processing		: true,
				"scrollCollapse": true,
				"pageResize": true,
				autoWidth: false,
				"scrollX": false,
				"responsive": true,
			columnDefs: [
				{responsivePriority: 1, targets: 0 },
				{responsivePriority: 2, targets: 6 },
				{responsivePriority: 3, targets: 1 },
				{responsivePriority: 4, targets: 2 },
				{responsivePriority: 5, targets: 3 }
			],
	        columns			: [
	            { "data": "noid" },
	            { "data": "nama" },
	            { "data": "nostok" },
	            { "data": "tgldaftar" },
	            { "data": "propinsi" },
	            { "data": "kota" },
				{
	            	"data": "noid",
	            	"targets": 0,
	                "render": function ( data, type, row, meta )
	                	{
	                		return '<div class="btn-group btn-group-sm"><button class="btn btn-warning" ' + ' ' + (row['akseslvl']<"2"?' disabled ':'') + 'title="'+row["nama"]+'" onclick="window.location.href=&quot;.?p=member&noid='+ row["noid"] +'&quot;"><i class="fa fa-eye"></i></button></div>';
				}},
	        ]
	    });

function previewData()
{
	url = "jsonp.php?t=member&l="+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&nostok="+$("select[name=slcnostok]").val()+"&search="+$("input[name=txtfilter]").val();
	TabelLaporan.ajax.url( url ).load();
	return false;
}

</script>
