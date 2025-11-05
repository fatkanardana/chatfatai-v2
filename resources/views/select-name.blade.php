<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilih Nama - ChatFatai</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #00e3ae, #9be15d);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      background: white;
      padding: 30px;
      border-radius: 15px;
      text-align: center;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
    button {
      background: #00c28b;
      border: none;
      color: white;
      padding: 10px 20px;
      margin: 10px;
      border-radius: 10px;
      font-size: 18px;
      cursor: pointer;
      transition: 0.3s;
    }
    button:hover {
      background: #009a6d;
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Pilih siapa kamu?</h2>
    <form method="POST" action="/setname">
      @csrf
      <button type="submit" name="name" value="Fatkan">Masuk sebagai Fatkan</button>
      <button type="submit" name="name" value="Septi">Masuk sebagai Septi</button>
    </form>
  </div>
</body>
</html>
