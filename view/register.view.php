<?php require("./view/components/header.view.php") ?>

<!-- register view -->
<div class="col-11 col-sm-8 col-md-5 mt-5 m-auto">

    <div class="header my-5">
        <h1>Register</h1>
    </div>
    <form method="POST" action="/register">
      <div class="mb-2">
        <?php if(error('duplicateEmail')): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Duplicated Email ! </strong> Email must not be same. 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif ?>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name">
        <?php if(error('name')): ?>
            <span class="text-danger">* Name require</span>
        <?php endif ?>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        <?php if(error('email')): ?>
            <span class="text-danger">* Email require</span>
        <?php endif ?>
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address" class="form-control" id="name" >
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password">
        <?php if(error('password')): ?>
            <span class="text-danger">* Password require</span>
        <?php endif ?>
      </div>
      <div class="mb-3 d-flex justify-content-between align-items-center">
        <button type="submit" class="btn btn-primary">Register</button>
        <a href="/loginPage">Login</a>
      </div>
    </form>
</div>
<?php require("./view/components/footer.view.php") ?>