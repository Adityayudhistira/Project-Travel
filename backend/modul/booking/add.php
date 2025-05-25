<?php
    session_start();
    include '../../../lib/koneksi.php'; 

    // Ambil data package berdasarkan id_packages dari URL
if (isset($_GET['id_packages'])) {
    $id = $_GET['id_packages'];
    $stmt = $conn->prepare("SELECT * FROM packages WHERE id_packages = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $package = $stmt->fetch(PDO::FETCH_ASSOC);
}

    
if(isset($_POST['btn'])) {
    $iduser       = $_SESSION['iduser']; 
    $nama     = $_POST['nama'];
    $checkin  = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $harga    = $_POST['harga'];
    $status   = 'pending';

     // Ambil harga dari database berdasarkan id_packages
    $id_package = $_GET['id_packages'];
    $stmt = $conn->prepare("SELECT harga FROM packages WHERE id_packages = :id");
    $stmt->bindParam(':id', $id_package);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $harga = $data['harga'];

    
// nge add nama dan tanggal 
    $stmt = $conn->prepare("INSERT INTO booking (iduser,nama, checkin, checkout, harga, status)
    VALUES (:iduser, :nama, :checkin, :checkout, :harga, :status)");

    $stmt->bindParam(':iduser', $iduser);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':checkin', $checkin);
    $stmt->bindParam(':checkout', $checkout);
    $stmt->bindParam(':harga', $harga);
    $stmt->bindParam(':status', $status);

    
    if ($stmt->execute()) {
        header('location:?page=booking');
    } else {
        echo "Gagal menambahkan booking.";
    }
}    
?>

<!-- Tampilan Form -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Booking</title>
  <style>
    body {
      background: #f5f5f5;
      padding: 50px;
      margin: 0;
    }

    .booking-container {
      background: #fff;
      max-width: 500px;
      margin: auto;
      padding: 30px 40px;
      border-radius: 12px;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }

    label {
      font-weight: bold;
      color: #444;
    }

    input[type="text"],
    input[type="date"] {
      width: 100%;
      padding: 10px;
      margin-top: 6px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    input[readonly] {
      background-color: #f0f0f0;
      color: #777;
    }

    button[type="submit"] {
      width: 100%;
      background-color: #F35A00;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
    }

    button[type="submit"]:hover {
      background-color: #d94f00;
    }
  </style>
</head>
<body>

  <div class="booking-container">
    <h2>Form Booking</h2>
    <form method="POST">
      <label>Nama:</label><br>
      <input type="text" name="nama" required><br>

      <label>Check-in:</label><br>
      <input type="date" name="checkin" required><br>

      <label>Check-out:</label><br>
      <input type="date" name="checkout" required><br>

      <label>Harga:</label><br>
      <input type="text" name="harga" id="harga" value="<?= isset($package['harga']) ? $package['harga'] : '' ?>" readonly><br><br> <!-- $package didapet dari query SELECT-->

      <button type="submit" name="btn">Book Now</button>
    </form>
  </div>

</body>
</html>