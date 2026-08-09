/* https://nodejs.org/api/http.html */
const http = require('http');
const fs = require('fs');
const path = require('path');
const hostName = "localhost";
const port = 3000;
const server = http.createServer((request, response)=>{
	// console.log(request.headers);
	console.log('Request for ' + request.url + ' by method ' + request.method);
	if(request.method == "GET"){
		let fileUrl;
		if(request.url == "/"){
			fileUrl = "/index.html";
		}
		else{
			fileUrl = request.url;
		}
		let filePath = path.resolve('./public'+fileUrl);
		let fileExtension = path.extname(filePath);
		if(fileExtension == ".html"){
			fs.exists(filePath, (exists)=>{
				if(!exists){
					response.statusCode = 404;
					response.setHeader('Content-Type','text/html');
					response.end("<html><body><h1>Error 404:" + fileUrl + " does not exist.</h1></body></html>");
				}
				else{
					response.statusCode = 200;
					response.setHeader('Content-Type','text/html');
					fs.createReadStream(filePath).pipe(response);
				}
			});
		}
		else{
			response.statusCode = 404;
			response.setHeader('Content-Type','text/html');
			response.end("<html><body><h1>Error 404:" + fileUrl + " does not a html file.</h1></body></html>");
		}
	}
	else{
		response.statusCode = 404;
		response.setHeader('Content-Type','text/html');
		response.end("<html><body><h1>Error 404: Not Supported.</h1></body></html>");
	}
});
server.listen(port, hostName, () => {
	console.log(`Server running at http://${hostName}:${port}`);
});