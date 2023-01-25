
<!-- extends header -->
<?php require("view/components/header.view.php"); 
    $user=$data[0];
    $session=$_SESSION['user'][0];
?>



<div class="col-12 col-md-6 col-lg-4 m-auto ">
    <div class="card mt-5" style="width: 100%;">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <a href="/" class="btn btn-secondary">Back</a>
                <h3 class="card-title text-primary"><?= $user->name ?>'s Profile </h3>
            </div>
            <form action="
               <?= roleCheck($session->role,'admin')&&roleCheck($session->role,'admin')?
               '/admin/user/update':
               '/user/profile/update' ?>
            " method="POST">
                <div class="mb-2">
                    <?php if(error('duplicateEmail')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Duplicated Email ! </strong> Email must not be same. 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <?php if(error('success')): ?>

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Successfully Updated
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    <?php endif ?>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?= $user->name ?>">
                    <?php if(error('name')): ?>
                        <span class="text-danger">* Name require</span>
                    <?php endif ?>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?= $user->email ?>">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    <?php if(error('email')): ?>
                        <span class="text-danger">* Email require</span>
                    <?php endif ?>
                </div>
                <?php if(roleCheck($session->role,'admin')): ?>
                    <div class="mb-3">
                    <label for="role" class="form-label">Choose Role</label>
                    <select class="form-select" id="role" name="role" aria-label="Default select example">
                        <option value="0" <?= roleCheck($user->role,'user')?'selected':'' ?> >User</option>
                        <option  value="1" <?= roleCheck($user->role,'moderator')?'selected':'' ?>>Moderator</option>
                        <option value="2" <?= roleCheck($user->role,'admin')?'selected':'' ?>>Admin</option>
                    </select>
                    <?php if(error('role')): ?>
                            <span class="text-danger">* role require</span>
                    <?php endif ?>                    
                    </div>
                <?php endif ?>
                    <input type="hidden" name="userId" value="<?= $user->id ?>">
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="name" value="<?= $user->address ?>">
                </div>

                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">Update</button>
            
                </div>

            </form>
        </div>
    </div>
</div>





<?php require("view/components/footer.view.php") ?> 