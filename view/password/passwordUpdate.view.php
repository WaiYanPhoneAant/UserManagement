
<!-- extends header -->
<?php
 require("view/components/header.view.php"); 
    $session=$_SESSION['user'][0];
?>



<div class="col-12 col-md-6 col-lg-4 m-auto ">
    <div class="card mt-5" style="width: 100%;">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <a href="/" class="btn btn-secondary">Back</a>
                <h3 class="card-title text-primary">Reset Password </h3>
            </div>
            <form action="/password/update" method="POST">
                <?php csrfCheck::active(); ?>
                <div class="mb-3">
                    <label for="oldPassword" class="form-label">old password</label>
                    <input type="password" name="oldPassword" class="form-control" id="oldPassword" value="">
                    <?php if(error('oldPassword')): ?>
                        <span class="text-danger">* old password require</span>
                    <?php endif ?>
                    <?php if(error('oldPwWrong')): ?>
                        <span class="text-danger">* Password Wrong!</span>
                    <?php endif ?>
                </div>
                <div class="mb-3">
                    <label for="newPassword" class="form-label">new password</label>
                    <input type="password" name="newPassword" class="form-control" id="newPassword" value="">
                    <?php if(error('newPassword')): ?>
                        <span class="text-danger">* new password require</span>
                    <?php endif ?>
                    <?php if(error('notMatch')): ?>
                        <span class="text-danger">* Two Password must be same</span>
                    <?php endif ?>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">confirm password</label>
                    <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" value="">
                    <?php if(error('confirmPassword')): ?>
                        <span class="text-danger">* confirm password require</span>
                    <?php endif ?>
                </div>
                <button type="submit" class="btn btn-primary">
                    Reset Password
                </button>

            </form>
        </div>
    </div>
</div>





<?php require("view/components/footer.view.php") ?> 