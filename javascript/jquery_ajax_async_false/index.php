<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="jquery-3.6.0.min.js"></script>
</head>
<body>
<script type="text/javascript">
	$(document).ready(function ()
    {
    	let id = 1;
    	if( firstJqueryAjax(id) ){
    		//
    	}
    	console.log("Next");
    });

    function firstJqueryAjax(id){
    	let success = undefined;
	    $.ajax({
	        url: "1.php",
	        type: "POST",
	        data: { id },
	        dataType: "JSON",
	        async: false,
	        success: function (data){
	        	if(data.status){
	        		console.log("firstJqueryAjax: "+data.id);
	        		success = data.id;
	        	}
	        },
	        error: function (jqXHR, textStatus, errorThrown){
	        	console.log("Error from firstJqueryAjax");
	        }
	    });
	    console.log("a: " + success);
	    return success;
    }
    function secondJqueryAjax(id){
    }
    function thirdJqueryAjax(id){
    }
</script>
</body>
</html>