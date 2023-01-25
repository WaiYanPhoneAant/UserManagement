<?php $session=$_SESSION['user'][0];?> 

<?php require("view/components/header.view.php") ?>


<div class="col-12 col-md-5 col-lg-3 pt-5 m-auto">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title text-center mb-5">User Profile</h5>
            <div class="mb-4">
                <h6 class="card-subtitle mb-2 text-muted">Name - <span class="text-primary"><?= $session->name ?></span></h6>
            </div>
            <div class="mb-4">
                <h6 class="card-subtitle mb-2 text-muted">Email -<span class="text-primary"><?= $session->email ?></span></h6>
            </div>
            <div class="mb-4">
                <h6 class="card-subtitle mb-2 text-muted">Address - <span class="text-primary"><?= $session->address ?></span></h6>
            </div>
            <a href="/user/profile/update/page" class="btn btn-sm btn-success ">Update Data</a>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="/password/update/page" class="card-link ">Forget Password</a>
            <form action="../logout" method="POST">
                <button type="submit" class="btn btn-link text-danger">Log Out</button>
            </form>
        </div>
    </div>
</div>

<?php require("view/components/footer.view.php") ?> 