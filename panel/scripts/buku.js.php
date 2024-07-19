<script>

var    TabelLaporan = $('#TabelLaporan').DataTable(
		{
	        ajax			: 'jsonp.php?t=vwtransaksi&l='+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&search="+$("input[name=txtfilter]").val(),
	        processing		: true,
				"scrollCollapse": true,
				"pageResize": true,
				autoWidth: false,
				"scrollX": false,
				"responsive": true,
			columnDefs: [
				{targets: [2,3,4], className: 'numberColumn'},
				{responsivePriority: 1, targets: 0 },
				{responsivePriority: 2, targets: 4 },
				{responsivePriority: 3, targets: 3 },
				{responsivePriority: 4, targets: 2 }
			],
	        columns			: [
	            { "data": "tanggal" },
	            { "data": "ket" },
	            { "data": "debet" },
	            { "data": "kredit" },
	            { 
	            	"data": "ket",
	            	"targets": 0,
	                "render": function ( data, type, row, meta ) 
	                	{
	                		return '<div class="btn-group btn-group-sm"><button class="btn btn-success" '+ (row['group']!="Transaksi Lain"?' disabled ':'') +' title="Edit" onclick="ModalTransBuku(\''+ row['tanggal'] +'\',\''+ row['ket'] +'\',\''+ row['nominal'] +'\')"><i class="fa fa-pencil"></i></button>	<button class="btn btn-danger" ' + '  '+ (row['group']!="Transaksi Lain"?' disabled ':'') +' title="Delete" onclick="ConfirmDialog(&quot;Hapus Transaksi?&quot;,&quot;Yakin ingin menghapus Transaksi '+ row['ket'] +' tanggal '+ row['tanggal']+' sebesar '+ row['nominal'] +'?</br>Silahkan pilih <b>Ya</b> bila Anda sudah yakin&quot;,&quot;fa-trash-o&quot;,&quot;danger&quot;,&quot;delTransaksi(\''+ row['tanggal'] +'\',\''+ row['ket'] +'\',\''+ row['nominal'] +'\')&quot;)"><i class="fa fa-trash-o"></i></button></div>';
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
            debet = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            kredit = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 2 ).footer() ).html(
                ''+ addCommas(debet) +''
            );
            $( api.column( 3 ).footer() ).html(
                ''+ addCommas(kredit) +''
            );
            $( api.column( 4 ).footer() ).html(
                ''+ addCommas(debet-kredit) +''
            );
        }
			
	    });
		
function previewData()
{
	url = "jsonp.php?t=vwtransaksi&l="+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&search="+$("input[name=txtfilter]").val();
	console.log(url);
	TabelLaporan.ajax.url( url ).load();	
	return false;
}

function showXLS()
{
    document.lapdaftar.action="xls.php?t=vwtransaksi&l="+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&search="+$("input[name=txtfilter]").val();
    document.lapdaftar.target="_BLANK";
    document.lapdaftar.method="post";
    document.lapdaftar.submit();
}
function ModalTransBuku(tgl,ket,nominal){
	$.ajax({
		type 		:	"POST",
		url			:	"ajax/transaksiAJAX.php",
		chache		:	false,
		data		:	{tgl:tgl, ket:ket, nominal:nominal},
		beforeSend: function()
						{
							$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Loading</h1></div>");
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

function delTransaksi(tgl,ket,nominal){
	$.ajax({
		type 		:	"POST",
		url			:	"actions.php?a=transaksidel",
		chache		:	false,
		data		:	{tgl:tgl, ket:ket, nominal:nominal},
		beforeSend: function()
						{
							//$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Loading</h1></div>");
						},
		success		:	function(msg)
						{
								noty({text: msg, layout: 'topRight', "timeout":5000, type: 'success'});
								previewData();
/*							if (msg.substring(0,7)=="Selamat"){
							}
							else{
								noty({text: msg, layout: 'topRight', "timeout":5000, type: 'error'});
							}*/
						},
		datatype	:	"html"
	});
	return false;
}
</script>
