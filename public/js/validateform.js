
function isEmailAddr(email)
{
  var result = false;
  var theStr = new String(email);
  var index = theStr.indexOf("@");
  if (index > 0)
  {
    var pindex = theStr.indexOf(".",index);
    if ((pindex > index+1) && (theStr.length > pindex+1))
	result = true;
  }
  return result;
}

function validRequired(formField,fieldLabel)
{	
	var result = true;
	if (formField.value == "")
	{
		alert('Please enter a value for "' + fieldLabel +'".');
		formField.focus();
		result = false;
	}
	return result;
}

function validLength(formField,fieldLabel, requiredLength)
{
	var result = true;
	
	if (formField.value.length < requiredLength)
	{
		alert('Please enter a value of atleast '+requiredLength +' characters for "' + fieldLabel +'".');
		formField.focus();
		result = false;
	}
	return result;
}

function allDigits(str)
{
	return inValidCharSet(str,"0123456789");
}

function inValidCharSet(str,charset)
{
	var result = true;

	// Note: doesn't use regular expressions to avoid early Mac browser bugs	
	for (var i=0;i<str.length;i++)
		if (charset.indexOf(str.substr(i,1))==-1)
		{
			result = false;
			break;
		}	
	return result;
}

function validEmail(formField,fieldLabel,required)
{
	var result = true;
	
	if (required && !validRequired(formField,fieldLabel))
		result = false;

	if (result && ((formField.value.length < 3) || !isEmailAddr(formField.value)) )
	{
		alert("Please enter an e-mail address in the form: yourname@yourdomain.com");
		formField.focus();
		result = false;
	}   
  return result;

}

function validNum(formField,fieldLabel,required)
{
	var result = true;

	if (required && !validRequired(formField,fieldLabel))
		result = false;
  
 	if (result)
 	{
 		if (!allDigits(formField.value))
 		{
 			alert('Please enter a numeric value for "' + fieldLabel +'".');
			formField.focus();		
			result = false;
		}
	} 	
	return result;
}


function validInt(formField,fieldLabel,required)
{
	var result = true;

	if (required && !validRequired(formField,fieldLabel))
		result = false;
  
 	if (result)
 	{
 		var num = parseInt(formField.value);
 		if (isNaN(num))
 		{
 			alert('Please enter a number for the "' + fieldLabel +'" field.');
			formField.focus();		
			result = false;
		}
	} 	
	return result;
}

function validDate(formField,fieldLabel,required)
{
	var result = true;

	if (required && !validRequired(formField,fieldLabel))
		result = false;
  
 	if (result)
 	{
 		var elems = formField.value.split("/");
  		result = (elems.length == 3); // should be three components
 		
 		if (result)
 		{
 			var month = parseInt(parseFloat(elems[1]));
  			var day = parseInt(parseFloat(elems[0]));
 			var year = parseInt(parseFloat(elems[2]));
			
			result = allDigits(month) && (month > 0) && (month < 13);
					 allDigits(day) && (day > 0) && (day < 32);
					 allDigits(year) && ((year.length == 2)||(year.length == 4));					 
 		}
 		
  		if (!result)
 		{
 			alert('Please enter a date in the format MM/DD/YYYY for "' + fieldLabel +'".');
 			formField.focus();
			result = false;	
		}
	} 	
	return result;
}

function validMySqlDate(formField,fieldLabel,required)
{
	var result = true;

	if (required && !validRequired(formField,fieldLabel))
		result = false;
  
 	if (result)
 	{
 		var elems = formField.value.split("-");
  		result = (elems.length == 3); // should be three components
 		
 		if (result)
 		{
 			var month = parseInt(parseFloat(elems[1]));
  			var day = parseInt(parseFloat(elems[2]));
 			var year = parseInt(parseFloat(elems[0]));
			
			result = allDigits(month) && (month > 0) && (month < 13);
					 allDigits(day) && (day > 0) && (day < 32);
					 allDigits(year) && ((year.length == 2)||(year.length == 4));					 
 		}
 		
  		if (!result)
 		{
 			alert('Please enter a date in the format YYYY-MM-DD for "' + fieldLabel +'".');
 			formField.focus();
			result = false;	
		}
	} 	
	return result;
}

function confirmMatch(formField1, formField2, fieldLabel1, fieldLabel2)
{
	var result = true;
	
	if (formField1.value != formField2.value)
	{
		alert('Your entries for "' + fieldLabel1 +'" and "' + fieldLabel2 +'" must match.');
		formField1.value = "";
		formField2.value = "";
		formField1.focus();
		result = false;
	}	
	return result;
}