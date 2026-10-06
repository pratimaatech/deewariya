<div class="container-fluid">
    <form method="post" action="action/info-manage.php">
        <h1 class="h3 mb-3 text-gray-800"><?= $page_title ?></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <input type="hidden" name="table" value="categories">
                        <?php if (isset($_GET['id'])) { ?>
                            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <?php } ?>

                        <div class="form-group mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" value="<?= (isset($data) ? $data['title'] : '') ?>" name="fields[title]" required>
                        </div>

                        <div class="form-group text-right">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

