<?php 
include "../lib/koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Travel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color:#f5f5f5;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-box {
      background-color: #ffffff;
      padding: 40px;
      border-radius: 15px;
      width: 100%;
      max-width: 400px;
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }
    .field {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      color: #333;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #4e8df5;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
    }

    button:hover {
      background-color: #376fd0;
    }
  </style>
</head>
<body>

  <div class="login-box">
    <h2>Login Admin</h2>
    <form action="" method="POST">
      <div class="field">
        <label>Username:</label>
        <input type="name" class="form-control" placeholder="Enter username" name="username">
        </div>

      <div class="field">
        <label>Password:</label>
        <input type="password" class="form-control" placeholder="Enter password" name="password">
        </div>

      <button type="submit" name="btn">Masuk</button>
    </form> 
    <center>
    <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
  </center>
  </div>

</body>
</html>

<?php

if (isset($_POST['btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = :username LIMIT 1");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if ($password === $user['password']) {
            $_SESSION['iduser'] = $user['iduser'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit;
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Username tidak ditemukan.";
    }
}
?>
