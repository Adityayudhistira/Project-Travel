<!-- Dashboard Heading -->
<div class="mt-4">
      <h2 class="mb-4">Kelola Packages</h2>
      <a href="?page=addpackages" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Packages</a>

      <!-- Table -->
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Image Packages</th>
              <th>Judul</th>
              <th>Description</th>
              <th>Harga</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no= 1;
              $sqlOut = $conn->prepare("SELECT*FROM packages");
              $sqlOut->execute();
              foreach ($sqlOut as $row) {
                ?>
            <tr>
              <td><?=$no++?></td>
              <td><img src="../gbrpackages/<?=$row['image']?>" class="img-thumbnail" style="width: 100px;"></td>
              <td><?=$row['judul']?></td>
              <td><?=$row['description']?></td>
              <td><?=$row['harga']?></td>
              <td>
  <div class="d-flex gap-2"> <!-- gap fungsinya nambahin spasi antar elemen-->
    <a href="?page=editpackages&id_packages=<?=$row['id_packages']?>" class="btn btn-warning btn-sm">
      <i class="fas fa-edit"></i> Edit
    </a>
    <a href="?page=deletepackages&id_packages=<?=$row['id_packages']?>" class="btn btn-danger btn-sm">
      <i class="fas fa-trash"></i> Delete
    </a>
  </div>
</td>

            </tr>
                <?php
              }
            ?>
            
            
          </tbody>
        </table>
      </div>
    </div>