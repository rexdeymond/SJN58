<script>
var    TabelProduk = $('#TabelProduk').DataTable(
        {
            ajax            : "jsonp.php?t=vwproduk",
            processing      : true,
 				"scrollCollapse": true,
				autoWidth: false,
				"scrollX": false,
                "pageLength": 100,
                "pageResize": true,
                "responsive": true,
			columnDefs: [
				{responsivePriority: 1, targets: 0 },
				{responsivePriority: 2, targets: 7 },
				{responsivePriority: 3, targets: 1 },
				{responsivePriority: 4, targets: 3 },
				{responsivePriority: 5, targets: 2 }
			],
	        columns			: [
                { "data": "kdbrg" },
                { "data": "nama" },
                { "data": "ket" },
                { "data": "harga" },
                { "data": "hrgbeli" },
                { "data": "stockpin" },
                { "data": "pinterpakai" },
                { 
                    "data": "kdbrg",
                    "targets": 0,
                    "render": function ( data, type, row, meta ) 
                        {
                            return '<div class="btn-group btn-group-sm"><button class="btn btn-warning" title="Edit" onclick="editProduk(&quot;'+ row['kdbrg'] +'&quot;,&quot;'+ row['nama'] +'&quot;,&quot;'+ row['harga'] +'&quot;,&quot;'+ row['hrgbeli'] +'&quot;,&quot;'+ row['register'] +'&quot;,&quot;'+ row['khusus'] +'&quot;,&quot;'+ row['publik'] +'&quot;)"><i class="fa fa-pencil"></i></button><button class="btn btn-danger" title="Hapus" onclick="ConfirmDialog(&quot;Hapus Produk?&quot;,&quot; Yakin ingin menghapus Produk '+ row['nama'] +' ?</br>Silahkan pilih <b>Ya</b> bila Anda sudah yakin&quot;,&quot;fa-trash-o&quot;,&quot;danger&quot;,&quot;delProduk(\''+ row['kdbrg'] +'\')&quot;)""><i class="fa fa-trash-o"></i></button></div>';
                        }

                },
            ],
        });

function previewData()
{
	url = "jsonp.php?t=vwproduk";
	TabelProduk.ajax.url( url ).load();	
	return false;
}

function SaveProduk(){
    var txt="";
    if (!(document.frmproduk.txtkdbrg.value.length=3))
    {
        txt=txt+"Kode Produk tidak valid. ";
    }
    if (document.frmproduk.txtnama.value.length<4)
    {
        txt=txt+"Nama terlalu pendek. ";
    }
    if (document.frmproduk.txtharga.value.length<4)
    {
        txt=txt+"Harga harus diisi. ";
    }
  
    if(txt!="")
    {
        noty({text: txt, layout: 'topRight', "timeout":5000, type: 'error'});
        return false;
    }
    else
        $.ajax({
        type        : "POST",
        url         : "actions.php?a=produksave",
        chache      :   false,
        data        :   $("#frmproduk").serialize(),
        beforeSend: function()
                        {
                            //$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Loading</h1></div>");
                        },
        success     :   function(msg)
                        {
                            if (msg.search("Error")>=0||msg.search("SQL")>=0){
                                noty({text: msg, layout: 'topRight', "timeout":5000, type: 'error'});
                            }
                            else{
                                noty({text: msg, layout: 'topRight', "timeout":5000, type: 'success'});
                                document.frmproduk.reset();
                                previewData();
                            }
                        },
        datatype    :   "html"
    });
    return false;
}

function delProduk(kdbrg){
    $.ajax({
        type        : "POST",
        url         : "actions.php?a=produkdel",
        chache      :   false,
        data        :   {kdbrg : kdbrg},
        beforeSend: function()
                        {
                            //$("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Loading</h1></div>");
                        },
        success     :   function(msg)
                        {
                            if (msg.search("Error")>=0||msg.search("SQL")>=0){
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

function replaceAll(str, find, replace) {
    return str.replace(new RegExp(find, 'g'), replace);
}

function editProduk(kdbrg,nama,harga,hargabl,daftar,khusus,publik){
    $("#txtkdbrg").val(kdbrg);

    $("#txtnama").val(nama);
    $("#txtharga").val(harga);
    $("#txthargabl").val(hargabl);
    $("#chkdaftar").prop( "checked", (daftar>0?true:false) );
    $("#chkkhusus").prop( "checked", (khusus>0?true:false) );
    $("#chkpublik").prop( "checked", (publik>0?true:false) );

}
</script>
