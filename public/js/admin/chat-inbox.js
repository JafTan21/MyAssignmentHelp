function genarate_markup_send_message(data) {
    let message = '';
    console.log(data);

    message += `
    <div class="direct-chat-msg right" >
        <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-right">
            ${data.name}
            </span>
             <span
                class="direct-chat-timestamp float-left"> ${data.time} </span> </div>
        <img class="direct-chat-img" src="https://ui-avatars.com/api/?name=admin" alt="Message User Image">
        <div class="direct-chat-text" style="word-break: break-word;">
            ${data.message}
        </div>
    </div>`;

    return message;
}

function genarate_markup_get_message(data) {
    let message = '';
    console.log(data);
    message += `<div class="direct-chat-msg">
    <div class="direct-chat-infos clearfix">
        <span class="direct-chat-name float-left">
        ${data.name}
        </span>
        <span class="direct-chat-timestamp float-right">
        ${data.time}
        </span>
    </div>
    <img class="direct-chat-img" src="https://ui-avatars.com/api/?name=admin"
        alt="Message User Image">
    <div class="direct-chat-text" style="word-break: break-word;">
        ${data.message}
    </div>
</div>`;

    return message;
}

$(document).ready(function() {
    let ip_address = '127.0.0.1';
    let socket_port = '3000';
    let socket = io(ip_address + ':' + socket_port);
    let chatInput = $('#chatInput');
    const messages = $("#messages");

    const user_from_id = $("#user").val();
    const room = $("#room").val();
    const user_to_id = room;

    const to_user = {
        name: $("#to_user_name").val(),
    };

    const joinRoom = (room, from_user) => {
        socket.emit('joinRoom', {
            room,
            from_user
        });
        room = room;
        console.log('joined : ' + room);
    }

    joinRoom(room || 'admin', false);

    socket.on('newUserMessageRequest', room_name => {
        if (room == room_name) {
            socket.emit('adminViewingUser', room);
        } else {
            $("#new-message-" + room_name).html('new');
        }
    });

    const sendMessage = (message) => {
        message = message || chatInput.val();
        if (message) {
            var data = {
                message,
                user_from_id: user_from_id,
                user_to_id: user_to_id,
                room: room
            };
            socket.emit('sendChatToServerForUser', data);
            chatInput.val('');

            messages.append(genarate_markup_send_message({
                message: data.message,
                name: 'Admin',
                time: (new Date).toLocaleString(),
            }));
        }
        $("#messages-card").scrollTop($("#messages-card").prop("scrollHeight"));
        return false;
    }

    const getMessage = (message) => {
        if (message) {
            messages.append(genarate_markup_get_message({
                message: message,
                name: to_user.name,
                time: (new Date).toLocaleString(),
            }));
        }
        $("#messages-card").scrollTop($("#messages-card").prop("scrollHeight"));
        socket.emit('updateViewedAt', { room });
        return false;
    }

    chatInput.keypress(function(e) {
        let message = $(this).val();
        console.log(message);
        if (e.which === 13 && !e.shiftKey) {
            sendMessage(message);
        }
    });
    $("#sendButton").on('click', () => sendMessage(chatInput.val()));


    $("#messages-card").scrollTop($("#messages-card").prop("scrollHeight"));

    socket.emit('adminViewingUser', room);

    socket.on('getUserChat', (data) => {
        console.log(data);
        getMessage(data.message);
    });

    $("#all-contacts-button").click(() => {
        $("#users").slideToggle();
    });
});