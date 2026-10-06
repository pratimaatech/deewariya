<div class="container-fluid">
    <form method="post" action="action/info-manage.php" enctype="multipart/form-data">
        <h1 class="h3 mb-3 text-gray-800"><?=$page_title?></h1>
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow mb-4">
                    <div class="card-body text-center">
                    <?php if(isset($data) && $data['image']){ ?>
                        <img src="<?=SITE_URL.'images/banners/'.$data['image']?>" class="img-fluid rounded h-50 mb-2">
                        <label><input type="checkbox" name="isRemoveImage"> Remove Image</label>
                    <?php }else{ ?>
                        <img src="<?=SITE_URL.'images/no-image.png'?>" class="img-fluid rounded mb-2">
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        
                            <input type="hidden" name="table" value="banners">
                            <?php if(isset($_GET['id'])){ ?>
                                <input type="hidden" name="id" value="<?=$_GET['id']?>">
                            <?php } ?>
                        
                            <div class="form-group mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" value="<?=(isset($data) ? $data['title'] : '')?>" name="fields[title]">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Details</label>
                                <textarea name="fields[details]" id="editor2" class="form-control"><?=(isset($data) ? $data['details'] : '')?></textarea>
			                    <script>  CKEDITOR.replace( 'editor2' ); </script>

                            </div>
                            <div class="form-group mb-3">
                                <?php if(isset($data) && $data['image']){ ?>
                        
                                <input type="hidden" name="prev_image" value="<?=$data['image']?>">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control mb-3" name="image">

                                <?php }else{ ?>
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control" name="image">
                                <?php } ?>
                            </div>
                            <hr>
                            <div class="form-group text-right">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>