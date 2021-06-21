// markup
// const sendMessageToAdmin = (e) => {
//     e.preventDefault();
//     var chatInput = $("#chatInput").val();
// }



function genarate_markup_send_message(msg) {
    let message = '';

    message += `
    <div class="direct-chat-msg right" >
        <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-right"> Sarah Bullock </span> <span
                class="direct-chat-timestamp float-left"> 23 Jan 2: 05 pm </span> </div>
        <img class="direct-chat-img" src="https://ui-avatars.com/api/?name=admin" alt="Message User Image">
        <div class="direct-chat-text" style="word-break: break-word;">
            ${msg}
        </div>
    </div>`;

    return message;
}

function genarate_markup_get_message(msg) {
    let message = '';

    message += `<div class="direct-chat-msg">
    <div class="direct-chat-infos clearfix">
        <span class="direct-chat-name float-left">Admin</span>
        <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
    </div>
    <img class="direct-chat-img" src="https://ui-avatars.com/api/?name=admin"
        alt="Message User Image">
    <div class="direct-chat-text" style="word-break: break-word;">
        ${msg}
    </div>
</div>`;

    return message;
}

function scrollToEnding(elm) {
    $(elm).scrollTop($(elm).prop("scrollHeight"));
}

$(function() {
    let ip_address = '127.0.0.1';
    let socket_port = '3000';
    let socket = io(ip_address + ':' + socket_port);
    let chatInput = $('#chatInput');
    const messages = $("#messages");

    const user_from_id = $("#user").val();

    const sendMessage = (message) => {
        if (!message) {
            message = chatInput.val();
        }
        if (message) {
            var data = {
                message,
                user_from_id: user_from_id,
                user_to_id: 1
            };
            socket.emit('sendChatToServerForAdmin', data);
            chatInput.val('');
            messages.append(genarate_markup_send_message(message));
        }

        scrollToEnding(messages);

        return false;
    }

    const getMessage = (message) => {
        if (message) {
            messages.append(genarate_markup_get_message(message))
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
        if (data.user_to_id == user_from_id) {
            getMessage(data.message);
        }
        $("#new_unread_message_count").html(1);
    });
});

function msgBtnClicked() {
    $("#new_unread_message_count").html('');
}