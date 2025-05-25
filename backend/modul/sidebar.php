<style>
body {
  background-color: #f8f9fa;
}
.sidebar {
  height: 100vh;
  width: 250px;
  background-color: #0c1a3c;
  color: #fff;
}
.sidebar a {
  color: #fff;
  text-decoration: none;
}
.sidebar a:hover {
  background-color: #1d2d50;
}
.sidebar .nav-link {
  padding: 12px 20px;
}
.sidebar .nav-link i {
  margin-right: 10px;
}

</style>
  <!-- Sidebar -->
<div class="sidebar d-flex flex-column p-3">
  <h4 class="text-white mb-4">Travlio</h4>
  <ul class="nav">
    <li><a href="index.php" class="nav-link"><i class="fas fa-home"></i> Dashboard</a></li>
    <li><a href="?page=banner" class="nav-link"><i class="fas fa-images"></i> Banner</a></li>
    <li><a href="?page=packages" class="nav-link"><i class="fas fa-images"></i> Packages</a></li>
    <li><a href="?page=booking" class="nav-link"><i class="fas fa-clipboard-list"></i> Booking</a></li>
    <li><a href="?page=ulasan" class="nav-link"><i class="fas fa-comment"></i> Commentar</a></li>
    <li><a href="?page=logout" class="nav-link text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
  </ul>
</div>