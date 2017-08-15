var xmlHttp;

$(document).ready(function() {

	$("#submit_form").click(function(){
		$("#loader").show();
		$("#npi-error").html("");
		$("#results").html("Loading...");

		if($("#npi").val() === "" && $("#name").val() === "")	{
			$("#results").html("Search criteria is empty. Enter an NPI or a Name.");
		} else {
			if($("#name").val() !== "") {
				jLookUpViaName($("#name").val(), $('input[name=type]:checked', '#myForm').val(), $('input[name=state]:checked', '#myForm').val());
			}

			if(($("#npi").val().length > 0 && $("#npi").val().length < 10) || ($("#npi").val().length === 10 && !$.isNumeric($("#npi").val())))	{
				$("#npi-error").html("NPI must be exactly 10 numeric characters");
				$("#results").html("");
			} else {
				if($("#npi").val() !== "") {
					jLookUpViaNPI($("#npi").val());
				}
			}
		}

		$("#loader").hide();
	});

	$("#show_states").click(function(){	
		$("#tabState").show();
	});

	$("#hide_states").click(function(){	
		$("#tabState").hide();
	});

	$("#clear_form").click(function(){
		$("#loader").hide();
		$("#npi-error").html("");
		$("#npi").val("");
		$("#name").val("");
		$("#tabState").hide();
	});

});

function jLookUpViaName(name, type, location) {
	$("#results").append("<br />Searching via name, type & location: "+name+', '+type+', '+location);
		
	xmlHttp=GetXmlHttpObject(xmlHttp);
	if (xmlHttp===null)
	{	alert ("Browser does not support this web page"); return;	}

	var url="php/getProviderFromNPIViaName.php";
		url=url+"?name="+name;
		url=url+"&type="+type;
		url=url+"&location="+location;
		url=url+"&sid="+Math.random();
	xmlHttp.open("GET",url,false);
	xmlHttp.send(null);
	
	$("#results").html(xmlHttp.responseText);
	
}

function jLookUpViaNPI(npi) {
	$("#results").append("<br />Searching via NPI: "+npi);
	
	xmlHttp=GetXmlHttpObject(xmlHttp);
	if (xmlHttp===null)
	{	alert ("Browser does not support this web page"); return;	}

	var url="php/getProviderFromNPIViaNPI.php";
		url=url+"?NPI="+npi;
		url=url+"&sid="+Math.random();
	xmlHttp.open("GET",url,false);
	xmlHttp.send(null);

	$("#results").html(xmlHttp.responseText);
}

function GetXmlHttpObject(xmlHttp)
{
	try
	{	// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	}
	catch (e)
	{	//Internet Explorer
		try
		{	xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");	}
		catch (e)
		{	try
			{	xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");	}
			catch (failed)
				{	alert("This version of Internet Explorer does not support xmlHttp. Try another browser");	}
		}
	}	
	return xmlHttp;
}
