const express = require('express');
const app = express();
const server = require('http').createServer(app);
const io = require('socket.io')(server, {
    cors: { origin: "*" }
});

var mysql = require('mysql');
var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "myassignmenthelp"
});

con.connect(function(err) {
    if (err) throw err;
});

function saveMessageToDatabse(data) {
    var sql = `INSERT INTO messages 
    (message, user_from_id, user_to_id, created_at) 
    VALUES
     ('${data.message}', ${data.user_from_id}, ${data.user_to_id}, CURRENT_TIMESTAMP())`;
    con.query(sql, function(err, result) {
        if (err) throw err;
        console.log("1 record inserted");
    });
}

io.on('connection', (socket) => {
    console.log('connection');

    socket.on('sendChatToServerForAdmin', (data) => {
        saveMessageToDatabse(data);
        socket.broadcast.emit('getUserChat', data);
    });

    socket.on('sendChatToServerForUser', (data) => {
        saveMessageToDatabse(data);
        socket.broadcast.emit('getAdminChat', data);
    });

    socket.on('disconnect', (socket) => {
        console.log('Disconnect');
    });
});

server.listen(3000, () => {
    console.log('Server is running');
});