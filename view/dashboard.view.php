


<?php 

    $session=$_SESSION['user'][0];
    
?> 
<!-- extends header -->
<?php require("view/components/header.view.php") ?>



<div class="container-md container-fluid mt-3 mb-5">
    <div class="mb-5 col-12 d-flex justify-content-between align-items-center">
        <div class="header">
            <h1>
                User List
            </h1>
        </div>
        <div class="btn">
            <form action="/logout" method="POST">
                <button type="submit" class="btn btn-danger">Log Out</button>
            </form>
        </div>
    </div>
    <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <div class="m-1">
                        <form class="d-flex" role="search" action="">
                            <input class="form-control me-2" type="search" name="search" placeholder="Search" value="<?= isset($_REQUEST['search'])? $_REQUEST['search']:'' ?>" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="m-1">
                        <button class="btn btn-secondary dropdown-toggle text-capitalize" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $page??'All Users' ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/">All Users</a></li>
                            <li><a class="dropdown-item" href="/admins">Admin</a></li>
                            <li><a class="dropdown-item" href="/moderators">Moderator</a></li>
                            <li><a class="dropdown-item" href="/users">User</a></li>
                        </ul>
                    </div>
                </div>
                <?php  if(isset($_REQUEST['search'])): ?>
                    <a href="?" class="btn btn-secondary">
                        clear search="<?= $_REQUEST['search'] ?>"
                    </a>
                <?php endif ?>
            <table class="table table-border border table-striped table-hove table-responsive-md">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">Address</th>
                    <th scope="col">role</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        echo count($data)==0 ? '<td colspan="6" class="text-center">There is no user to Show</td>':" ";
                        foreach ($data as $d ):
                    ?>
                    <tr>
                        <th scope="row"><?= $d->id ?></th>
                        <td><?= $d->name ?></td>
                        <td><?= $d->email ?></td>
                        <td><?= $d->address ?? "not filled" ?></td>
                        <td class="
                            <?= $d->role_name ==='admin' ?'text-success': ' ' ?>
                            <?= $d->role_name ==='moderator' ?'text-warning': ' ' ?>
                        ">
                            <?= $d->role_name ?>
                        </td>
                        <?php if($d->id != $session->id): ?>
                        <td>
                            <a href="" class="btn btn-sm  btn-primary p-2">Edit</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $d->id ?>">
                            Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal<?= $d->id ?>" tabindex="-1" aria-labelledby="deleteModal<?= $d->id ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5  text-danger" id="deleteModal">Attention !!</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        .Are you sure to delete user,<?=  $d->name  ?>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="user/delete" method="POST">
                                            <input type="hidden" name="userId" value="<?= $d->id ?>">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <?php else: ?>
                            <td>###</td>
                        <?php endif ?>
                    </tr>
                    <tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="card" style="width: 100%;">
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h3 class="card-title ">My Profile </h3>
                        <span class="badge text-bg-success ms-2"><?= $session->role===2? "Admin":'Moderator' ?></span>
                    </div>
                    <form action="/admin/update/data" method="POST">
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
                            <input type="text" name="name" class="form-control" id="name" value="<?= $session->name ?>">
                            <?php if(error('name')): ?>
                                <span class="text-danger">* Name require</span>
                            <?php endif ?>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?= $session->email ?>">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            <?php if(error('email')): ?>
                                <span class="text-danger">* Email require</span>
                            <?php endif ?>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" id="name" value="<?php ?>" >
                        </div>

                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                  
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>








<?php require("view/components/footer.view.php") ?> 

