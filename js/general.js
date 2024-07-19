function turuSedelok(milidetik)
{
	var start=new Date().getTime();
	for(var i=0;i<1e7;i++)
	{
		if((new Date().getTime() - start) > milidetik) break;
	}
}


function xmlhttpPost3(strURL,formname,preparemsg,responsemsg,fnFinished) {
    var xmlHttpReq = false;
    var self = this;
	var HttpResponse;
	var modal;
    // Xhr per Mozilla/Safari/Ie7
    if (window.XMLHttpRequest) {
        self.xmlHttpReq = new XMLHttpRequest();
    }
    // per tutte le altre versioni di IE
    else if (window.ActiveXObject) {
        self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
    }
	//alert("eereeee");
	//modal=UIkit.modal.blockUI(preparemsg);
    self.xmlHttpReq.open('POST', strURL, true);
    self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    self.xmlHttpReq.onreadystatechange = function() {
        if (self.xmlHttpReq.readyState == 4) {
			// Quando pronta, visualizzo la risposta del form
            //updatepage(self.xmlHttpReq.responseText,responsediv);
			HttpResponse=self.xmlHttpReq.responseText;
			//alert(HttpResponse.substring(0,5));
			//modal.hide();
			//modal.hide(true);
			if (HttpResponse.substring(0,5)=="Error")
			{
				//alert("Gagal");
				//UIkit.notify(HttpResponse,{pos:'top-center',status:'warning'});
				noty({text: HttpResponse, layout: 'topRight', "timeout":5000, type: 'error'});
			}
			else
			{
				//alert("Sukses");
				//UIkit.notify(HttpResponse,{pos:'top-center',status:'success'});
				noty({text: HttpResponse, layout: 'topRight', "timeout":5000, type: 'success'});
				//alert(fnFinished);
				eval(fnFinished);
				//if(fnFinished!=""){alert("tstst");}
			}
        }
		else{
			// In attesa della risposta del form visualizzo il msg di attesa
			//updatepage(responsemsg,responsediv);
			//UIkit.notify(responsemsg,{pos:'top-center',status:'info'});

		}
    }
    self.xmlHttpReq.send(getquerystring(formname)); //formname.reset();
}

function xmlhttpPost2(strURL,formname,redirect,responsemsg) {
    var xmlHttpReq = false;
    var self = this;
	var HttpResponse;
	var modal;
    // Xhr per Mozilla/Safari/Ie7
    if (window.XMLHttpRequest) {
        self.xmlHttpReq = new XMLHttpRequest();
    }
    // per tutte le altre versioni di IE
    else if (window.ActiveXObject) {
        self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
    }
	//alert("eereeee");
	//modal=UIkit.modal.blockUI("<div class='uk-text-center'><h1>L<i class='uk-icon-spinner uk-icon-spin'></i>ading</h1></div>");
    self.xmlHttpReq.open('POST', strURL, true);
    self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    self.xmlHttpReq.onreadystatechange = function() {
        if (self.xmlHttpReq.readyState == 4) {
			// Quando pronta, visualizzo la risposta del form
            //updatepage(self.xmlHttpReq.responseText,responsediv);
			HttpResponse=self.xmlHttpReq.responseText;
			//modal.hide();
			//modal.hide(true);
			//alert(HttpResponse.substring(0,5));
			if (HttpResponse.substring(0,5)=="Error")
			{
				//alert("Gagal");
				noty({text: HttpResponse, layout: 'topRight', "timeout":5000, type: 'error'});
				//UIkit.notify(HttpResponse,{pos:'top-center',status:'warning'});
			}
			else
			{
				//alert("Sukses");
				//UIkit.notify(HttpResponse,{pos:'top-center',status:'success'});
				noty({text: HttpResponse, layout: 'topRight', "timeout":5000, type: 'success'});
				//turuSedelok(5000);
				if (redirect!=""){window.location=redirect;}
				//document.location.reload(true);
			}
        }
		else{
			// In attesa della risposta del form visualizzo il msg di attesa
			//updatepage(responsemsg,responsediv);
			//UIkit.notify(responsemsg,{pos:'top-center',status:'info'});

		}
    }
    self.xmlHttpReq.send(getquerystring(formname)); //formname.reset();
}

function xmlhttpPost(strURL,formname,responsediv,responsemsg) {
    var xmlHttpReq = false;
    var self = this;
    // Xhr per Mozilla/Safari/Ie7
    if (window.XMLHttpRequest) {
        self.xmlHttpReq = new XMLHttpRequest();
    }
    // per tutte le altre versioni di IE
    else if (window.ActiveXObject) {
        self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
    }
    self.xmlHttpReq.open('POST', strURL, true);
    self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    self.xmlHttpReq.onreadystatechange = function() {
        if (self.xmlHttpReq.readyState == 4) {
			// Quando pronta, visualizzo la risposta del form
            updatepage(self.xmlHttpReq.responseText,responsediv);
			
        }
		else{
			// In attesa della risposta del form visualizzo il msg di attesa
			updatepage(responsemsg,responsediv);

		}
    }
    self.xmlHttpReq.send(getquerystring(formname)); //formname.reset();
}

function getquerystring(formname) {
    var form = document.forms[formname];
	var qstr = "";

    function GetElemValue(name, value) {
        qstr += (qstr.length > 0 ? "&" : "")
            + escape(name).replace(/\+/g, "%2B") + "="
            + escape(value ? value : "").replace(/\+/g, "%2B");
			//+ escape(value ? value : "").replace(/\n/g, "%0D");
    }
	
	var elemArray = form.elements;
    for (var i = 0; i < elemArray.length; i++) {
        var element = elemArray[i];
        var elemType = element.type.toUpperCase();
        var elemName = element.name;
        if (elemName) {
            if (elemType == "TEXT"
                    || elemType == "NUMBER"
                    || elemType == "TEXTAREA"
                    || elemType == "PASSWORD"
					|| elemType == "BUTTON"
					|| elemType == "RESET"
					|| elemType == "SUBMIT"
					|| elemType == "FILE"
					|| elemType == "IMAGE"
                    || elemType == "HIDDEN")
                GetElemValue(elemName, element.value);
            else if (elemType == "CHECKBOX" && element.checked)
                GetElemValue(elemName, 
                    element.value ? element.value : "On");
            else if (elemType == "RADIO" && element.checked)
                GetElemValue(elemName, element.value);
            else if (elemType.indexOf("SELECT") != -1)
                for (var j = 0; j < element.options.length; j++) {
                    var option = element.options[j];
                    if (option.selected)
                        GetElemValue(elemName,
                            option.value ? option.value : option.text);
                }
        }
    }
    return qstr;
}
function updatepage(str,responsediv){
    document.getElementById(responsediv).innerHTML = str;
}