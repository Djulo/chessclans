<?php require 'partials/header.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-body">
          <h5 class="card-title text-center">Register</h5>
          <form class="form-signin" method="POST" action="signup">
            <div class="form-label-group">
              <input name="username" type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
              <label for="inputUsername">Username</label>
              <p class="ml-1 mt-1"><?php if(isset($result['username'])){ echo $result['username']; }?></p>
            </div>

            <div class="form-label-group">
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
              <label for="inputEmail">Email</label>
              <p class="ml-1 mt-1"><?php if(isset($result['email'])){ echo $result['email']; }?></p>
            </div>

            <div class="form-label-group">
              <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
              <label for="inputPassword">Password</label>
              <p class="ml-1 mt-1"><?php if(isset($result['password'])){ echo $result['password']; }?></p>
            </div>

            <div class="form-label-group">
              <input name="confirm" type="password" id="inputConfirmation" class="form-control" placeholder="Confirm" required>
              <label for="inputConfirmation">Confirm password</label>
              <p class="ml-1 mt-1"><?php if(isset($result['confirm'])){ echo $result['confirm']; }?></p>
            </div>

            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign up</button>
            <a href="signin"><label class="mt-3  ml-1">Sign in instead</label></a>
            <!-- <hr class="my-4">
            <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign up with Google</button>
            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign up with Facebook</button> -->
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require 'partials/footer.php'; ?>