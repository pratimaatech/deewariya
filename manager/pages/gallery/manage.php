<!-- Begin Page Content -->
<div class="container-fluid">

    <form method="post" action="action/info-manage.php" enctype="multipart/form-data">

        <h1 class="h3 mb-3 text-gray-800"><?= $page_title ?></h1>

        <div class="row">

            <!-- Image Section -->
            <div class="col-md-2">

                <div class="card shadow mb-4">

                    <div class="card-body">

                        <?php if (isset($data) && !empty($data['image'])) { ?>

                            <img
                                src="<?= SITE_URL . 'images/gallery/' . $data['image'] ?>"
                                class="img-fluid rounded mb-2"
                                alt="<?= htmlspecialchars($data['name']) ?>"
                            >

                            <label>
                                <input type="checkbox" name="isRemoveImage">
                                Remove Image
                            </label>

                        <?php } else { ?>

                            <img
                                src="<?= SITE_URL . 'images/no-image.png' ?>"
                                class="img-fluid rounded mb-2"
                                alt="No Image"
                            >

                        <?php } ?>

                    </div>

                </div>

            </div>


            <!-- Form Section -->
            <div class="col-md-10">

                <div class="card shadow mb-4">

                    <div class="card-body">

                        <!-- Table -->
                        <input
                            type="hidden"
                            name="table"
                            value="gallery"
                        >

                        <!-- ID for Edit -->
                        <?php if (isset($_GET['id'])) { ?>

                            <input
                                type="hidden"
                                name="id"
                                value="<?= $_GET['id'] ?>"
                            >

                        <?php } ?>


                        <!-- Name -->
                        <div class="form-group mb-3">

                            <label class="form-label">
                                Name
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                name="fields[name]"
                                value="<?= isset($data) ? htmlspecialchars($data['name']) : '' ?>"
                            >

                        </div>


                        <!-- Designation -->
                        <div class="form-group mb-3">

                            <label class="form-label">
                                Designation
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                name="fields[designation]"
                                value="<?= isset($data) ? htmlspecialchars($data['designation']) : '' ?>"
                            >

                        </div>


                        <!-- Message -->
                        <div class="form-group mb-3">

                            <label class="form-label">
                                Message
                            </label>

                            <textarea
                                name="fields[details]"
                                id="editor2"
                                class="form-control"
                            ><?= isset($data) ? $data['details'] : '' ?></textarea>

                            <script>
                                CKEDITOR.replace('editor2');
                            </script>

                        </div>


                        <!-- Image -->
                        <div class="form-group mb-3">

                            <label class="form-label">
                                Image
                            </label>

                            <?php if (isset($data) && !empty($data['image'])) { ?>

                                <input
                                    type="hidden"
                                    name="prev_image"
                                    value="<?= $data['image'] ?>"
                                >

                                <input
                                    type="file"
                                    class="form-control"
                                    name="image"
                                >

                            <?php } else { ?>

                                <input
                                    type="file"
                                    class="form-control"
                                    name="image"
                                >

                            <?php } ?>

                        </div>



                        <!-- Submit -->
                        <div class="form-group text-right">

                            <input
                                type="submit"
                                class="btn btn-primary"
                                value="Submit"
                            >

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>