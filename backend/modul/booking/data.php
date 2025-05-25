    <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Checkin</th>
        <th>Checkout</th>
        <th>Harga</th>
        <th>Status</th>
        <th>Action</th>
            </tr>
          </thead>
          <?php 
            $no= 1;
              $sqlOut = $conn->prepare("SELECT*FROM booking");
              $sqlOut->execute();
              foreach ($sqlOut as $row) {
                ?>
            <tr>
        <td><?=$no++?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['checkin'] ?></td>
        <td><?= $row['checkout'] ?></td>
        <td><?= $row['harga'] ?></td>
        <td><?= $row['status'] ?></td>
        <td>
        <a href="?page=update&id_booking=<?= $row['id_booking'] ?>&status=accept" class="btn btn-success">Accept</a>
        <a href="?page=update&id_booking=<?= $row['id_booking'] ?>&status=cancel" class="btn btn-warning">Cancel</a>
        <a href="?page=delete&id_booking=<?=$row['id_booking']?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>


        </td>
    </tr>
    <?php }?>
        </table>
    </div>
<!-- ini show data pas user abis booking dari form-->