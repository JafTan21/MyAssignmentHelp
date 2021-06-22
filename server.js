const express = require('express');
const { update } = require('lodash');
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
    (message, user_from_id, user_to_id, room, created_at) 
    VALUES
     ('${data.message}', '${data.user_from_id}', '${data.user_to_id}', '${data.room}', CURRENT_TIMESTAMP())`;
    con.query(sql, function(err, result) {
        if (err) throw err;
        console.log("1 record inserted: " + sql);
    });
}

function updateViewedAt(data) {
    var sql = `update messages set viewed_at = CURRENT_TIMESTAMP(), updated_at = CURRENT_TIMESTAMP() where room = '${data.room}' and viewed_at is NULL and user_to_id = 'admin'`;

    con.query(sql, function(err, result) {
        if (err) throw err;
        console.log("1 record updated: " + sql);
    });

}

io.on('connection', (socket) => {
    console.log('connection: ' + socket.id);

    socket.on('joinRoom', (data) => {
        socket.join(data.room);
        console.log('join: ' + data.room);
        socket.broadcast.emit('newUserMessageRequest', data.room);
        if (data.from_user) {
            saveMessageToDatabse({
                message: 'Chat request',
                user_from_id: data.room,
                user_to_id: 'admin',
                room: data.room
            });
        }
    });

    socket.on('updateViewedAt', data => {
        updateViewedAt(data);
    });


    socket.on('sendChatToServerForAdmin', (data) => {
        saveMessageToDatabse(data);
        // socket.broadcast.emit('getUserChat', data);
        io.to(data.room).emit('getUserChat', data);
        console.log('data.room: ' + data.room);
        socket.broadcast.emit('newUserMessageRequest', data.room);
    });

    socket.on('sendChatToServerForUser', (data) => {
        saveMessageToDatabse(data);
        // socket.broadcast.emit('getAdminChat', data);
        io.to(data.room).emit('getAdminChat', data);
        console.log('data.room: ' + data.room);
    });

    socket.on('adminViewingUser', room => {
        console.log('adminViewingUser' + room);
        socket.to(room).emit('show-message-section');
    });

    socket.on('disconnect', (socket) => {
        console.log('Disconnect: ' + socket.id);
    });
});

server.listen(3000, () => {
    console.log('Server is running');
});