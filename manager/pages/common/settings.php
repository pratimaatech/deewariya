<section class="content-header">

  <div class="header-title">
    <h1>Settings</h1>
    <small>Sidebar Settings</small>
  </div>
</section>


<?php if (isset($id) && $id = 2) {
  ?>
  <section class="content">
    <div class="panel lobidisable panel-bd">
      <div class="panel-heading">
        <div class="panel-title">
          <h4>Sidebar Settings</h4>
        </div>
      </div>
      <div class="panel-body">

        <form id="myform" method="post" action="action/management.php" class="forms-sample" enctype="multipart/form-data">

          <input type="hidden" name="table" value="settings">
          <input type="hidden" name="return" value="<?= $return ?>">
          <input type="hidden" name="id" value="2">
          <div class="form-group">
            <label>Video Title</label>
            <input type="text" class="form-control p-input" name="feild[website_name]" value="<?= $data['website_name'] ?>"
              placeholder="Enter title">

          </div>
          <div class="form-group">
            <label>Video Url</label>
            <textarea class="form-control p-input" name="feild[address]"><?= $data['address'] ?></textarea>

          </div>



          <div class="form-group">
            <br>
            <br>

            <div class="text-right">

              <input type="submit" name="" class="btn btn-primary" value="Update Now">

            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="panel lobidisable panel-bd">
      <div class="panel-heading">
        <div class="panel-title">
          <h4>Live TV Settings</h4>
        </div>
      </div>
      <div class="panel-body">

        <form id="myform" method="post" action="action/management.php" class="forms-sample" enctype="multipart/form-data">

          <input type="hidden" name="table" value="settings">
          <input type="hidden" name="return" value="<?= $return ?>">
          <input type="hidden" name="id" value="2">
          <div class="form-group">
            <label>Subtitle</label>
            <textarea class="form-control" name="feild[map]"><?= $data['map'] ?></textarea>
            <input type="hidden" name="feild[soc4]" value="">
          </div>



          <div class="form-group">
            <br>
            <br>

            <div class="text-right">

              <input type="submit" name="" class="btn btn-primary" value="Update Now">

            </div>
          </div>
        </form>
      </div>
    </div>
  </section>


  <section class="content">
    <div class="panel lobidisable panel-bd">
      <div class="panel-heading">
        <div class="panel-title">
          <h4>Main Banner</h4>
        </div>
      </div>
      <div class="panel-body">

        <form id="myform" method="post" action="action/management.php" class="forms-sample" enctype="multipart/form-data">

          <input type="hidden" name="table" value="settings">
          <input type="hidden" name="return" value="<?= $return ?>">
          <input type="hidden" name="id" value="2">

          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control p-input" name="feild[website_title]"
              value="<?= $data['website_title'] ?>" placeholder="Enter title">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-5">
                <img src="<?= SITE_URL ?>images/settings/<?= $data['logo'] ?>" alt="" height="100" class="img-responsive">
              </div>
              <div class="col-sm-6">
                <label>Banner</label>
                <input type="file" name="logo" class="form-control p-input">
                <input type="hidden" name="prev_logo" value="<?= $data['logo'] ?>">

              </div>
            </div>

          </div>



          <div class="form-group">
            <br>
            <br>

            <div class="text-right">

              <input type="submit" name="" class="btn btn-primary" value="Update Now">

            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

  <?php
} else { ?>

  <section class="content">
    <div class="panel lobidisable panel-bd">
      <div class="panel-heading">
        <div class="panel-title">
          <h4>Web Settings</h4>
        </div>
      </div>
      <div class="panel-body">
        <form id="myform" method="post" action="action/management.php" class="forms-sample" enctype="multipart/form-data">
          <input type="hidden" name="table" value="settings">
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


            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Phone No 1</label>
                  <input type="text" class="form-control p-input" name="feild[phone1]" value="<?= $data['phone1'] ?>"
                    placeholder="Enter Phone No 1">

                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Phone No 2</label>
                  <input type="text" class="form-control p-input" name="feild[phone2]" value="<?= $data['phone2'] ?>"
                    placeholder="Enter Phone No 2">

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Display Email 1</label>
                  <input type="text" class="form-control p-input" name="feild[email1]" value="<?= $data['email1'] ?>"
                    placeholder="Enter Email 1">

                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Display Email 2</label>
                  <input type="text" class="form-control p-input" name="feild[email2]" value="<?= $data['email2'] ?>"
                    placeholder="Enter Email 2">
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
                  <input type="text" class="form-control p-input" name="feild[soc1]" value="<?= $data['soc1'] ?>"
                    placeholder="Enter Facebook Page Link">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>G-Plus Link</label>
                  <input type="text" class="form-control p-input" name="feild[soc2]" value="<?= $data['soc2'] ?>"
                    placeholder="Enter Google-Plus Page Link">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Twitter Link</label>
                  <input type="text" class="form-control p-input" name="feild[soc3]" value="<?= $data['soc3'] ?>"
                    placeholder="Enter Twitter Page Link">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Linked in Link</label>
                  <input type="text" class="form-control p-input" name="feild[soc4]" value="<?= $data['soc4'] ?>"
                    placeholder="Enter Linkedin Page Link">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Youtube Link</label>
                  <input type="text" class="form-control p-input" name="feild[soc5]" value="<?= $data['soc5'] ?>"
                    placeholder="Enter Twitter Page Link">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>RSS in Link</label>
                  <input type="text" class="form-control p-input" name="feild[soc6]" value="<?= $data['soc6'] ?>"
                    placeholder="Enter Linkedin Page Link">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-5">
                      <img src="<?= SITE_URL ?>images/settings/<?= $data['logo'] ?>" alt="" height="100"
                        class="img-responsive">
                    </div>
                    <div class="col-sm-6">
                      <label>Logo</label>
                      <input type="file" name="logo" class="form-control p-input">
                      <input type="hidden" name="prev_logo" value="<?= $data['logo'] ?>">

                    </div>
                  </div>

                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <div class="col-sm-5">
                    <img src="<?= SITE_URL ?>images/settings/<?= $data['favicon'] ?>" alt="" height="100"
                      class="img-responsive">
                  </div>
                  <div class="col-sm-7">
                    <label>Favicon</label>
                    <input type="file" name="favicon" class="form-control p-input">
                    <input type="hidden" name="prev_fav" value="<?= $data['favicon'] ?>">
                  </div>
                </div>
              </div>
            </div>

            <hr>
            <div class="form-group">
              <button type="submit" class="btn btn-add"><i class="fa fa-check"></i> Submit
              </button>
            </div>
        </form>
      </div>
    </div>
  </section>


<?php } ?>