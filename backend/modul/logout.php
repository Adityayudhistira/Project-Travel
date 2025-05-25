<?php
if (isset($_SESSION['iduser'])) {
    session_destroy();
    header('location:index.php');
}
?>