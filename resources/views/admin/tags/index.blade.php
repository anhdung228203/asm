<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>
        <br>
        <a href="<?= BASE_URL_ADMIN ?>?act=tags-create" class="btn btn-primary">Create Tags</a>
    </h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                DataTables
            </h6>
        </div>
        <div class="card-body">

            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($tags as $tag) : ?>
                            <tr>
                                <td><?= $tag['id'] ?></td>
                                <td><?= $tag['name'] ?></td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=tags-deatil&id=<?= $tag['id'] ?>" class="btn btn-primary">Show</a>

                                    <a href="<?= BASE_URL_ADMIN ?>?act=tags-update&id=<?= $tag['id'] ?>" class="btn btn-warning">Update</a>

                                    <a href="<?= BASE_URL_ADMIN ?>?act=tags-delete&id=<?= $tag['id'] ?>" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>