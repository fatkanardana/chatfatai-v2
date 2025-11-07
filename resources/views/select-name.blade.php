<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilih Pengguna - Chat App</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #5ee7df, #b490ca);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .card {
      background: #ffffff;
      border-radius: 20px;
      padding: 40px 30px;
      text-align: center;
      width: 90%;
      max-width: 360px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
      animation: fadeIn 0.7s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h2 {
      color: #333;
      margin-bottom: 25px;
      font-weight: 600;
      font-size: 22px;
    }

    .btn {
      background: linear-gradient(90deg, #667eea, #764ba2);
      color: #fff;
      border: none;
      padding: 12px 20px;
      width: 100%;
      border-radius: 12px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 15px;
      transition: all 0.3s ease;
    }

    .btn:hover {
      transform: scale(1.05);
      background: linear-gradient(90deg, #5a6eea, #6b4aa2);
    }

    .footer {
      margin-top: 30px;
      color: #666;
      font-size: 13px;
    }
  </style>
</head>
<body>

  <div class="card">
    <h2>Masuk ke Chat</h2>
    <form method="POST" action="/setname">
      @csrf
      <button type="submit" name="name" value="User1" class="btn">Masuk sebagai User 1</button>
      <button type="submit" name="name" value="User2" class="btn">Masuk sebagai User 2</button>
    </form>
    <div class="footer">
      Chat — by Fatkan
    </div>
  </div>

</body>
</html>
