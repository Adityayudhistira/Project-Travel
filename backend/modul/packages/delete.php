<?php
    $id = $_GET['id_packages'];
    $b = $conn->prepare("DELETE FROM packages WHERE id_packages = '$id'"); 
   if($b->execute()){
    header('location:?page=packages');
   }
    ?>