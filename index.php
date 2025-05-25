<?php
    include"lib/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Travlio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!--icon-->
  



</head>
<body>
<?php
        include "modul/navbar.php";
        include "modul/banner.php";
?>

<!--main content-->
<?php
        include "modul/thumbnail.php";
        include "modul/listtravel.php";
        include "modul/about.php";
        include "modul/ulasan.php";
        include "modul/footer.php";
?>

</body>
</html>


