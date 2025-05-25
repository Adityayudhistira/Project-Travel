<?php
    $id = $_GET['id_banner'];
    $b = $conn->prepare("SELECT * FROM banner WHERE id_banner='$id'"); 
    $b->execute();
    $result = $b->fetch(PDO::FETCH_ASSOC);
    ?>

    
<form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$result['id_banner']?>">

    <div class="mt-3">
    <span class="label label-danger">Image Packages</span>
    <input class="form-control" type="file" name="img" value="<?php echo $result['image']?>">

    <div class="mt-3">
    <span class="label label-danger">Judul Berita</span>
    <input class="form-control" type="text" name="head" value="<?php echo $result['heading']?>">

    <div class="mt-3">
    <span class="label label-danger">Description</span>
    <input class="form-control" type="text" name="desc" value="<?php echo $result['description']?>">



    <div class="mt-3">
        <button name="btn" type="submit" class="btn btn-warning btn-sm">Update</button>
    </div>
</form>
<?php 
    if (isset($_POST['btn'])) {
        $path = '../gbrbanner/';
        $img = $_FILES['img']['name'];
        $head = $_POST['head'];
        $desc = $_POST['desc'];
        move_uploaded_file($_FILES['img']['tmp_name'], $path.$img);
        $query = $conn->prepare("UPDATE banner SET image=:img, heading=:head, description=:desc  WHERE id_banner=:id"); 
        $query->bindParam(':id',$id);
        $query->bindParam(':img',$img);
        $query->bindParam(':head',$head);
        $query->bindParam(':desc',$desc);
        if($query->execute()){
            header('location:?page=banner');
        }else{
            echo "gagal";
        }
    }
?>