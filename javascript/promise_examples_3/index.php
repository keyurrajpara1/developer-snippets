<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="jquery-3.6.0.min.js"></script>
</head>
<body>
<script type="text/javascript">
	/* https://stackoverflow.com/questions/35135110/jquery-ajax-with-es6-promises */
	$(document).ready(function ()
    {
    	/*let id = 1;
    	firstJqueryAjax(id).then((id)=>{
    		id++;
	    	secondJqueryAjax(id).then((id)=>{
				id++;
				thirdJqueryAjax(id).then((id)=>{
					console.log("Final id: " + id);
				});
			});
		}).catch((msg)=>{
			console.log(msg);
		});*/

    	let id = 1;
    	firstJqueryAjax(id).then((id)=>{
    		id++;
	    	return secondJqueryAjax(id);
		}).then((id)=>{
			id++;
			return thirdJqueryAjax(id);
		}).then((id)=>{
			console.log("Final id: " + id);
		}).catch((msg)=>{
			console.log(msg);
		});
    });
    function firstJqueryAjax(id){
		return new Promise(function (resolve, reject) {
		    $.ajax({
		        url: "1.php",
		        type: "POST",
		        data: { id },
		        dataType: "JSON",
		        success: function (data){
		        	if(data.status){
		        		console.log(data.id);
		        		resolve(data.id);
		        	}
		        },
		        error: function (jqXHR, textStatus, errorThrown){
		        	reject("Error from firstJqueryAjax");
		        }
		    });//.done(resolve(data.id)).fail(reject("hi"));
		});
    }
    function secondJqueryAjax(id){
    	return new Promise(function (resolve, reject) {
		    $.ajax({
		        url: "2.php",
		        type: "POST",
		        data: { id },
		        dataType: "JSON",
		        success: function (data){
		        	if(data.status){
		        		console.log(data.id);
		        		resolve(data.id);
		        	}
		        },
		        error: function (jqXHR, textStatus, errorThrown){
		        	reject("Error from secondJqueryAjax");
		        }
		    });
    	});
    }
    function thirdJqueryAjax(id){
    	return new Promise(function (resolve, reject) {
		    $.ajax({
		        url: "3.php",
		        type: "POST",
		        data: { id },
		        dataType: "JSON",
		        success: function (data){
		        	if(data.status){
		        		console.log(data.id);
		        		resolve(data.id);
		        	}
		        },
		        error: function (jqXHR, textStatus, errorThrown){
		        	reject("Error from thirdJqueryAjax");
		        }
		    });
    	});
    }
</script>
</body>
</html>