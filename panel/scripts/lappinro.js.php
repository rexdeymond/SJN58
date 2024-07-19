<script>
var    TabelLaporan = $('#TabelLaporan').DataTable(
		{
	        ajax			: 'jsonp.php?t=pinroreg&l='+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&tp=RO&nostok="+$("select[name=slcnostok]").val()+"&kdbrg="+$("select[name=slcproduk]").val()+"&status="+$("select[name=slcstatus]").val(),
	        processing		: true,
				"scrollCollapse": true,
				"pageResize": true,
				autoWidth: false,
				"scrollX": false,
				"responsive": true,
			columnDefs: [{
			  targets: [3], className: 'numberColumn'
			},
				{responsivePriority: 1, targets: 0 },
				{responsivePriority: 2, targets: 3 },
				{responsivePriority: 3, targets: 2 },
				{responsivePriority: 4, targets: 4 },
				{responsivePriority: 5, targets: -1 }
			],
	        columns			: [
	            { "data": "created" },
	            { "data": "kdbrg" },
	            { "data": "kodepin" },
	            { "data": "harga" },
	            { "data": "nostok" },
	            { "data": "used" },
				{ 
	            	"data": "noid",
	            	"targets": 0,
	                "render": function ( data, type, row, meta ) 
	                	{
	                		return ''+ (row["used"]!=""?row["noid"]:(row["ownedby"]!=""?('<a class="btn btn-warning" onclick="ConfirmDialog(&quot;Tarik PIN?&quot;,&quot; Ingin menarik PIN '+ row['kodepin'] +' dari '+ row['ownedby'] +'?</br>Silahkan pilih <b>Ya</b> bila Anda sudah yakin&quot;,&quot;fa-flag&quot;,&quot;waning&quot;,&quot;tarikPIN(\''+ row['kodepin'] +'\',\''+ row['ownedby'] +'\')&quot;)" title="klik untuk membatalkan pengiriman pin '+row["kodepin"]+' ke member '+row["ownedby"]+'"> '+row["ownedby"]+'</a>'):'')) +'';
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
            total = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

 
            // Update footer
            $( api.column( 3 ).footer() ).html(
                ''+ addCommas(total) +''
            );
			}
	    });
		
function previewData()
{
	url = "jsonp.php?t=pinroreg&l="+$("input[name=txtlimit]").val()+"&dateFrom="+$("input[name=txtDateFrom]").val()+"&dateTo="+$("input[name=txtDateTo]").val()+"&tp=RO&nostok="+$("select[name=slcnostok]").val()+"&kdbrg="+$("select[name=slcproduk]").val()+"&status="+$("select[name=slcstatus]").val();
	TabelLaporan.ajax.url( url ).load();	
	return false;
}
function ModalTransPIN()
{
	$.ajax({
		type 		: "POST",
		url			: "ajax/transpinAJAX.php",
		chache		:	false,
		//data		:	{txtnoid:txtnoid},
		beforeSend: function()
						{
							$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Loading</h1></div>");
						},
		success		:	function(msg)
						{
							$("#appenddedForm").html(msg);
							$('#ModalTransPIN').modal('show');
						},
		datatype	:	"html"
	});
	return false;
}

function tarikPIN(kodepin,noid){
    $.ajax({
        type        : "POST",
        url         : "actions.php?a=tarikpin",
        chache      :   false,
        data        :   {kodepin : kodepin,noid:noid},
        beforeSend: function()
                        {
							$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Memproses...</h1></div>");
                        },
        success     :   function(msg)
                        {
							$("#appenddedForm").html("");
                            if (msg.substring(0,5)=="Error"){
                                noty({text: msg, layout: 'topRight', "timeout":5000, type: 'error'});
                            }
                            else{
                                noty({text: msg, layout: 'topRight', "timeout":5000, type: 'success'});
                                previewData();
                            }
                        },
        datatype    :   "html"
    });
    return false;
}

</script>
