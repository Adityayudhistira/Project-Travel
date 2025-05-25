<?php
    $id = $_GET['id_ulasan'];
    $b = $conn->prepare("DELETE FROM ulasan WHERE id_ulasan = '$id'"); 
   if($b->execute()){
    header('location:?page=ulasan');
   }
    ?>