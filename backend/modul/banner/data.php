<!-- Dashboard Heading -->
<div class="mt-4">
      <h2 class="mb-4">Kelola Banner</h2>
      <a href="?page=addbanner" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Banner</a>

      <!-- Table -->
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Image Banner</th>
              <th>Heading</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no= 1;
              $sqlOut = $conn->prepare("SELECT*FROM banner");
              $sqlOut->execute();
              foreach ($sqlOut as $row) {
                ?>
            <tr>
              <td><?=$no++?></td>
              <td><img src="../gbrbanner/<?=$row['image']?>" class="img-thumbnail" style="width: 100px;"></td>
              <td><?=$row['heading']?></td>
              <td><?=$row['description']?></td>
              <td>
  <div class="d-flex gap-2"> <!-- gap fungsinya nambahin spasi antar elemen-->
    <a href="?page=editbanner&id_banner=<?=$row['id_banner']?>" class="btn btn-warning btn-sm">
      <i class="fas fa-edit"></i> Edit
    </a>
    <a href="?page=deletebanner&id_banner=<?=$row['id_banner']?>" class="btn btn-danger btn-sm">
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