<?php 
session_start();
error_reporting(0);
  include"../lib/koneksi.php";
  if(!isset($_SESSION['iduser'])){
    include"login.php";
  }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="aset/style.css">

</head>
<body>
  <?php 
  include"modul/sidebar.php"
  ?>

  <!-- Main Content -->
  <div class="content">
<?php 
include"modul/navbar.php"
?>

<!--dashboard heading-->
<?php 
  $page= $_GET['page'];
  switch ($page){

    case 'banner':
      include "modul/banner/data.php";
      break;
    case 'addbanner':
      include "modul/banner/add.php";
      break;
    case 'editbanner':
        include "modul/banner/edit.php";
        break;
    case 'deletebanner':
        include "modul/banner/delete.php";
        break;


    case 'packages':
      include "modul/packages/data.php";
      break;
    case 'addpackages':
      include "modul/packages/add.php";
      break;
    case 'editpackages':
        include "modul/packages/edit.php";
        break;
    case 'deletepackages':
        include "modul/packages/delete.php";
        break;

    case 'booking':
      include "modul/booking/data.php";
      break;
    case 'addbooking':
      include "modul/booking/add.php";
      break;
    case 'update':
        include "modul/booking/update.php";
      break;
      case 'delete':
        include "modul/booking/delete.php";
      break;

      case 'ulasan':
      include "modul/ulasan/data.php";
      break;
    case 'addulasan':
      include "modul/ulasan/add.php";
      break;
      case 'deleteulasan':
        include "modul/ulasan/delete.php";
        break;

    case 'logout':
        include "modul/logout.php";
        break;
      default:
      break;
  }

  ?>
  <!-- Footer -->
  <footer class="footer">
    &copy; Jelajahi dunia bersama Travlio — kemudahan berwisata ada di ujung jari Anda.
  </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php } ?>