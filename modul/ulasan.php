<style>
.btn-ulasan {
  background-color: #F35A00;
  color: white ;
  display: inline-block ;
  font-size: 20px ;
  padding: 20px ;
  border: none;
  text-decoration:none;
}

.btn-ulasan:hover {
  background-color: #d94f00; /* warna oranye gelap saat hover */
}
</style>

<div class="container mt-5">
  <h3 class="mb-4">What our customers say</h3>
  <div class="row">

 <?php
              $no = 1;
              $sqlOut = $conn->prepare("SELECT*FROM ulasan");
              $sqlOut->execute();
              foreach ($sqlOut as $row) {
              ?>

    <div class="col-md-3 mb-4"> <!-- col lg 4 biar mentok nya di  bagi 3-->
      <div class="border p-3 rounded">
        <div class="d-flex align-items-center mb-2">
            <h6><?=$row['nama']?></h6>
        </div>
        <p><?=$row['komentar']?></p>
        
      </div>
    </div>

<?php
}
?>
    <div class="col-12 mt-3">
  <a href="modul/formulasan.php" class="btn-ulasan rounded">
    <i class="fas fa-arrow-right me-1"></i> Give a Review
  </a>
</div>

  
  </div><!-- row-->
</div><!--container-->
