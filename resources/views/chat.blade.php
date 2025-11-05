<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Fatkan</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #9be15d, #00e3ae);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .chat-container {
      background: #fff;
      border-radius: 15px;
      width: 90%;
      max-width: 400px;
      height: 80vh;
      display: flex;
      flex-direction: column;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
    .chat-header {
      background: #2408b0;
      color: white;
      text-align: center;
      padding: 15px;
      font-size: 20px;
      font-weight: bold;
    }
    @keyframes moveText {
      0% { transform: translateX(0); }
      100% { transform: translateX(10px); }
    }
    .messages {
      flex: 1;
      padding: 10px;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
    }
    .message {
      padding: 8px 12px;
      border-radius: 15px;
      margin-bottom: 10px;
      max-width: 80%;
    }
    .sent {
      background: #dcf8c6;
      align-self: flex-end;
    }
    .received {
      background: #f1f0f0;
      align-self: flex-start;
    }
    .chat-form {
      display: flex;
      padding: 10px;
      border-top: 1px solid #ddd;
    }
    input[type="text"] {
      flex: 1;
      padding: 10px;
      border-radius: 10px;
      border: 1px solid #ccc;
    }
    button {
      background: #0717a6;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 10px;
      margin-left: 5px;
      cursor: pointer;
    }
    @media (max-width: 600px) {
      .chat-container {
        height: 90vh;
        width: 100%;
        border-radius: 0;
      }
    }
  </style>
</head>
<body>

<div class="chat-container">
  <div class="chat-header">Chat Fatai</div>
  <div class="messages" id="messages"></div>

  <form id="chatForm" class="chat-form">
    <input type="hidden" id="sender" value="Fatkan">
    <input type="text" id="content" placeholder="Ketik pesan...">
    <button type="submit">Kirim</button>
  </form>
</div>

<script>
  function loadMessages() {
    $.get('{{ route('fetch.messages') }}', function(messages) {
      $('#messages').empty();
      messages.forEach(msg => {
        const cls = msg.sender === $('#sender').val() ? 'sent' : 'received';
        $('#messages').append(`<div class="message ${cls}"><b>${msg.sender}:</b> ${msg.content}</div>`);
      });
      $('#messages').scrollTop($('#messages')[0].scrollHeight);
    });
  }

  $('#chatForm').submit(function(e) {
    e.preventDefault();
    $.post('{{ route('send.message') }}', {
      _token: '{{ csrf_token() }}',
      sender: $('#sender').val(),
      content: $('#content').val()
    }, function() {
      $('#content').val('');
      loadMessages();
    });
  });

  // Refresh otomatis setiap 2 detik
  setInterval(loadMessages, 2000);

  // Load pertama kali
  loadMessages();
  <input type="hidden" id="sender" value="{{ session('sender_name') }}">
  <div class="chat-header">ChatFatai 💬</div>


</script>

</body>
</html>
