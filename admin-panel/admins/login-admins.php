<?php require "../layouts/headers.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 

  if(isset($_SESSION["admin_name"])) {
    header("location: ".ADMURL."");
  }

 if(isset($_POST["submit"])) {
    if(empty($_POST["email"] OR empty($_POST["password"]))) {
      echo "<script>alert('one or more inputs are empty')</script>";
    } else {
      $email = $_POST["email"];
      $password = $_POST["password"];

      $login = $conn->query("SELECT * FROM admins WHERE email='$email'");
      $login->execute();

      $fetchUser = $login->fetch(PDO::FETCH_ASSOC);

      if($login->rowCount() > 0) {
        if(password_verify($password, $fetchUser['password'])) {
          $_SESSION['admin_name'] = $fetchUser['admin_name'];
          $_SESSION['email'] = $fetchUser['email'];
          $_SESSION['admin_id'] = $fetchUser['id'];

          header("location: ".ADMURL."");
        } else {
          echo "<script>alert('email or password is wrong')</script>";
        }
      } else {
        echo "<script>alert('email or password is wrong')</script>";
      }
    }
  }
?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mt-5">Login</h5>
        <form method="POST" class="p-auto" action="./login-admins.php">
          <div class="form-outline mb-4">
            <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
          </div>

          <div class="form-outline mb-4">
            <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
          </div>

          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>
        </form>
      </div>
  </div>
</div>

<?php require "../layouts/footer.php"; ?>