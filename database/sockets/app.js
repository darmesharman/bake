var express = require('express');  
var app1 = express();  
var http = require('http')  
var socketio = require('socket.io')
// https://stackoverflow.com/questions/10543977/nodejs-socket-io-stop-emitting-randomly
// https://socket.io/docs/v3/emit-cheatsheet/
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

var selects = ''
var joins = ''
var socket_name = null
io.on('connection', socket => {
  console.log('con')
  
  
  
  socket.on('loaded', (data) => {
    socket_name = socket.id.toString().replace(/[^\w\s.&-]-/g, '').substring(0, 4)
    users[socket_name] = new User() 
    users[socket_name].socket_name = socket_name  

    users[socket_name].username = data.username
    users[socket_name].last_update = data.last_update
    console.log(data.username, data.last_update)
    console.log(users[socket_name].last_update, 'works')

    socket.emit('users', socket_name);

  })


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

      selects = ''
      joins = ''
      if(Object.keys(users).length > 0) {


        // con.query(`SELECT DATE_FORMAT(MAX(updated_at), "%Y-%m-%d %H:%i:%s") as last_update FROM updates where "${users[socket_name].last_update} " < updated_at `, (err, res) => {

        // })     
        // for (var socketnameame in users) 
        // lastupdates.push({socketnameame: users[socketnameame].last_update})

  // let lastupdate;       
// con.query(`SELECT MAX(DATE_FORMAT(updated_at, "%Y-%m-%d %H:%i:%s")) as last_update FROM updates`, (err, res) => {
    // lastupdate = res[0].last_update
  
        let index = 0;
        for(var socketname in users) {
          users[socketname].data = [];
          let date = users[socketname].last_update 

          selects+= `, GROUP_CONCAT(si${index}.details) as details_${index} `
          joins+= ` LEFT JOIN (SELECT *
            FROM updates
            where updated_at > "${date}"
            ) AS si${index}
            ON si.id = si${index}.id
            ` 
          index+=1
        };
        // DATE_FORMAT(updated_at, "%Y-%m-%d %H:%i:%s") 
        let query = `SELECT  DATE_FORMAT(stt.updated_at, "%Y-%m-%d %H:%i:%s") as updated_at , si.event ${selects}
          FROM updates AS si 
          cross JOIN (SELECT MAX(updated_at) as updated_at  from updates) as stt 
          ${joins}
          group by si.event`
        // console.log(query)
        con.query(query, function (error, results, fields) {
          let idx = 0;

          // console.log(results)
          
          for (var socketname in users) {
            results.forEach(ev => {
            // console.log(results[index]['event'])
              console.log(ev[`details_${idx}`])
              try {
                users[socketname].data.push({
                  event: ev['event'], 
                  details: JSON.parse("[" +  ev[`details_${idx}`] + "]") 
                })
              } catch (error) {
                console.log('empty')

              }
              // console.log(users[socketname].data.details)
              // results[index][`details_${idx++}`]
          })
            console.log()
            idx+=1;

          // setTimeout( ()=>{
            socket.emit(socketname, {
                last_update: users[socketname].last_update,
                data: users[socketname].data
            });
          // }, 1000);


          users[socketname].last_update = results[0]['updated_at']

          // console.log('date:', users[socketname].last_update)
        }

        // for (var socketname in users) {
          // console.log(users[socketnameame].data)
            // console.log(users[socketname].last_update)
              // const url = await getAPIAddress(params); //API promises
              // the rest of the code
          
          
          // users[socketname].last_update = lastupdate;
        // }

      })


          

          // users[socketname].data = []
        // });
      }
    }, 10000);

      // if('last_update' in users[socket_name]) {
      //   console.log('heere', users[socket_name].last_update)

      //   // ",DATE_FORMAT(dob,'%y/%m/%d') DATE_FORMAT(MAX(updated_at), "%Y-%m-%d %h:%i:%s")  < STR_TO_DATE(updated_at, "%Y-%m-%d %h:%i:%s")
      //   con.query(`SELECT DATE_FORMAT(MAX(updated_at), "%Y-%m-%d %H:%i:%s") as last_update FROM updates where "${users[socket_name].last_update}" < updated_at `, (err, res) => {
      //     if(res.length > 0) {
            
            
      //       console.log('user defined', users[socket_name].last_update)
      //       if(res[0].last_update){

      //       con.query(`
      //       SELECT si2.event, group_concat(si1.details) list
      //       FROM updates AS si1
      //       JOIN (SELECT *
      //       FROM updates
      //       where updated_at > "${users[socket_name].last_update}"
      //       ) AS si2
      //       ON si1.id = si2.id  
      //       GROUP BY event`, function (error, results, fields) {
    

      //       if(results.length < 2){
      //         try {
      //           results[0].list = JSON.parse("[" + results[0].list + "]");
      //         } catch (error) {
                
      //         }
              
      //         console.log(results)
      //       }
      //       else {
      //         results.forEach((element, index) => {
      //           results[index].list = JSON.parse("[" + results[index].list + "]");
      //         });
      //       }
      //       users[socket_name].last_update = res[0].last_update;
          
      //         socket.emit(socketnameame, {
      //           last_update: users[socketnameame].last_update,
      //           data: results 
      //         });
    
      //     });
      //   }
          
      //     }
      //   });

     

      
        

        
      // }

    
  
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