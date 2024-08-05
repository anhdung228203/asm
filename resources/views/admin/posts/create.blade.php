<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Creates
            </h6>
        </div>
        <div class="card-body">

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
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an authors!</h1>
            </div>
            <!-- Nested Row within Card Body -->
            <form class="user" action="" method="POST" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-6">
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="title" class="form-label">Title:</label>
                                <input type="text" class="form-control " id="title" name="title" placeholder="title" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['title'] : null ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="excerpt" class="form-label">Excerpt:</label>
                                <textarea class="form-control" id="" rows="8" name="excerpt" id="excerpt"><?= isset($_SESSION['data']) ? $_SESSION['data']['excerpt'] : null ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="img_thumnail" class="form-label">Img_Thummail:</label>
                                <input type="file" class="form-control" id="img_thumnail" name="img_thumnail">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="img_cover" class="form-label">Img_Cover:</label>
                                <input type="file" class="form-control" id="img_cover" name="img_cover">
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="category_id" class="form-label">Category:</label>
                                <select name="category_id" id="category_id" class="form-control ">
                                    <?php foreach ($categories as $category) : ?>

                                        <option <?= isset($_SESSION['data']) && $_SESSION['data']['category_id'] == $category['id']  ? 'selected' : null ?>value="<?=$category['id']?>"><?= $category['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="author_id" class="form-label">Author:</label>
                                <select name="author_id" id="author_id" class="form-control ">
                                    <?php foreach ($authors as $author) : ?>

                                        <option <?= isset($_SESSION['data']) && $_SESSION['data']['author_id'] == $author['id'] ? 'selected' : null ?> value="<?=$author['id']?>"><?= $author['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="name" class="form-label">Tags:</label>
                                <select name="tags[]" id="tags" class="form-control " multiple>
                                    <?php foreach ($tags as $tag) : ?>

                                        <option value="<?=$tag['id']?>"><?= $tag['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="status" class="form-label">Status:</label>
                                <select name="status" id="status" class="form-control ">
                                    <option <?= isset($_SESSION['data']) && $_SESSION['data']['status'] == STATUS_DRAFT ? 'selected' : null ?> value="<?= STATUS_DRAFT ?>"><?= ucfirst(STATUS_DRAFT) ?></option>
                                    <option <?= isset($_SESSION['data']) && $_SESSION['data']['status'] == STATUS_PUBLISHED ? 'selected' : null ?> value="<?= STATUS_PUBLISHED ?>"><?= ucfirst(STATUS_PUBLISHED) ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="is_trending" class="form-label">Is_trending:</label>
                                <select name="is_trending" id="is_trending" class="form-control ">
                                    <option <?= isset($_SESSION['data']) && $_SESSION['data']['is_trending'] == 0 ? 'selected' : null ?> value="0">No</option>
                                    <option <?= isset($_SESSION['data']) && $_SESSION['data']['is_trending'] == 1 ? 'selected' : null ?> value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="content" class="form-label">Content:</label>
                        <textarea id="content" name="content">
                        <?= isset($_SESSION['data']) ? $_SESSION['data']['content'] : null ?>
                        </textarea>
                    </div>
                </div>
                <div class=" form-group">
                    <button class="btn btn-primary btn-user ">Submit</button>
                    <a href="<?= BASE_URL_ADMIN ?>?act=posts" class="btn btn-danger btn-user  ">Black Frist</a>
                </div>
            </form>
        </div>
    </div>

</div>

<?php if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
} ?>