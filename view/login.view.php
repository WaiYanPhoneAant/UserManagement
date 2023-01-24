<?php require("./view/components/header.view.php") ?>

<!-- login view -->
<div class="col-11 col-sm-8 col-md-5 mt-5 m-auto">

    <div class="header my-5">
        <h1>Login</h1>
    </div>

    <form method="POST" action="login">
      <div class="mb-2">
        
      <!-- error -->
        <?php if(error('error')): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Something Wrong!</strong> Credentials do not match!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif ?>
      </div>

      <!--registeriation success  -->
      <?php if(error('success')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Account Create Successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      <?php endif ?>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
      </div>
      <div class="mb-3 d-flex justify-content-between align-items-center">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/register/page">Create New Account</a>
      </div>
    </form>
</div>

<?php require("./view/components/footer.view.php") ?>