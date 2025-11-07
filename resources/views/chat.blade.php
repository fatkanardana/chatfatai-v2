<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Arial, sans-serif;
      background-color: #ece5dd;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .chat-container {
      background: #fff;
      width: 95%;
      max-width: 420px;
      height: 85vh;
      display: flex;
      flex-direction: column;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      overflow: hidden;
    }
    .chat-header {
      background: #075E54;
      color: white;
      padding: 15px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .chat-header h3 {
      margin: 0;
      font-size: 18px;
    }
    .status {
      font-size: 13px;
      color: #b2dfdb;
    }
    .messages {
      flex: 1;
      background: #e5ddd5;
      padding: 10px;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
    }
    .message {
      padding: 8px 12px;
      border-radius: 7px;
      margin-bottom: 10px;
      max-width: 80%;
      word-wrap: break-word;
      position: relative;
      font-size: 15px;
    }
    .sent {
      background: #dcf8c6;
      align-self: flex-end;
      border-bottom-right-radius: 0;
    }
    .received {
      background: #fff;
      align-self: flex-start;
      border-bottom-left-radius: 0;
    }
    .chat-form {
      display: flex;
      background: #f0f0f0;
      padding: 10px;
      border-top: 1px solid #ccc;
    }
    input[type="text"] {
      flex: 1;
      padding: 10px;
      border-radius: 20px;
      border: 1px solid #ccc;
      outline: none;
    }
    button {
      background: #128C7E;
      color: white;
      border: none;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      margin-left: 8px;
      cursor: pointer;
      font-size: 16px;
    }
    button:hover {
      background: #0c6b5c;
    }
  </style>
</head>
<body>

<div class="chat-container">
  <div class="chat-header">
    <div>
      <h3>RARETI</h3>
      <div class="status">ASHH MUMET</div>
    </div>
  </div>

  <div class="messages" id="messages"></div>

  <form id="chatForm" class="chat-form">
    {{-- Ganti sesuai user login --}}
    <input type="hidden" id="sender" value="{{ session('sender_name') }}">
    <input type="text" id="content" placeholder="Ketik pesan..." required>
    <button type="submit">➤</button>
  </form>
</div>

<script>
  function loadMessages() {
    $.get('{{ route('fetch.messages') }}', function(messages) {
      $('#messages').empty();
      messages.forEach(msg => {
        const cls = msg.sender === $('#sender').val() ? 'sent' : 'received';
        $('#messages').append(`<div class="message ${cls}">${msg.content}</div>`);
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

  setInterval(loadMessages, 2000);
  loadMessages();
</script>

</body>
</html>
