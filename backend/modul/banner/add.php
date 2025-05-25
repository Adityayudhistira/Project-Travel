<div class="mt-4">
      <h2 class="mb-4">Tambah Banner</h2>
<form action="" method="POST" enctype="multipart/form-data">

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Image Banner</label>
  <input type="file" class="form-control" name="img">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Heading</label>
  <input type="text" class="form-control" name="head">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Description</label>
  <input type="text" class="form-control" name="desc">
</div>

<div class="mb-3">
    <button type="submit" class="btn btn-success" name="btn">Input Banner</button>
</div>

</form>

<?php 
    if(isset($_POST['btn'])){
    $path = '../gbrbanner/';
    $img = $_FILES['img']['name'];
    $head = $_POST['head'];
    $desc = $_POST['desc'];
    move_uploaded_file($_FILES['img']['tmp_name'], $path.$img);
    $sqlInp = $conn->prepare('INSERT INTO banner(image,heading,description)VALUES(:img,:head,:desc)');
    $sqlInp->bindParam(':img',$img);
    $sqlInp->bindParam(':head',$head);
    $sqlInp->bindParam(':desc',$desc);
    if ($sqlInp->execute()){
      header('location:?page=banner'); //nanti buat data.php
    }else {
      echo "gagal menambahkan banner: " . $sqlInp->errorInfo()[2];
    }
    }
?>
</div>