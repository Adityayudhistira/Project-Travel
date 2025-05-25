<style>
.btn-login {
  background-color: #F35A00; /* warna oranye dari logo */
  color: white;
  text-decoration:none;
  padding: 10px 20px;
  border: none;
  border-radius: 8px;
  font-size: 16px;
}
.btn-login:hover {
  background-color: #d94f00; /* warna oranye gelap saat hover */
}
</style>

<!--navbar-->

<div class="text-center">
  <img src="asset/img/logo.png" width="130px">
</div>
<nav class="navbar navbar-expand-sm ">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tour">Tours</a>
        </li>
      </ul>
      <form class="d-flex">
      <a href="login.php" class="btn-login">Login</a>
      </form>
    </div>
  </div>
</nav>