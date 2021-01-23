var express = require('express');  
var app = express();  
var mysql = require('mysql');
var server = require('http').createServer(app);  
var io = require('socket.io')(server);

var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "db_test"
  });
  
app.use(express.static(__dirname + '/node_modules'));  
buff = ''
app.get('/getme', function(req, res,next) {
    // res.send('some good shift');
    // res.send('nice')
    con.connect(function(err) {
        if (err) throw err;
        con.query("SELECT * FROM updates", function (err, result, fields) {
          if (err) throw err;
          buff = result;
        });

      });
      res.send(buff);

});

server.listen(4200, () => {
    console.log('Listening on port *: 4200');
});




