var express = require('express');
var bodyParser = require('body-parser');
var app = express();
var http = require('http').Server(app);
var io = require('socket.io')(http);

// https://redislabs.com/ebook/appendix-a/a-3-installing-on-windows/a-3-2-installing-redis-on-window/
// Start Redis server by hand
// Run redis-cli for testing
var fs = require('fs');
var creds = '';

var redis = require('redis');
// var client = '';
var port = process.env.PORT || 8080;

// Express Middleware for serving static
// files and parsing the request body
app.use(express.static('public'));
app.use(bodyParser.urlencoded({
    extended: true
}));

// Start the Server
http.listen(port, function() {
    console.log('Server Started. Listening on *:' + port);
});

// Store people in chatroom
var chatters = [];

// Store messages in chatroom
var chat_messages = [];

let client = redis.createClient({
    port      : 6379,
    host      : '127.0.0.1',
    password  : '',
    /* tls       : {
      key  : stringValueOfKeyFile,  
      cert : stringValueOfCertFile,
      ca   : [ stringValueOfCaCertFile ]
    } */
  });

// client = redis.createClient('redis://' + creds.user + ':' + creds.password + '@' + creds.host + ':' + creds.port);

// // Redis Client Ready
client.once('ready', function() {

    console.log("nice we're in")
    // Flush Redis DB
    // client.flushdb();

    // Initialize Chatters
    setInterval( function (){
    
        client.get('updates', function(err, reply) {
            if (reply) {
                // chatters = JSON.parse(reply);
                console.log(reply)
            }
        });

    }, 2000);

    // Initialize Messages
    client.get('chat_app_messages', function(err, reply) {
        if (reply) {
            chat_messages = JSON.parse(reply);
        }
    });
});