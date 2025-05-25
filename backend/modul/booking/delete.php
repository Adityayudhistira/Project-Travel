<?php
    $id = $_GET['id_booking'];
    $b = $conn->prepare("DELETE FROM booking WHERE id_booking = '$id'"); 
   if($b->execute()){
    header('location:?page=booking');
   }
    ?>