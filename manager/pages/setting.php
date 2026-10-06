<div class="container-fluid">
    <section class="content-header">

        <div class="header-title">
            <h1>Settings</h1>
            <small>Sidebar Settings</small>
        </div>
    </section>

    <?php
    if (isset($_SESSION['message'])) {
        echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
    }
    ?>
    <div class="card shadow my-4">

        <div class="card-body">
            <form id="myform" method="post" action="action/setting.php" class="forms-sample"
                enctype="multipart/form-data">
                <input type="hidden" name="table" value="setting">
                <input type="hidden" name="id" value="1">

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Website Name</label>
                            <input type="text" name="feild[website_name]" class="form-control p-input"
                                value="<?= $data['website_name'] ?>" placeholder="Enter name">
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Website Title</label>
                                <input type="text" class="form-control p-input" name="feild[website_title]"
                                    value="<?= $data['website_title'] ?>" placeholder="Enter title">
                            </div>
                        </div>
                    </div>
                    <?php
                    $phone = json_decode($data['phone']);
                    $email = json_decode($data['email']);
                    $social_media = json_decode($data['social_media']);
                    ?>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone No 1</label>
                                <input type="text" class="form-control p-input" name="phone[]"
                                    value="<?= (!empty($phone) ? $phone[0] : '') ?>" placeholder="Enter Phone No 1">

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone No 2</label>
                                <input type="text" class="form-control p-input" name="phone[]"
                                    value="<?= (!empty($phone) ? $phone[1] : '') ?>" placeholder="Enter Phone No 2">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Display Email 1</label>
                                <input type="text" class="form-control p-input" name="email[]"
                                    value="<?= (!empty($email) ? $email[0] : '') ?>" placeholder="Enter Email 1">

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Display Email 2</label>
                                <input type="text" class="form-control p-input" name="email[]"
                                    value="<?= (!empty($email) ? $email[1] : '') ?>" placeholder="Enter Email 2">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control p-input" name="feild[address]"><?= $data['address'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Map</label>
                        <textarea class="form-control p-input" name="feild[map]"><?= $data['map'] ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Facebook Link</label>


                                <input type="text" class="form-control p-input" name="social_media[facebook]"
                                    value="<?= $social_media->facebook ?>" placeholder="Enter Facebook Page Link">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Instagram Link</label>
                                <input type="text" class="form-control p-input" name="social_media[instagram]"
                                    value="<?= $social_media->instagram ?>" placeholder="Enter Instagram Page Link">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Twitter Link</label>
                                <input type="text" class="form-control p-input" name="social_media[twitter]"
                                    value="<?= $social_media->twitter ?>" placeholder="Enter Twitter Page Link">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Linked in Link</label>
                                <input type="text" class="form-control p-input" name="social_media[linkedin]"
                                    value="<?= $social_media->linkedin ?>" placeholder="Enter Linkedin Page Link">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Youtube Link</label>
                                <input type="text" class="form-control p-input" name="social_media[youtube]"
                                    value="<?= $social_media->youtube ?>" placeholder="Enter Twitter Page Link">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <?php if (!empty($data['logo'])) { ?>
                                        <div class="col-sm-5">
                                            <img src="<?= SITE_URL ?>images/setting/<?= $data['logo'] ?>" alt="" height="100"
                                                class="img-responsive">
                                        </div>
                                    <?php } ?>
                                    <div class="col-sm-6">
                                        <label>Logo</label>
                                        <input type="file" name="logo" class="form-control p-input">
                                        <input type="hidden" name="prev_logo" value="<?= $data['logo'] ?>">

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <?php if (!empty($data['favicon'])) { ?>
                                    <div class="col-sm-5">
                                        <img src="<?= SITE_URL ?>images/setting/<?= $data['favicon'] ?>" alt="" height="100"
                                            class="img-responsive">
                                    </div>
                                <?php } ?>
                                <div class="col-sm-7">
                                    <label>Favicon</label>
                                    <input type="file" name="favicon" class="form-control p-input">
                                    <input type="hidden" name="prev_fav" value="<?= $data['favicon'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Submit </button>
                    </div>
            </form>
        </div>
        </section>
    </div>