function change_status(param, param1)
{
	//alert(param);
	//alert(param1);
	if (param=="Approve")
	{

		
         


		/*var status=1;
		var res= $.ajax({
	        type : 'post',
	        url : 'Ajax/change_status',
	        data : 'uid='+param1+'& status='+status,
	        async : false,
	    	success : function(msg)
	    	{ 
	   			alert(msg);
	        }
        }); */
	}
	else if(param=="Delete")
	{
	   var status=2;
       var res= $.ajax({
	        type : 'post',
	        url : 'Ajax/change_status',
	        data : 'uid='+param1+'& status='+status,
	        async : false,
	    	success : function(msg)
	    	{ 
	   			alert(msg);
	        }
        }); 
	}
	else
	{
	   var status=3;
       var res= $.ajax({
	        type : 'post',
	        url : 'Ajax/change_status',
	        data : 'uid='+param1+'& status='+status,
	        async : false,
	    	success : function(msg)
	    	{ 
	   			alert(msg);
	        }
        }); 
	}

}

 function assincode()
 {
		 	//alert('Hi');
		 	 $("#assignreff").show();
 }

/*function delete()
{
	alert("hooooo");
}*/