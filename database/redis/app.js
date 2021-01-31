// var express = require('express');
// var bodyParser = require('body-parser');
// var app = express();
// var http = require('http').Server(app);
// var io = require('socket.io')(http);

// // https://redislabs.com/ebook/appendix-a/a-3-installing-on-windows/a-3-2-installing-redis-on-window/
// // Start Redis server by hand
// // Run redis-cli for testing
// var fs = require('fs');
// var creds = '';

// var redis = require('redis');
// // var client = '';
// var port = process.env.PORT || 8080;

// // Express Middleware for serving static
// // files and parsing the request body
// app.use(express.static('public'));
// app.use(bodyParser.urlencoded({
//     extended: true
// }));

// http.listen(port, function() {
//     console.log('Server Started. Listening on *:' + port);
// });

// // Store people in chatroom
// var chatters = [];

// // Store messages in chatroom
// var chat_messages = [];

// let client = redis.createClient({
//     port      : 6379,
//     host      : '127.0.0.1',
//     password  : '',
//     database: 0,
//   });

// client.once('ready', function() {

//     console.log("nice we're in")
//     // client.flushdb();

//      client.psubscribe('laravel_database_updates2', function(err, reply) {
//         if (reply) {
//             // chatters = JSON.parse(reply);
//             console.log('subbed')
//             console.log(reply)
//         }
//     }); 
//     setInterval( function (){
    
//         client.on('pmessage', function(err, reply, data) {
//             if (reply) {
//                 // chatters = JSON.parse(reply);
//                 console.log(data)
//                 console.log(reply)
//             }
//         });


//     }, 2000);

//     // Initialize Messages
//     client.get('chat_app_messages', function(err, reply) {
//         if (reply) {
//             chat_messages = JSON.parse(reply);
//         }
//     });
// });


const SOCKET_PORT = 4000;
const REDIS = {
    "host": "127.0.0.1",
    "port": "6379",
    "password": "",
    "family": 4,
    "database":0
}
function handler(request, response) {
    response.writeHead(200);
    response.end('');
}
var app = require('http').createServer(handler);
var io = require('socket.io')(app);
var ioRedis = require('ioredis');

var subscriber = new ioRedis(REDIS);
var publisher = new ioRedis(REDIS);

app.listen(SOCKET_PORT, function() {
    console.log(new Date + ' - Server is running on port ' + SOCKET_PORT + ' and listening Redis on port ' + REDIS.port + '!');
});


io.on('connection', function(socket) {

    subscriber.subscribe('laravel_database_updates', function(err, count) {
        console.log('Subscribed');
    });
    
    subscriber.on('message', function(subscribed, data) {
    
        var data = JSON.parse(data)
        console.log(data)
        
        publisher.hgetall('laravel_database_user_tokens', function (err, res) {
        
            console.log()
        
            for (var token in res) {
                console.log(token)
                console.log()

                if (Object.hasOwnProperty.call(res, token)) {
        
                    socket.emit(token,  {
                        updates: res[token]
                    });
        
                    const element = res[token];
                    // console.log(token, ': ', element)
                }
            }
        
        });
      

    })

});

/* //subscribe mode 
redis.psubscribe('laravel_database_updates', function(err, count) {
    console.log('Subscribed');
});
*/
// redis.on('pmessage', function(subscribed, channel, data) {
/* redis.on('laravel_database_updates', function(subscribed, channel, data) {

    // data = JSON.parse(data);
    
    console.log(new Date);
    console.log(data);
    io.emit(channel + ':' + data.event, data.data);
}); */

/*
redis.psubscribe('laravel_database_user_tokens', function(err, reply) {
    chatters = JSON.parse(reply);
    console.log('subbed')
});  
*/
// broadcasting mode i guess

// setInterval(() => {
    // var x = redis.hkeys('laravel_database_user_tokens');
    
    // redis.hgetall('laravel_database_user_tokens', function (err, res) {
    //     console.log()

    //     for (const key in res) {
    //         if (Object.hasOwnProperty.call(res, key)) {
    //             const element = res[key];
    //             console.log(key, ': ', element)
    //         }
    //     }
      
    // });
      // res.forEach(element => {
        //     console.log(element) 
        // });
    // console.log(res)

// }, 4000);