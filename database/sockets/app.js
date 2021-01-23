var express = require('express');  
var app1 = express();  
var http = require('http')  
var socketio = require('socket.io')

app = http.createServer(app1);
const cors = require('cors');

const port = process.env.PORT || 4000;

var io = socketio(app, {
  cors: {
      origin: "*",
      methods: ["GET", "POST"],
      credentials: true
    }
  } 
);

var mysql = require('mysql');

var con = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'db_test',
  // timezone : '+00:00'
  // timezone : '+00:00'
  // 6 hours, 29 minutes and 47
});


con.connect();
var User = require('./users.js')
const users = {}

// var last_update = "2021-01-19T03:24:47";

var socket_name = null
io.on('connection', socket => {
  console.log('con')
  
  socket_name = socket.id.toString().replace(/[^\w\s.&-]-/g, '').substring(0, 4)
  users[socket_name] = new User() 
  users[socket_name].socket_name = socket_name  
  
  socket.on('loaded', (data) => {
    users[socket_name].username = data.username
    users[socket_name].last_update = data.date
    console.log(data.username, data.date)
    console.log(users[socket_name].last_update, 'works')
  })

  socket.emit('users', socket_name);

 /*  select event, group_concat(concat(details))
          from updates
          where updated_at > "${users[socket_name].last_update}"
          group by event
          
          SELECT si2.event, group_concat(si1.details)
        FROM updates AS si1
        JOIN (SELECT *
              FROM updates
              where updated_at > "${users[socket_name].last_update}
              GROUP BY event) AS si2
        ON si1.event = si2.event
        
        GROUP BY event
   */
  setInterval(
    function  () {
      
      if('last_update' in users[socket_name]) {
        console.log('heere', users[socket_name].last_update)

        // ",DATE_FORMAT(dob,'%y/%m/%d') DATE_FORMAT(MAX(updated_at), "%Y-%m-%d %h:%i:%s")  < STR_TO_DATE(updated_at, "%Y-%m-%d %h:%i:%s")
        con.query(`SELECT DATE_FORMAT(MAX(updated_at), "%Y-%m-%d %H:%i:%s") as last_update FROM updates where "${users[socket_name].last_update}" < updated_at `, (err, res) => {
          if(res.length > 0) {
            
            
            console.log('user defined', users[socket_name].last_update)
            if(res[0].last_update){
            
            
            con.query(`
            SELECT si2.event, group_concat(si1.details) list
            FROM updates AS si1
            JOIN (SELECT *
            FROM updates
            where updated_at > "${users[socket_name].last_update}"
            ) AS si2
            ON si1.id = si2.id  
            GROUP BY event`, function (error, results, fields) {
    

            if(results.length < 2){
              try {
                results[0].list = JSON.parse("[" + results[0].list + "]");
                
              } catch (error) {
                
              }
              
              console.log(results)
            }
            else {
              results.forEach((element, index) => {
                results[index].list = JSON.parse("[" + results[index].list + "]");
              });
            }
            users[socket_name].last_update = res[0].last_update;
          
            for (var socketname in users) {
              socket.emit(socketname, {
                last_update: users[socketname].last_update,
                data: results 
              });
            }
    
          });
        }
          
          }
       

        });

     

      
        

        
      }
    }, 2500);

    
  
}); 


app.listen(port, () => {
    console.log('Listening on port *: ',port);
});
app1.listen(port+1) 



  
/* var query = function  () {
    
  con.query(`
    select event, group_concat(concat(details))
    from updates
    where updated_at > "${users[socket_name].last_update}"
    group by event`
, function (error, results, fields) {
  con.query(`select MAX(updated_at) from updates`, (err, res) => {
    last_update = res;
    console.log(res, 'res')
  })
    socket.emit(socket_name, {
      // last_update: last_update, 
      data: results
    })
  });

  setInterval(query(), 5000)

}
setTimeout(query, 1500) */