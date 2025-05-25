<style>
  form {
  max-width: 600px;
  margin: 30px auto; /*30px buat atas dan bawah auto=otomatis tengah horizontal */
  padding: 25px;
  background-color: #f8f9fa;
  border-radius: 12px;
}

form label {
  font-weight: 600;
  margin-bottom: 8px;
  display: block;
  color: #333;
}

form input[type="text"] {
  padding: 10px;
  border-radius: 8px;
  border: 1px solid #ced4da;
  width: 100%;
  margin-bottom: 20px;
  font-size: 16px;
  box-sizing: border-box;
}


form button {
  padding: 10px 20px;
  border-radius: 8px;
  border: none;
  background-color: #F35A00;
  color: #fff;
  
}

form button:hover {
  background-color: #d94f00;
}

</style>
<?php
    include"../lib/koneksi.php";
?>
<form action="" method="POST">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nama</label>
  <input type="text" class="form-control" name="nama">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Comment</label>
  <input type="text" class="form-control" name="komentar">
</div>

<div class="mb-3">
    <button type="submit" class="btn" name="btn">Submit Comment</button>
</div>
</form>

<?php 
    if(isset($_POST['btn'])){
    $nama = $_POST['nama'];
    $komentar = $_POST['komentar'];
    $sqlInp = $conn->prepare('INSERT INTO ulasan(nama,komentar)VALUES(:nama,:komentar)');
    $sqlInp->bindParam(':nama',$nama);
    $sqlInp->bindParam(':komentar',$komentar);
    if ($sqlInp->execute()){
      header('location:../index.php'); // abis klik submit balik ke index
      exit;
    }else {
      echo "gagal menambahkan ulasan: " . $sqlInp->errorInfo()[2];
    }
    }
?>
</div>