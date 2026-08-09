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
		let r = getData(id).then((successMessage)=>{
			console.log("successMessage: "+successMessage);
		}).catch((errorMessage)=>{
			console.log("errorMessage: "+errorMessage);
		});
		console.log(r);
    });

    async function getData(paramId){
    	let id = await firstJqueryAjax(paramId);
    	console.log("First: "+id);

    	id = parseInt(id);
    	id += 1;
    	id = await secondJqueryAjax(id);
    	console.log("Second: "+id);

    	id = parseInt(id);
    	id += 1;
    	id = await thirdJqueryAjax(id);
    	console.log("Third: "+id);
    	return id;
    }

    function firstJqueryAjax(id){
		return new Promise(function (resolve, reject) {
		    $.ajax({
		        url: "1.php",
		        type: "POST",
		        data: { id },
		        dataType: "JSON",
		        success: function (data){
		        	if(data.status){
		        		console.log("firstJqueryAjax: "+data.id);
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
		        		console.log("secondJqueryAjax: "+data.id);
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
		        		console.log("thirdJqueryAjax: "+data.id);
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