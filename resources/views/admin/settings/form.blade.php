<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>
        <br>

    </h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Save
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
                <form action="<?=BASE_URL_ADMIN.'?act=setting-save' ?>" method="POST">
                    <table class="table "  width="100%" cellspacing="0">
                        <tr>
                            <th>Trường Dữ Liệu</th>
                            <th>Dữ Liệu</th>
                        </tr>

                        <tr>
                            <td>Logo</td>
                            <td>
                                <input type="text" class="form-control" name="logo" id="logo" value="<?= $settings['logo'] ?? null ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Overview</td>
                            <td>
                               
                                <textarea class="form-control" name="overview" id="overview" cols="30" rows="2"><?= $settings['overview'] ?? null ?></textarea>

                            </td>
                        </tr>

                        <tr>
                            <td>Link Twitter</td>
                            <td>
                               
                            <input type="text" class="form-control" name="twitter" id="twitter" value="<?= $settings['twitter'] ?? null ?>">

                            </td>
                        </tr>

                        <tr>
                            <td>Link Facebook</td>
                            <td>
                               
                            <input type="text" class="form-control" name="facebook" id="facebook" value="<?= $settings['facebook'] ?? null ?>">

                            </td>
                        </tr>

                        <tr>
                            <td>Link Intagram</td>
                            <td>
                               
                            <input type="text" class="form-control" name="intagram" id="intagram" value="<?= $settings['intagram'] ?? null ?>">

                            </td>
                        </tr>
                    </table>
              

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?= BASE_URL_ADMIN ?>?act=posts" class="btn btn-danger">Back to list</a>
                </form>
            </div>
        </div>
    </div>
</div>