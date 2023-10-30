<nav class="navbar">
  <div class="container-fluid">
    <!-- Logo -->
    <p class="navbar-brand mb-0 h1 logo">Qu<span>easy</span></p>
    <!-- Navbar items -->
    <ul class="nav" id="navbarList">
      <li class="nav-item">
        <a class="nav-link active mx-2" aria-current="page" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link mx-2" href="#">About us</a>
      </li>
      <?php if(!isset($_SESSION["login"])) : ?>
      <li class="nav-item" id="dropdownItem">
        <a href="login.php"><button type="button" class="btn btn-warning ms-4 me-3 btnlogin">Login</button></a>
      </li>
      <?php endif?>
      <?php if(isset($_SESSION["login"])) : ?>
        <li class="nav-item">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle rounded-5 bg-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user" style="color: #fcc822;"></i>
          </button>
          <ul class="dropdown-menu">
            <li class="dropdown-item"><?php echo $_SESSION["username"]; ?></li>
            <li><a class="dropdown-item" href="profile.php">Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a href="logout.php"><button type="button" class="dropdown-item text-decoration-none">Logout</button></a></li>
          </ul>
        </div>
      </li>
      <?php endif?>
    </ul>
  </div>
</nav>