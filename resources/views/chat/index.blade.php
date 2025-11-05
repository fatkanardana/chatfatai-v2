<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chat 2 Arah Manual</title>
    <style>
        body {
            font-family: Arial;
            background: #f1f1f1;
            padding: 20px;
        }
        .chat-box {
            width: 400px;
            margin: auto;
            background: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .message {
            margin-bottom: 10px;
        }
        .sender {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="chat-box">
        <h3>Chat 2 Arah</h3>

        <div>
            @foreach($messages as $msg)
                <div class="message">
                    <span class="sender">{{ $msg->sender }}:</span>
                    <span>{{ $msg->message }}</span>
                </div>
            @endforeach
        </div>

        <hr>

        <form action="{{ route('chat.store') }}" method="POST">
            @csrf
            <input type="text" name="sender" placeholder="Nama pengirim" required><br><br>
            <input type="text" name="receiver" placeholder="Nama penerima" required><br><br>
            <textarea name="message" placeholder="Tulis pesan..." required></textarea><br><br>
            <button type="submit">Kirim</button>
        </form>
    </div>
</body>
</html>
