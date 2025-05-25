<style>
body {
    background-color: #f5f5f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

form {
    background-color: white;
    padding: 30px;
    border-radius: 20px;
    width: 350px;
    text-align: center;
}

h2 {
    margin-bottom: 25px;
    color: #333;
}

label {
    text-align: left;
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: none;
    background-color: #eef4ff;
    border-radius: 8px;
    font-size: 16px;
}

button[type="submit"] {
    width: 100%;
    background-color: #4a90ff;
    color: white;
    padding: 12px;
    font-size: 16px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #357de8;
}

a {
    color: #0066cc;
    text-decoration: none;
}


</style>
<?php
include "lib/koneksi.php";
session_start();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; 

    // Cek apakah username sudah ada
    $cek = $conn->prepare("SELECT * FROM user WHERE username = :username");
    $cek->bindParam(':username', $username);
    $cek->execute();

    // row count biar data ga double
    if ($cek->rowCount() > 0) { 
    } else {
        $stmt = $conn->prepare("INSERT INTO user (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password); // langsung pakai password

        if ($stmt->execute()) {
            $success = "Registrasi berhasil. Silakan <a href='login.php'>Login</a>.";
        } else {
            $error = "Registrasi gagal.";
        }
    }
}
?>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<?php if (isset($success)) echo "<p style='color:green;'>$success</p>"; ?>

<form method="POST">
    <h2>Daftar</h2>
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="register">DAFTAR</button>
</form>
