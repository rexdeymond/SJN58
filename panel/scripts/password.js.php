<script>
function savePassword()
{
    var txt="";
	if (document.frmPassword.txtOldPass.value.trim()=="")
	{
		txt=txt+"Password lama harus diisi. ";
	}
	if (document.frmPassword.txtNewPass.value.trim()=="")
	{
		txt=txt+"Password baru harus diisi. ";
	}
	if (!(document.frmPassword.txtNewPass.value.trim()==document.frmPassword.txtNewPass2.value.trim()))
	{
		txt=txt+"Password baru dan konfirmasi password tidak sama. ";
	}
	if (document.frmPassword.txtNewPass.value.trim()==document.frmPassword.txtOldPass.value.trim())
	{
		txt=txt+"Password lama dan baru masih sama. ";
	}
    if(txt!="")
    {
        noty({text: txt, layout: 'topRight', "timeout":5000, type: 'error'});
        return false;
    }
    else
    {
        $.ajax({
        type        : "POST",
        url         : "actions.php?a=password",
        chache      :   false,
        data        :   $("#frmPassword").serialize(),
        beforeSend: function()
                        {
                            $("#appenddedForm").html("<div class='modal-backdrop fade in'><h1>Loading</h1></div>");
                        },
        success     :   function(msg)
                        {
                        	$("#appenddedForm").html("");
                            if (msg.substring(0,5)=="Error"){
                                noty({text: msg, layout: 'topRight', "timeout":5000, type: 'error'});
                            }
                            else{
                                noty({text: msg, layout: 'topRight', "timeout":5000, type: 'success'});
                                document.frmPassword.reset();
                            }
                        },
        error       :   function (xhr, responseText, error){
                        	$("#appenddedForm").html("");
                            noty({text: error, layout: 'topRight', "timeout":5000, type: 'error'});
                        },
        datatype    :   "html"
    });
    }
    return false;
}

</script>