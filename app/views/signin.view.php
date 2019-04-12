<?php require 'partials/header.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-body">
          <h5 class="card-title text-center">Sign In</h5>
          <form class="form-signin" method="POST" action="signin">
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

            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input" id="customCheck1">
              <label class="custom-control-label" for="customCheck1">Remember password</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
            <hr class="my-4">
            <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require 'partials/footer.php'; ?>
