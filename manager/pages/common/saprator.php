<?php

require('../../models/commons.php');

if (!(isset($_GET['pagenum']))) { 
	 $pagenum = $_GET['pagenum']; 
} else {
	$pagenum = intval($_GET['pagenum']); 		
}

$table = $_GET['table'];

$model = new Commons();

//Number of results displayed per page 	by default its 10.
$page_limit =  ($_GET["show"] <> "" && is_numeric($_GET["show"]) ) ? intval($_GET["show"]) : 6;

if($_SESSION["role"]=="admin" || $_SESSION["role"]==2){

  $sql = $model->query("select count(*) as count from ".$table." order by id desc");

}else{

  if($table=="gphoto" || $table=="gvideo"){

    $sql = $model->query("select count(*) as count from ".$table." where emp_id = ".$_SESSION['userId']." order by id desc");

  }else{

    $sql = $model->query("select count(*) as count from ".$table." order by id desc");

  }
  
}

try {

    $tresults = ($sql!=null ? $model->fetch($sql) : '0');

} catch (Exception $ex) {

    echo($ex->getMessage());

}

$cnt = ($sql!=null ? $tresults["count"] : '0') ;

//Calculate the last page based on total number of rows and rows per page. 
$last = ceil($cnt/$page_limit); 

//this makes sure the page number isn't below one, or more than our maximum pages 
if ($pagenum < 1) { 

	$pagenum = 1; 

} elseif ($pagenum!=1 && $pagenum > $last)  { 

	$pagenum = $last; 

}


	$lower_limit = ($pagenum - 1) * $page_limit;

if($_SESSION["role"]=="admin" || $_SESSION["role"]==2){
   
    $sql2 = $model->query("select * from ".$table." order by id desc limit ". ($lower_limit)." ,  ". ($page_limit));

}else{

    $emp = $_SESSION['userId'];

    if($table=="gphoto" || $table == "gvideo"){

      $sql2 = $model->query("select * from ".$table." where emp_id = ".$emp." order by id desc limit ". ($lower_limit)." ,  ". ($page_limit));
      
    }else{
      $sql2 = $model->query("select * from ".$table." order by id desc limit ". ($lower_limit)." ,  ". ($page_limit));
    }

}

$i=0;

?>
<table class="table table-bordered table-hover">
                                 <thead>
                                    <tr class="info">
                                      
                                      <?php if($table=="advertisement"  || $table=="media"){ ?>
                                      <th></th>
                                      <?php } if($table!="media"){ ?>
                                       <th <?=($table=="gphoto" || $table=="gvideo" || $table=="epaper" ? "colspan=2" : null)?>>Title</th>
                                       
                                       <?php } if($table=="breakingnews"){ ?>
                                       <th>url</th>
                                       <?php } ?>

                                       <?php if($table=="advertisement"){ ?>
                                       <th>Category</th>
                                       <?php } ?>

                                       <?php if($table=="category"){ ?>
                                       <th>Is Top</th>
                                       <?php } ?>
                                       <th><?=($table=="media" ? "URL" : "Status")?></th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
