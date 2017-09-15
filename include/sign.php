<?php
session_start();


include('header.php');

?>
  <div class="container">
  <div class="row">
  <div class="col-sm-6 col-md-4 col-md-offset-4">
  <h1 class="text-center login-title">Sign in to continue </h1>
  <div class="account-wall">
  <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
  alt="">

  <form class="form-signin" method="post" action="sign_manage.php">
  <input for="login" id="login" type="text" class="form-control" placeholder="Login" name="login" required autofocus>
  <input for="pass" id="pass" type="password" class="form-control" placeholder="Password" name="pass" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit">
  Sign in</button>

  </form>
  <?php
  //if seesion ErrorException
  if (isset($_SESSION['erreur']) ) {

    echo $_SESSION['erreur'];
    unset($_SESSION['erreur']);
  }
  ?>
  </div>
  </div>
  </div>
  </div>


<?php
include('footer.php');
 ?>
