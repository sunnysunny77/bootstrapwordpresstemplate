const https = require("https");
const http = require("http");
const fs = require("fs");

https.createServer({
    key: fs.readFileSync("./certs/server.key"),
    cert: fs.readFileSync("./certs/server.crt")
},(req, res) => {
    req.pipe(http.request({
        host: "localhost",
        port: "2998",
        path: req.url,
        method: req.method,
        headers: req.headers,
        body: req.body
    }, (resp) => {
        res.writeHead(resp.statusCode,resp.headers);
        resp.pipe(res);
    }));
}).listen(3000);