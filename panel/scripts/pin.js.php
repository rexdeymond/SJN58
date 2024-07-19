<script>
var    TabelLaporan = $('#TabelLaporan').DataTable(
		{
	        ajax			: 'jsonp.php?t=pin&l=1&dateFrom=d1&dateTo=d2&nostok=s&kdbrg=kd&status=st',
	        processing		: true,
				"scrollCollapse": true,
				"pageResize": true,
				autoWidth: false,
				"scrollX": false,
				"responsive": true,
	        columns			: [
	            { "data": "created" },
	            { "data": "kdbrg" },
	            { "data": "kodepin" },
	            { "data": "harga" },
	            { "data": "nostok" },
	            { "data": "noid" },
	        ],
			columnDefs: [{
			  targets: [3], className: 'numberColumn'
			}],
			
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
				totharga = api
					.column( 3 )
					.data()
					.reduce( function (a, b) {
						return intVal(a) + intVal(b);
					}, 0 );
	 
				// Update footer
				$( api.column( 3 ).footer() ).html(
					''+ addCommas(totharga) +''
				);
			}
			
	    });
		
function previewData(d1,d2,kdbrg,nostok,l,status)
{
	url = "jsonp.php?t=pin&l="+l+"&dateFrom="+d1+"&dateTo="+d2+"&nostok="+nostok+"&kdbrg="+kdbrg+"&status="+status;
	TabelLaporan.ajax.url( url ).load();	
	return false;
}
function GeneratePin()
{
	var txt="";
	//var sss;
	if (document.frmpingen.slcproduk.value=="")
	{
		txt=txt+"Produk harus dipilih. ";
	}
	if (!(document.frmpingen.txtjumlah.value>0))
	{
		txt=txt+"Jumlah PIN harus diisi. ";
	}
	if (document.frmpingen.slcnostok.value=="")
	{
		txt=txt+"Cabang harus diisi. ";
	}
	if(txt!="")
	{
		noty({text: txt, layout: 'topRight', "timeout":5000, type: 'error'});
		return false;
	}
	else
	{
		$.ajax({
		type 		: "POST",
		url			: "actions.php?a=pingenerate",
		chache		:	false,
		data		:	$("#frmpingen").serialize(),
		beforeSend: function()
						{
							$("#appenddedForm").html("<div class='modal-backdrop fade in' style='z-index:10;'><h1>Loading</h1></div>");
						},
		success		:	function(msg)
						{
							$("#appenddedForm").html("");
							if (msg.substring(0,5)=="Error"){
								noty({text: msg, layout: 'topRight', "timeout":5000, type: 'error'});
							}
							else{
								noty({text: msg, layout: 'topRight', "timeout":5000, type: 'success'});
								previewData('-','-',document.frmpingen.slcproduk.value,document.frmpingen.slcnostok.value,0,0);
							}
						},
		datatype	:	"html"
	});
	}
	return false;
}

function DelPin()
{
	var txt="";
	//var sss;
	if (document.pinview.txttgl.value=="")
	{
		txt=txt+"tanggal harus diisi. ";
	}
	if (document.pinview.slcproduk.value=="")
	{
		txt=txt+"Produk harus dipilih. ";
	}
	if (!(document.pinview.txtjumlah.value>0))
	{
		txt=txt+"Jumlah PIN harus diisi. ";
	}
	if (document.pinview.slcnostok.value=="")
	{
		txt=txt+"Cabang harus dipilih. ";
	}
	if(txt!="")
	{
		noty({text: txt, layout: 'topRight', "timeout":5000, type: 'error'});
		return false;
	}
	else
	{
		$.ajax({
		type 		: "POST",
		url			: "actions.php?a=pindelete",
		chache		:	false,
		data		:	$("#pinview").serialize(),
		beforeSend: function()
						{
							$("#appenddedForm").html("<div class='modal-backdrop fade in' style='z-index:10;'><h1>Loading</h1></div>");
						},
		success		:	function(msg)
						{
							$("#appenddedForm").html("");
							if (msg.substring(0,5)=="Error"){
								noty({text: msg, layout: 'topRight', "timeout":5000, type: 'error'});
							}
							else{
								noty({text: msg, layout: 'topRight', "timeout":5000, type: 'success'});
								previewData(document.pinview.txttgl.value,document.pinview.txttgl.value,document.pinview.slcproduk.value,document.pinview.slcnostok.value,99999,0);
							}
						},
		datatype	:	"html"
	});
	}
	return false;
}

function showXLS()
{
    document.pinview.action="xls.php?t=pin&l="+$("input[name=txtjumlah]").val()+"&dateFrom="+$("input[name=txttgl]").val()+"&dateTo="+$("input[name=txttgl]").val()+"&nostok="+$("select[name=slcnostok]").val()+"&kdbrg="+$("select[name=slcproduk]").val()+"&status=0";
    document.pinview.target="_BLANK";
    document.pinview.method="post";
    document.pinview.submit();
}

</script>