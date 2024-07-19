<script>
var    TabelCabang = $('#TabelCabang').DataTable(
        {
            ajax            : "jsonp.php?t=stokist",
            processing      : true,
				"pageLength": 100,
				"scrollCollapse": true,
				"pageResize": true,
				autoWidth: false,
				"scrollX": false,
				"responsive": true,
			columnDefs: [
				{responsivePriority: 1, targets: 0 },
				{responsivePriority: 2, targets: 8 },
				{responsivePriority: 3, targets: 1 },
				{responsivePriority: 4, targets: 2 },
				{responsivePriority: 5, targets: 3 }
			],
	        columns			: [
                { "data": "nostok" },
                { "data": "nama" },
                { "data": "noid" },
                { "data": "kota" },
                { "data": "propinsi" },
                { "data": "jmlmember" },
                { "data": "stockpin" },
                { "data": "pinterpakai" },
                { 
                    "data": "noid",
                    "targets": 0,
                    "render": function ( data, type, row, meta ) 
                        {
                            return '<div class="btn-group btn-group-sm"><button class="btn btn-warning" title="Edit" onclick="editCabang(&quot;'+ row['nostok'] +'&quot;,&quot;'+ row['noid'] +'&quot;,&quot;'+ row['nama'] +'&quot;,&quot;'+ row['telp'] +'&quot;,&quot;'+ row['email'] +'&quot;,&quot;'+ row['alamat'] +'&quot;,&quot;'+ row['kota'] +'&quot;,&quot;'+ row['propinsi'] +'&quot;,&quot;'+ row['publik'] +'&quot;)"><i class="fa fa-pencil"></i></button><button class="btn btn-danger" title="Hapus" onclick="ConfirmDialog(&quot;Hapus Cabang?&quot;,&quot; Yakin ingin menghapus cabang '+ row['nama'] +' ?</br>Silahkan pilih <b>Ya</b> bila Anda sudah yakin&quot;,&quot;fa-trash-o&quot;,&quot;danger&quot;,&quot;delCabang(\''+ row['nostok'] +'\')&quot;)""><i class="fa fa-trash-o"></i></button></div>';
                        }

                },
            ],
        });

function previewData()
{
	url = "jsonp.php?t=stokist";
	TabelCabang.ajax.url( url ).load();	
	return false;
}

function SaveCabang(){
    var txt="";
    if (document.frmcabang.txtnostok.value.length<7)
    {
        txt=txt+"Kode cabang tidak valid. ";
    }
    if (document.frmcabang.txtnoid.value.length<10)
    {
        txt=txt+"NOID harus diisi. ";
    }
    if (document.frmcabang.txtnama.value.length<4)
    {
        txt=txt+"Nama terlalu pendek. ";
    }
  
    if(txt!="")
    {
        noty({text: txt, layout: 'topRight', "timeout":5000, type: 'error'});
        return false;
    }
    else
        $.ajax({
        type        : "POST",
        url         : "actions.php?a=stokistsave",
        chache      :   false,
        data        :   $("#frmcabang").serialize(),
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
                                document.frmcabang.reset();
                                previewData();
                            }
                        },
        datatype    :   "html"
    });
    return false;
}

function delCabang(nostok){
    $.ajax({
        type        : "POST",
        url         : "actions.php?a=stokistdel",
        chache      :   false,
        data        :   {nostok : nostok},
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

function showKota(kota){
	slcpropinsi = $("select[name=slcpropinsi]").val();
	$.ajax({
	type 		: "POST",
	url			: "ajax/kota2AJAX.php",
	chache		:	false,
	data		:	{ slcpropinsi : slcpropinsi},
	beforeSend: function()
					{
						$("#kota").html("<h3>Loading</h3>");
					},
	success		:	function(msg)
					{
						$("#kota").html(msg);
						$('#slckota').val(kota);
						$('#slckota').selectpicker('refresh');
						
					},
	datatype	:	"html"
});
};

$('#txtnoid').typeahead({
	ajax: {
		url: 'jsone.php?t=memberlist&w=member&search=',
	},
		hint:true,
		triggerLength: 1,
});

function editCabang(nostok,noid,nama,telp,email,alamat,kota,propinsi,publik){
    $("#slcpropinsi").val(propinsi).change();
    $("#hdntransid").val(nostok);
    $("#txtnostok").val(nostok);
    $("#txtnoid").val(noid);

    $("#txtnama").val(nama);
    $("#txttelp").val(telp);
    $("#txtmail").val(email);
    $("#txtalamat").val(alamat);
    $("#chkpublik").prop( "checked", (publik>0?true:false) );
    showKota(kota);

}
</script>
