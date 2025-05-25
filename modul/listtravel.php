<style>
.btn-book {
  background-color: #F35A00; /* warna oranye dari logo */
  color: white;
  text-decoration:none;
  padding: 10px 20px;
  border: none;
  border-radius: 8px;
  font-size: 16px;
}
.btn-book:hover {
  background-color: #d94f00; /* warna oranye gelap saat hover */
}
</style>


<div id="tour"></div><!--link tour yang di navbar-->

<div class="container">
  <h2 class="text-center fw-bold mb-5 pt-4">OUR TOUR PACKAGES</h2>
  <div class="row g-4">

 <?php
              $no = 1;
              $sqlOut = $conn->prepare("SELECT*FROM packages");
              $sqlOut->execute();
              foreach ($sqlOut as $row) {
              ?>

    <!-- Card 1 -->
    <div class="col-md-6 col-lg-4">
      <div class="card border-0 shadow-sm">
        <img src="gbrpackages/<?=$row['image']?>" class="rounded">
        <div class="card-body">
          <h5 class="fw-bold"><i class="text-success"><?=$row['judul']?></i></h5>
          <p class=""><?=$row['description']?></p>
          <p class=" fw-bold text-secondary"><?=$row['harga']?></p>
          <a href="backend/modul/booking/add.php?id_packages=<?= $row['id_packages'] ?>" class="btn-book"><i class="fas fa-arrow-right me-1"></i> Book Now</a>
        </div>
      </div>
    </div>
<?php
              }
          ?>
   

  </div>
</div>