<?php
if($sql2!=null){ while ($fetch = $model->fetch($sql2)) { ?>
     
             <?php /*
                                    if($table=="category"){
                                       $query = $link->selectByCF(array("table"=>$table,"check"=>array("pid"=>0),"sort_by"=>"id","sort_type"=>"desc"));
                                     }else {
                                       // $sql = $link->selectByCF(array("table"=>$table,"sort_by"=>"id","sort_type"=>"desc"));
                                     }
                                       while ($fetch = $link->fetch($sql2)) { 
                                        if($table=="category"){
                                          $sql1 = $link->selectByCF(array("table"=>$table,"check"=>array("pid"=>$fetch['id']),"sort_by"=>"id","sort_type"=>"desc"));
                                        } */
                                         ?>
                                         <tr>
                                          <?php if($table=="advertisement" || $table=="media"){ ?>
                                          <td><img src="<?=(strrpos($fetch['image'], ".pdf")>0 ? SITE_URL.'assets/images/pdf.png' : SITE_URL."images/".$table."/".$fetch['image'])?>" width="100"></td>
                                          <?php } ?>
                                          <?php if($table=="gphoto" || $table=="epaper"){ ?>
                                       <th><?php if($fetch['image']!=null){
                                        if(strrpos($fetch['image'], ".pdf")>0){ ?><a href="<?=SITE_URL."images/".$table."/".$fetch['image']?>" target="_blank"><?php }
                                          ?>
                                          <img src="<?=(strrpos($fetch['image'], ".pdf")>0 ? SITE_URL.'assets/images/pdf.png' : SITE_URL."images/".$table."/".$fetch['image'])?>" width="100">
                                          <?php
                                          if(strrpos($fetch['image'], ".pdf")>0){ ?> </a> <?php } 
                                       } ?></th>
                                       <?php } ?>

                                       <?php if($table=="gvideo" && $fetch['image']==""){

                                        ?>
                                          <th>
                                             <img src="https://img.youtube.com/vi/<?=$model->getVar($fetch['url'])?>/hqdefault.jpg" width="100">
                                         </th>
                                       <?php }else if($table=="gvideo"){
                                        ?>
                                        <th>
                                          <img src="<?=(strrpos($fetch['image'], ".pdf")>0 ? SITE_URL.'assets/images/pdf.png' : SITE_URL."images/".$table."/".$fetch['image'])?>" width="100">
                                        </th>
                                        <?php
                                       } if($table!="media"){ ?>

                                             <td><?=$fetch['title']?></td>
                                             <?php }else{ ?>
                                             
                                             <td><?=SITE_URL."images/".$table."/".$fetch['image']?></td>
                                              <?php } if($table=="advertisement"){ ?>
                                             <td><?php 
                                              if($fetch['cat_id']==0){
                                                echo "Header Slider";
                                              }else if($fetch['cat_id']==1){
                                                echo "Right 1";
                                              }else if($fetch['cat_id']==2){
                                                echo "Right 2";
                                              }
                                             ?></td>
                                             <?php } ?>

                                             <?php if($table=="breakingnews"){ ?>
                                                <td><?=$fetch['url']?></td>
                                             <?php } ?>
                                             <?php if($table=="category"){ ?>

                                             
                                                <td><?=($fetch['top'] =="1" ? "Yes" : "No")?></td>
                                             <?php } if($table!="media"){  ?>
                                             <td>
                                                <a href="?page=<?=$table?>status&id=<?=base64_encode($fetch['id'])?>" class="btn btn-xs btn-<?=($fetch['status'] =="1" ? "success" : "warning")?>"><?=($fetch['status'] =="1" ? "Active" : "Inactive")?></a></td>
                                                <?php } ?>
                                             <td width="100">
                                                <a href="?page=<?=$table?>&id=<?=base64_encode($fetch['id'])?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                 <a href="?page=<?=$table?>_delete&id=<?=base64_encode($fetch['id'])?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                              </td>
                                          </tr>

                                         <?php
                                         

                                  //     }
                              
                
    }
  }
    ?>
  </tbody>
</table>

      <div class="clearfix"></div>

        <div class="text-center">
            <ul class="bootpag pagination primary">
             <?php
                if ( ($pagenum-1) > 0) {
                ?>  
                <li class="prev ">
                 <a href="javascript:void(0);" class="links" onclick="displayRecords('<?php echo $page_limit;  ?>', '<?php echo 1; ?>');"><i class="fa fa-angle-double-left"></i></a>
                </li>
                <li class="prev ">
                <a href="javascript:void(0);" class="links"  onclick="displayRecords('<?php echo $page_limit;  ?>', '<?php echo $pagenum-1; ?>');"><i class="fa fa-angle-left"></i></a>
                </li>
                <?php
                }
                //Show page links
                for($i=1; $i<=$last; $i++) {
                  if ($i == $pagenum ) {
              ?>
                <li class="disabled active">
                  <a href="javascript:void(0);" class="selected" ><?php echo $i ?></a>
                </li>
              <?php
                } else {  
              ?>
                <li>
                  <a href="javascript:void(0);" class="links"  onclick="displayRecords('<?php echo $page_limit;  ?>', '<?php echo $i; ?>');" ><?php echo $i ?></a>
                </li>
              <?php 
                }
              } 
              if ( ($pagenum+1) <= $last) {
              ?>
                <li class="next">
                  <a href="javascript:void(0);" onclick="displayRecords('<?php echo $page_limit;  ?>', '<?php echo $pagenum+1; ?>');" class="links"><i class="fa fa-angle-right"></i></a>
                </li>
              <?php } if ( ($pagenum) != $last) { ?>  
                <li class="next">
                  <a href="javascript:void(0);" onclick="displayRecords('<?php echo $page_limit;  ?>', '<?php echo $last; ?>');" class="links" ><i class="fa fa-angle-double-right"></i></a> 
                </li>
              <?php
                } 
              ?>
            </ul>
   
