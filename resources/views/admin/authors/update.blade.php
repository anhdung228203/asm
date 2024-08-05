<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Update
            </h6>
        </div>
        <div class="card-body">

            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['errors'])) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($_SESSION['errors'] as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php unset($_SESSION['errors']); ?>
            <?php endif; ?>
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Update an authors!</h1>
                        </div>
                        <form class="user" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="text" class="form-control " id="name" name="name" placeholder="Name" value="<?= $authors['name'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label for="name" class="form-label">Avatar:</label>
                                    <input type="file" class="form-control" id="avatar" name="avatar" >
                                    <img src="<?=BASE_URL. $authors['avatar'] ?>" alt="" width="100px">
                                </div>
                            </div>
                           
                            <div class="text-center form-group">
                                <button class="btn btn-primary btn-user col-3">Submit</button>
                                <a href="<?= BASE_URL_ADMIN ?>?act=authors" class="btn btn-danger btn-user col-3 ">Black Frist</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>