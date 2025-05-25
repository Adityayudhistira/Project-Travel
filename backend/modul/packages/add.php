<div class="mt-4">
      <h2 class="mb-4">Tambah Packages</h2>
<form action="" method="POST" enctype="multipart/form-data">

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Image Packages</label>
  <input type="file" class="form-control" name="img">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Judul</label>
  <input type="text" class="form-control" name="jdl">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Description</label>
  <input type="text" class="form-control" name="desc">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Harga</label>
  <input type="number" class="form-control" name="harga">
</div>

<div class="mb-3">
    <button type="submit" class="btn btn-success" name="btn">Input Packages</button>
</div>

</form>

<?php 
    if(isset($_POST['btn'])){
    $path = '../gbrpackages/';
    $img = $_FILES['img']['name'];
    $jdl = $_POST['jdl'];
    $desc = $_POST['desc'];
    $harga = $_POST['harga'];
    move_uploaded_file($_FILES['img']['tmp_name'], $path.$img);
    $sqlInp = $conn->prepare('INSERT INTO packages(image,judul,description,harga)VALUES(:img,:jdl,:desc,:harga)');
    $sqlInp->bindParam(':img',$img);
    $sqlInp->bindParam(':jdl',$jdl);
    $sqlInp->bindParam(':desc',$desc);
    $sqlInp->bindParam(':harga',$harga);
    if ($sqlInp->execute()){
      header('location:?page=packages'); //nanti buat data.php
    }else {
      echo "gagal menambahkan packages: " . $sqlInp->errorInfo()[2];
    }
    }
?>
</div>