<?php
    $id = $_GET['id_banner'];
    $b = $conn->prepare("DELETE FROM banner WHERE id_banner = '$id'"); 
   if($b->execute()){
    header('location:?page=banner');
   }
    ?>