<?php
session_start();

// Kapcsolódás az adatbázishoz
include("../../database/database.php");

$user = null;

// Ha van bejelentkezett felhasználó
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM Accounts WHERE username = '$username'";
    $result = mysqli_query($connect, $sql);
    $user = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - szilyProjekt</title>
    <link rel="stylesheet" href="main_style.css">
</head>
<body>
    <h1>Welcome, <?php echo $user['username']; ?>!</h1>
    <a href="../pages/main/index.php">Go back to Home</a> -->
    <!-- start: 2024. 01.20 -->
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="main_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>szilyProjekt</title>
    <script>

//register

$(document).ready(function() {
    $("#registerForm").submit(function(event) {
        event.preventDefault(); // Az alapértelmezett form elküldés megelőzése
        var username = $("#reg_username").val();
        var password = $("#reg_password").val();
        
        $.ajax({
            url: "../../database/register.php", // A PHP fájl, amely feldolgozza a regisztrációt
            type: "POST",
            data: {
                username: username,
                password: password
            },
            success: function(response) {
                $("#register_feedback").html(response); // Visszajelzés megjelenítése
            }
        });
    });
});

//login

$(document).ready(function() {
    $("#loginForm").submit(function(event) {
        event.preventDefault(); // Alapértelmezett form elküldés megakadályozása
        var username = $("#login_username").val();
        var password = $("#login_password").val();
        
        $.ajax({
            url: "../../database/login.php", // A PHP fájl, amely feldolgozza a bejelentkezést
            type: "POST",
            data: {
                username: username,
                password: password
            },
            success: function(response) {
                $("#login_feedback").html(response); // Visszajelzés megjelenítése
                window.location.reload();
            }
        });
    });
});

//logout

function logout() {
    $.ajax({
        url: "../../database/logout.php", // A logout.php fájl helye
        type: "POST",
        success: function(response) {
            location.reload(); // Az oldal újratöltése a kijelentkezés után
        }
    });
}

      </script>
</head>
<body>
  <!-- navbar, bejelentkezes, regisztracio -->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <div class="navbar-brand">
      <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
        <img src="../../images/img_avatar1.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
      </a>
      <ul class="dropdown-menu">
        <?php if (isset($_SESSION['username'])): ?>
          <li><a class="dropdown-item" href="../profiles/<?php echo mysqli_fetch_assoc(mysqli_query($connect, "SELECT id FROM Accounts WHERE id = 1"))['id']; ?>.php"><?php echo $_SESSION['username']; ?></a></li>
          <li id="logout_button" onclick="logout()"><a class="dropdown-item" href="../main/index.php">Kijelentkezés</a></li>
        <?php else: ?>
          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#bejelentkezes" role="button">Bejelentkezés</a></li>
          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#regisztracio" role="button">Regisztráció</a></li>
        <?php endif; ?>
      </ul>
    </div>
    <div class="mx-auto text-center">
      <a class="h1 text-white" href="../main/index.php" role="button" style="text-decoration: none;">szilyProjekt</a>
    </div>
  </div>
</nav>

</nav>

<p class="h1">szilyProjekt</p>
<h1><?php echo mysqli_fetch_assoc(mysqli_query($connect, "SELECT username FROM Accounts WHERE id = 1"))['username']; ?> profilja</h1>

<!-- regisztráció modal -->

<!-- The Modal -->
<div class="modal fade" id="regisztracio">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Regisztráció</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="was-validated" id="registerForm" action="../../database/register.php" method="POST">
          <div class="mb-3 mt-3">
            <div class="input-group mb-3">
              <span class="input-group-text">👤</span>
              <input type="text" class="form-control" id="reg_username" name="username" placeholder="Felhasználónév" required>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>  
          </div>
          <div class="mb-3">
            <div class="input-group mb-3">
              <span class="input-group-text">🔑</span>
              <input type="password" class="form-control" id="reg_password" name="password" placeholder="Jelszó" required>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
          </div>
          <div class="form-check mb-3">
              <label class="form-check-label">
                <input type="checkbox" name="remember" class="form-check-input"> Emlékezz rám
              </label>
          </div>
          
      <div id="register_feedback"></div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button id="regisztracio_button" class="btn btn-success" type="submit">Regisztráció</button>
      </div>
      </form>

    </div>
  </div>
</div>

<!-- login modal -->

<!-- The Modal -->
<div class="modal fade" id="bejelentkezes">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Bejelentkezés</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="was-validated" id="loginForm" action="../../database/login.php" method="POST">
          <div class="mb-3 mt-3">
            <div class="input-group mb-3">
              <span class="input-group-text">👤</span>
              <input type="text" class="form-control" id="login_username" name="username" placeholder="Felhasználónév" required>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
          </div>
          <div class="mb-3">
            <div class="input-group mb-3">
              <span class="input-group-text">🔑</span>
              <input type="password" class="form-control" id="login_password" name="password" placeholder="Jelszó" required>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>  
          </div>
          <div class="form-check mb-3">
              <label class="form-check-label">
                <input type="checkbox" name="remember" class="form-check-input"> Emlékezz rám
              </label>
          </div>
      <div id="login_feedback"></div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button id="bejelentkezes_button" class="btn btn-success" type="submit">Bejelentkezés</button>
      </div>
      </form>

    </div>
  </div>
</div>
</body>
</html>
</body>
</html>