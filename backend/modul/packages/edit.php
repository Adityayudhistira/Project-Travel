<?php
    $id = $_GET['id_packages'];
    $b = $conn->prepare("SELECT * FROM packages WHERE id_packages='$id'"); 
    $b->execute();
    $result = $b->fetch(PDO::FETCH_ASSOC);
    ?>

    
<form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$result['id_packages']?>">

    <div class="mt-3">
    <span class="label label-danger">Image Packages</span>
    <input class="form-control" type="file" name="img" value="<?php echo $result['image']?>">

    <div class="mt-3">
    <span class="label label-danger">Judul Berita</span>
    <input class="form-control" type="text" name="jdl" value="<?php echo $result['judul']?>">

    <div class="mt-3">
    <span class="label label-danger">Description</span>
    <input class="form-control" type="text" name="desc" value="<?php echo $result['description']?>">

    <div class="mt-3">
    <span class="label label-danger">Harga</span>
    <input class="form-control" type="number" name="harga" value="<?php echo $result['harga']?>">


    <div class="mt-3">
        <button name="btn" type="submit" class="btn btn-warning btn-sm">Update</button>
    </div>
</form>
<?php 
    if (isset($_POST['btn'])) {
        $path = '../gbrpackages/';
        $img = $_FILES['img']['name'];
        $jdl = $_POST['jdl'];
        $desc = $_POST['desc'];
        $harga = $_POST['harga'];
        move_uploaded_file($_FILES['img']['tmp_name'], $path.$img);
        $query = $conn->prepare("UPDATE packages SET image=:img, judul=:jdl, description=:desc , harga=:harga  WHERE id_packages=:id"); 
        $query->bindParam(':id',$id);
        $query->bindParam(':img',$img);
        $query->bindParam(':jdl',$jdl);
        $query->bindParam(':desc',$desc);
        $query->bindParam(':harga',$harga);
        if($query->execute()){
            header('location:?page=packages');
        }else{
            echo "gagal";
        }
    }
?>