<script>

var    TabelLaporan = $('#TabelLaporan').DataTable(
		{
	        ajax			: 'jsonp.php?t=bwidraw&l='+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&search=<?=$_SESSION['sjn58']?>",
	        processing		: true,
				"scrollCollapse": true,
				"pageResize": true,
				autoWidth: false,
				"scrollX": false,
				"responsive": true,
			columnDefs: [
				{
					targets: [4], className: 'numberColumn'
				},
				{responsivePriority: 1, targets: 0 },
				{responsivePriority: 2, targets: 7 },
				{responsivePriority: 3, targets: 4 },
				{responsivePriority: 4, targets: 6 }

			],
	        columns			: [
	            { "data": "tanggal" },
	            { "data": "bank" },
	            { "data": "norek" },
	            { "data": "atasnama" },
	            { "data": "nominal" },
	            { "data": "tgltransfer" },
	            { "data": "ket" },
	            { 
	            	"data": "ket",
	            	"targets": 0,
	                "render": function ( data, type, row, meta ) 
	                	{
	                		return '<div class="btn-group btn-group-sm"><button class="btn btn-success" '+ (row['tgltransfer']!=""?' disabled ':(row['status']>0?" disabled ":"")) +' title="Edit" onclick="ModalTransWD(\''+ row['tanggal'] +'\',\''+ row['ket'] +'\',\''+ row['nominal'] +'\')"><i class="fa fa-pencil"></i></button>	<button class="btn btn-danger" ' + '  '+ (row['tgltransfer']!=""?' disabled ':(row['status']>0?" disabled ":"")) +' title="Delete" onclick="ConfirmDialog(&quot;Hapus Transaksi?&quot;,&quot;Yakin ingin menghapus Transaksi penarikan dana '+ row['ket'] +' tanggal '+ row['tanggal']+' sebesar Rp. '+ row['nominal'] +'?</br>Silahkan pilih <b>Ya</b> bila Anda sudah yakin&quot;,&quot;fa-trash-o&quot;,&quot;danger&quot;,&quot;delWidraw(\''+ row['tanggal'] +'\',\''+ row['nominal'] +'\')&quot;)"><i class="fa fa-trash-o"></i></button></div>';
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
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

 
            // Update footer
            $( api.column( 4 ).footer() ).html(
                ''+ addCommas(totalwd) +''
            );
        }
			
	    });
		
function previewData()
{
	url = "jsonp.php?t=bwidraw&l="+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&search=<?=$_SESSION['sjn58']?>";
	console.log(url);
	TabelLaporan.ajax.url( url ).load();	
	return false;
}

function showXLS()
{
    document.lapdaftar.action="xls.php?t=bwidraw&l="+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&search=<?=$_SESSION['sjn58']?>";
    document.lapdaftar.target="_BLANK";
    document.lapdaftar.method="post";
    document.lapdaftar.submit();
}
function ModalTransWD(tgl,ket,nominal){
	$.ajax({
		type 		:	"POST",
		url			:	"ajax/widrawAJAX.php",
		chache		:	false,
		data		:	{tgl:tgl, ket:ket, nominal:nominal},
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

function delWidraw(tgl,nominal){
	$.ajax({
		type 		:	"POST",
		url			:	"actions.php?a=widrawdel",
		chache		:	false,
		data		:	{tgl:tgl, nominal:nominal},
		beforeSend: function()
						{
							$("#appenddedForm").html("<div class='modal-backdrop fade in' style='z-index:10;'><h1>Loading</h1></div>");
						},
		success		:	function(msg)
						{
							$("#appenddedForm").html("");
							if (msg.substring(0,7)=="Selamat"){
								noty({text: msg, layout: 'topRight', "timeout":5000, type: 'success'});
							}
							else{
								noty({text: msg, layout: 'topRight', "timeout":5000, type: 'error'});
							}
							previewData();

						},
		datatype	:	"html"
	});
	return false;
}
</script>
