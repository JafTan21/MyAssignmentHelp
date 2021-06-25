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

function scrollToEnding(elm) {
    $(elm).scrollTop($(elm).prop("scrollHeight"));
}

$(function() {

    var user_to_id = 'admin';

    const ip_address = '127.0.0.1';
    const socket_port = '3000';
    const socket = io(ip_address + ':' + socket_port);
    const chatInput = $('#chatInput');
    const messages = $("#messages");

    const user_from_id = $("#user").val();
    const user = {
        name: $("#name").val(),
    };
    var room;

    const joinRoom = (room, from_user = true) => {
        socket.emit('joinRoom', {
            room,
            from_user
        });
        room = room;
        console.log('joined : ' + room);
    }

    // 
    $("#adminFinder").click(() => {
        joinRoom(user_from_id);
    });

    const sendMessage = (message) => {
        if (!message) {
            message = chatInput.val();
        }
        if (message) {
            var data = {
                message,
                user_from_id: user_from_id,
                user_to_id: user_to_id,
                room: user_from_id
            };
            socket.emit('sendChatToServerForAdmin', data);
            chatInput.val('');
            messages.append(genarate_markup_send_message({
                message: data.message,
                name: user.name,
                time: (new Date).toLocaleString(),
            }));
        }

        scrollToEnding(messages);

        return false;
    }

    const getMessage = (data) => {
        if (data.message) {
            messages.append(genarate_markup_get_message({
                message: data.message,
                name: 'Admin',
                time: (new Date).toLocaleString(),
            }))
        }
        scrollToEnding(messages);
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

    socket.on('getAdminChat', (data) => {
        console.log(data);
        getMessage(data);
        $("#new_unread_message_count").html(1);
    });


    socket.on('show-message-section', () => {
        $("#message-sender").removeClass('d-none');
        $("#adminFinder").hide();
        $("#messages").scrollTop($("#messages").prop("scrollHeight"));
    });
    $("#msgBtn").click(() => {
        $("#new_unread_message_count").html('');
        // joinRoom(user_from_id);
    });
});