<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (Popper sudah include) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
// Ambil semua data banner dari database
$sqlOut = $conn->prepare("SELECT * FROM banner");
$sqlOut->execute();
$banners = $sqlOut->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if (count($banners) > 0): ?> <!--untuk nampilin data klo data >0 maka banner di munculin-->
<div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php foreach ($banners as $index => $row): ?> <!--$banners isi data dari tabel banner dan $index nomor urut dari 0-seterusnya dan $row isi data seperti image,heading dan description-->
        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>"> <!--klo index 0 hasilnya active  klo tidak $index berarti hasilnya kosong-->
            <img src="gbrbanner/<?= $row['image'] ?>" class="d-block w-100" alt="Banner">
            <div class="carousel-caption d-none d-md-block">
                <h5><?= $row['heading'] ?></h5>
                <p><?= $row['description'] ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Navigasi panah -->
    <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<?php endif; ?>
