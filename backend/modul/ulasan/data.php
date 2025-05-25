    <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Komentar</th>
        <th>Action</th>
            </tr>
          </thead>
          <?php 
            $no= 1;
              $sqlOut = $conn->prepare("SELECT*FROM ulasan");
              $sqlOut->execute();
              foreach ($sqlOut as $row) {
                ?>
            <tr>
        <td><?=$no++?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['komentar'] ?></td>
        <td>
            <a href="?page=deleteulasan&id_ulasan=<?=$row['id_ulasan']?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
        </td>
    </tr>
    <?php
     }
    ?>
        </table>
    </div>
<!-- ini show data pas user abis booking dari form-->