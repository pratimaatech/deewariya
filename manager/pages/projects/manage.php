<!-- Begin Page Content -->
<div class="container-fluid">

   <form method="post" action="action/info-manage.php" enctype="multipart/form-data">

    <h1 class="h3 mb-3 text-gray-800">
        <?= $page_title ?>
    </h1>

    <div class="row">

        <!-- LEFT SIDE -->
        <div class="col-md-3">

            <!-- PROJECT IMAGE -->
            <div class="card shadow mb-4">
                <div class="card-body">

                    <?php if (isset($data) && !empty($data['image'])) { ?>
                        <img
                            src="<?= SITE_URL . 'images/projects/' . $data['image'] ?>"
                            class="img-fluid rounded mb-2"
                            alt="Project Image">

                        <label class="d-block">
                            <input type="checkbox" name="isRemoveImage">
                            Remove Image
                        </label>
                    <?php } else { ?>
                        <img
                            src="<?= SITE_URL . 'images/no-image.png' ?>"
                            class="img-fluid rounded mb-2"
                            alt="No Image">
                    <?php } ?>

                    <label class="form-label mt-3">Artwork Image</label>

                    <input
                        type="file"
                        class="form-control"
                        name="image"
                        accept="image/*">

                    <?php if (isset($data) && !empty($data['image'])) { ?>
                        <input
                            type="hidden"
                            name="prev_image"
                            value="<?= $data['image'] ?>">
                    <?php } ?>

                </div>
            </div>

            <!-- PROJECT STATUS -->
            <div class="card shadow mb-4">
                <div class="card-body">

                    <div class="form-group mb-3">
                        <label class="form-label">Status</label>

                        <select name="fields[status]" class="form-control">
                            <option value="Completed"
                                <?= isset($data) && $data['status'] == 'Completed' ? 'selected' : '' ?>>
                                Completed
                            </option>

                            <option value="Ongoing"
                                <?= isset($data) && $data['status'] == 'Ongoing' ? 'selected' : '' ?>>
                                Ongoing
                            </option>

                            <option value="Coming Soon"
                                <?= isset($data) && $data['status'] == 'Coming Soon' ? 'selected' : '' ?>>
                                Coming Soon
                            </option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Featured Artwork</label>

                        <select name="fields[is_featured]" class="form-control">
                            <option value="1"
                                <?= isset($data) && $data['is_featured'] == 1 ? 'selected' : '' ?>>
                                Yes
                            </option>

                            <option value="0"
                                <?= isset($data) && $data['is_featured'] == 0 ? 'selected' : '' ?>>
                                No
                            </option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Display Order</label>

                        <input
                            type="number"
                            class="form-control"
                            name="fields[sort_order]"
                            value="<?= isset($data) ? $data['sort_order'] : '0' ?>">
                    </div>

                </div>
            </div>

        </div>


        <!-- RIGHT SIDE -->
        <div class="col-md-9">

            <div class="card shadow mb-4">

                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Artwork Information
                    </h6>
                </div>

                <div class="card-body">

                    <input type="hidden" name="table" value="projects">

                    <?php if (isset($_GET['id'])) { ?>
                        <input
                            type="hidden"
                            name="id"
                            value="<?= $_GET['id'] ?>">
                    <?php } ?>


                    <!-- BASIC INFORMATION -->
                    <h5 class="text-primary mb-3">
                        Artwork Details
                    </h5>

                    <div class="row">

                        <!-- Artwork Name -->
                        <div class="col-md-8">
                            <div class="form-group mb-3">

                                <label class="form-label">
                                    Artwork / Project Name
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    name="fields[name]"
                                    value="<?= isset($data) ? $data['name'] : '' ?>"
                                    placeholder="e.g. The Heritage Wall"
                                    required>

                            </div>
                        </div>

                        <!-- Year -->
                        <div class="col-md-4">
                            <div class="form-group mb-3">

                                <label class="form-label">
                                    Year
                                </label>

                                <input
                                    type="number"
                                    class="form-control"
                                    name="fields[project_year]"
                                    value="<?= isset($data) ? $data['project_year'] : date('Y') ?>">

                            </div>
                        </div>

                    </div>


                    <!-- CATEGORY -->
                    <div class="form-group mb-3">

                        <label class="form-label">
                            Art Type / Category
                        </label>

                        <?php
                        $categories_query = $model->query(
                            "SELECT * FROM categories ORDER BY title ASC"
                        );
                        ?>

                        <select
                            name="fields[category]"
                            id="category"
                            class="form-control"
                            required>

                            <option value="">
                                -- Select Art Type --
                            </option>

                            <?php while ($cat = $model->fetch($categories_query)) { ?>

                                <option
                                    value="<?= htmlspecialchars($cat['title']) ?>"
                                    data-id="<?= $cat['id'] ?>"
                                    <?= (isset($data) && $data['category'] == $cat['title']) ? 'selected' : '' ?>>

                                    <?= htmlspecialchars($cat['title']) ?>

                                </option>

                            <?php } ?>

                        </select>

                    </div>


                    <!-- SHORT DESCRIPTION -->
                    <div class="form-group mb-3">

                        <label class="form-label">
                            Short Description
                        </label>

                        <textarea
                            name="fields[short_description]"
                            class="form-control"
                            rows="3"
                            placeholder="Briefly describe the artwork, theme or concept..."><?= isset($data) ? $data['short_description'] : '' ?></textarea>

                    </div>


                    <hr>

                    <!-- PROJECT DETAILS -->
                    <h5 class="text-primary mb-3">
                        About the Artwork
                    </h5>

                    <div class="form-group mb-3">

                        <label class="form-label">
                            Artwork Story / Details
                        </label>

                        <textarea
                            name="fields[details]"
                            id="editor2"
                            class="form-control"><?= isset($data) ? $data['details'] : '' ?></textarea>

                        <script>
                            CKEDITOR.replace('editor2');
                        </script>

                    </div>


                    <hr>

                    <!-- CLIENT & LOCATION -->
                    <h5 class="text-primary mb-3">
                        Project Information
                    </h5>

                    <div class="row">

                        <!-- Client -->
                        <div class="col-md-4">
                            <div class="form-group mb-3">

                                <label class="form-label">
                                    Client
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    name="fields[client_name]"
                                    value="<?= isset($data) ? $data['client_name'] : '' ?>"
                                    placeholder="Client / Brand">

                            </div>
                        </div>

                        <!-- Location -->
                        <div class="col-md-4">
                            <div class="form-group mb-3">

                                <label class="form-label">
                                    Location
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    name="fields[location]"
                                    value="<?= isset($data) ? $data['location'] : '' ?>"
                                    placeholder="City / Place">

                            </div>
                        </div>

                        <!-- Duration -->
                        <div class="col-md-4">
                            <div class="form-group mb-3">

                                <label class="form-label">
                                    Duration
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    name="fields[duration]"
                                    value="<?= isset($data) ? $data['duration'] : '' ?>"
                                    placeholder="e.g. 12 Days">

                            </div>
                        </div>

                    </div>


                    <hr>

                    <!-- VIDEO -->
                    <h5 class="text-primary mb-3">
                        Project Video <small class="text-muted">(Optional)</small>
                    </h5>

                    <div class="form-group mb-3">

                        <input
                            type="url"
                            class="form-control"
                            name="fields[video_url]"
                            value="<?= isset($data) ? $data['video_url'] : '' ?>"
                            placeholder="https://www.youtube.com/...">

                    </div>


                    <!-- SAVE -->
                    <hr>

                    <div class="form-group text-right">

                        <input
                            type="submit"
                            value="Save Artwork"
                            class="btn btn-primary">

                    </div>

                </div>
            </div>

        </div>

    </div>

</form>


</div>