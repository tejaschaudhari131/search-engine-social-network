<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat Room</title>
    <script>
        const ws = new WebSocket('ws://localhost:8080');

        ws.onmessage = function(event) {
            const messages = document.getElementById('messages');
            const message = document.createElement('li');
            message.textContent = event.data;
            messages.appendChild(message);
        };

        function sendMessage() {
            const input = document.getElementById('message-input');
            ws.send(input.value);
            input.value = '';
        }
    </script>
</head>
<body>
    <h1>Chat Room</h1>
    <ul id="messages"></ul>
    <input type="text" id="message-input" placeholder="Type your message">
    <button onclick="sendMessage()">Send</button>
</body>
</html>
