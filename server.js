var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http, {
    cors: {
        origin: "*",  // Be more specific in production!
        methods: ["GET", "POST"]
    }
});
var users = [];


http.listen(8005, function(){
    console.log('Listing to port 8005');
});

io.on('connection', function(socket){
    socket.on("user_connected", function(user_id){
        users[user_id] = socket.id;
        io.emit("updateUserStatus", users);
        console.log("User Connected: " + users);
    });

    socket.on("disconnect", function(){
        var i = users.indexOf(socket.id);
        users.splice(i, 1, 0);
        io.emit('updateUserStatus', users);
        console.log("User Disconnected"); 
        console.log("User Connected: " + users); 
    });
});