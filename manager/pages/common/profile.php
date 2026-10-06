
<!-- Begin Page Content -->
    <div class="container-fluid">
      <div class="row">
        <?php if(!empty($data['image'])){ ?>
        <div class="col-md-2 offset-md-1 mb-4">
          <div class="card shadow">
            <div class="card-body">
              <img src="<?=SITE_URL?>images/admin/<?=$data['image']?>" alt="" class="img-fluid rounded">
            </div>
          </div>
        </div>
        <?php } ?>
        <div class="card col-md-8 shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?=$page_title?></h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
            <?php 
                if(isset($_SESSION['message'])){
                    echo '<div class="alert alert-success">'.$_SESSION['message'].'</div>';
                    unset($_SESSION['message']);
                }
            ?>

             <?php 
              if(isset($error)){
                  ?>
                  <div class="alert alert-danger alert-xs"><?=$error?></div>
                  <?php
                }
              ?>
              <form id="myform" method="post" action="action/profile.php" class="forms-sample" enctype="multipart/form-data">
                          
                          <input type="hidden" name="action" value="update_profile">
                          <input type="hidden" name="id" value="1">

                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="feild[name]" class="form-control p-input" value="<?=$data['name']?>" placeholder = "Enter title">

                          </div>

                          <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control p-input" name="username" value="<?=$data['username']?>" placeholder = "Enter title">

                          </div>

                          <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control p-input" name="feild[password]" placeholder = "Enter New password">

                          </div>

                          <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control p-input" name="feild[email]" value="<?=$data['email']?>" placeholder = "Enter title">

                          </div>


                      

                          <div class="form-group">
                            <div class="row">

                              <div class="col-sm-7">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control p-input">
                                <input type="hidden" name="prev_image" value="<?=$data['image']?>">

                              </div>
                            </div>
                          
                            <br>
                            <br>

                            <div class="text-right">

                                <input type="submit" class="btn btn-primary" value="Update Now">

                            </div>
                          </div>
              </form>
            </div>
        </div>
      </div>
    </div>
