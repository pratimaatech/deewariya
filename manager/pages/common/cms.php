<section class="content-header">

   <div class="header-title">
      <h1><?=$page_title?></h1>
   </div>
</section>

 <section class="content">
   <div class="panel lobidisable panel-bd">
      <div class="panel-heading">
         <div class="panel-title">
            <h4><?=$page_title?></h4>
         </div>
      </div>
      <div class="panel-body">
                    <?php                     
                    if(isset($error)){
                        ?>
                        <div class="alert alert-danger alert-xs"><?=$error?></div>
                        <?php
                    }
                    ?>
                    <form id="myform" method="post" action="action/management.php" enctype="multipart/form-data">
                      
                      <input type="hidden" name="table" value="<?=$table?>">
                      <input type="hidden" name="id" value="<?=$id?>">
                      <input type="hidden" name="return" value="<?=$return?>">

                      <div class="form-group">
                        <label>Page Title</label>
                        <input type="text" name="feild[title]" class="form-control p-input" value="<?=$data['title']?>" placeholder = "Enter Page Title">

                      </div>

                      <div class="form-group">
                        <label>Page Details</label>
                        <textarea id="editor2" name="feild[details]"><?=$data['details']?></textarea>

                      </div>
                      
                      <script>
                        CKEDITOR.replace( 'editor2' );
                      </script>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-5">
                            <img src="<?=SITE_URL?>images/cms/<?=$data['image']?>" height="100" alt="" class="img-responsive">
                          </div>
                          <div class="col-sm-7">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control p-input">
                            <input type="hidden" name="prev_image" value="<?=$data['image']?>">

                          </div>
                        </div>
                      
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