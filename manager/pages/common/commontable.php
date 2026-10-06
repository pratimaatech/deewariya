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



if($table=='news'){

  if($_SESSION['role']=="admin" || $_SESSION['role']=="2"){

      if(isset($_GET['feild']) && $_GET['feild']['category']!=0){

        $sql1 = "select count(ns.id) as count,np.news_id,np.cat_id,ca.id as cid,ns.id,ns.status,ns.emp_id from news_param np LEFT JOIN news ns on (np.news_id=ns.id) LEFT JOIN category ca on (ca.id = np.cat_id) where ";

        foreach ($_GET['feild'] as $key => $value) {

          
          if($key == "news_id" && $value!='' && $value!='null'){
            if($value!=null){ 

              $sql1 .= "ns.id = ".$value;
            }
          }

          if($key == "category" && $value!=0){
            if($_GET['feild']['news_id']!=null){
              $sql1 .= " and ca.id = ".$value;
            }else{
              $sql1 .= " ca.id = ".$value;
            }
          }
          if($key == "emp_id" && $value!=null){
           
            if($_GET['feild']['category']!=0 || ($_GET['feild']['news_id']!='')){
              $sql1 .= " and ns.emp_id = ".$value;
            }else{
              $sql1 .= " ns.emp_id = ".$value;
            }
          }
          /*
          if($key == "emp_name" && $value!=null){
            if($_GET['feild']['category']!=null){
              $sql1 .= " and emp.fullname like '%".$value."%'";
            }else{
              $sql1 .= " emp.fullname like '%".$value."%'";
            }
            
          }*/
          if($key == "status" ){
            if($_GET['feild']['category']!=0 || ($_GET['feild']['news_id']!='' || $_GET['feild']['emp_id']!='')){
              $sql1 .= " and ns.status = ".$value;
            }else{
              $sql1 .= "  ns.status = ".$value;
            }
          }
        }

        $sql1.= " group by ns.id";

        $sql = $model->query($sql1);

      }else{
        $sql = $model->query("select count(*) as count from ".$table." order by id desc");
      }

  }else if($_SESSION['role']=="1"){

    if(isset($_GET['feild']) && $_GET['feild']['category']!=0){

        $sql1 = "select count(ns.id) as count,np.news_id,np.cat_id,ca.id as cid,ns.id,ns.status,ns.emp_id from news_param np LEFT JOIN news ns on (np.news_id=ns.id) LEFT JOIN category ca on (ca.id = np.cat_id) where ";

        foreach ($_GET['feild'] as $key => $value) {

          
          if($key == "news_id" && $value!=null){
            $sql1 .= "ns.id = ".$value;
          }
          if($key == "category" && $value!=null){
            if($_GET['feild']['news_id']!=null){
              $sql1 .= " and ca.id = ".$value;
            }else{
              $sql1 .= " ca.id = ".$value;
            }
          }

           if($key == "emp_id" && $value!=null){
           
            if($_GET['feild']['category']!=0 || ($_GET['feild']['news_id']!='')){
              $sql1 .= " and ns.emp_id = ".$value;
            }else{
              $sql1 .= " ns.emp_id = ".$value;
            }
          }
          /*
          if($key == "emp_name" && $value!=null){
            if($_GET['feild']['category']!=null){
              $sql1 .= " and emp.fullname like '%".$value."%'";
            }else{
              $sql1 .= " emp.fullname like '%".$value."%'";
            }
            
          }*/

          if($key == "status" ){
            if($_GET['feild']['category']!=0 || ($_GET['feild']['news_id']!='' || $_GET['feild']['emp_id']!='')){
              $sql1 .= " and ns.status = ".$value;
            }else{
              $sql1 .= "  ns.status = ".$value;
            }
          }



        }
 
        $sql1.= " and ns.emp_id = ".$_SESSION['userId']." group by ns.id";

        $sql = $model->query($sql1);

      }else{
        $sql = $model->query("select count(*) as count from ".$table." where emp_id = ".$_SESSION['userId']." order by id desc");
      }

    
  }

}else{
if(isset($_GET['feild']) && $_GET['feild']['category']!=0){

  $sql1 = "select count(ns.id) as count,np.news_id,np.cat_id,ca.id as cid,ns.id,ns.status,ns.emp_id,emp.id as emp_id,emp.fullname from news_param np LEFT JOIN news ns on (np.news_id=ns.id) LEFT JOIN category ca on (ca.id = np.cat_id) LEFT JOIN employee emp on (emp.id = ns.emp_id) where ";

  foreach ($_GET['feild'] as $key => $value) {

    
    if($key == "news_id" && $value!=null){
      $sql1 .= "ns.id = ".$value;
    }
    if($key == "category" && $value!=null){
      if($_GET['feild']['news_id']!=null){
        $sql1 .= " and ca.id = ".$value;
      }else{
        $sql1 .= " ca.id = ".$value;
      }
    }
    if($key == "emp_id" && $value!=null){
           
            if($_GET['feild']['category']!=0 || ($_GET['feild']['news_id']!='')){
              $sql1 .= " and ns.emp_id = ".$value;
            }else{
              $sql1 .= " ns.emp_id = ".$value;
            }
          }
          /*
    if($key == "emp_name" && $value!=null){
      if($_GET['feild']['category']!=null){
        $sql1 .= " and emp.fullname like '%".$value."%'";
      }else{
        $sql1 .= " emp.fullname like '%".$value."%'";
      }
      
    }*/
    if($key == "status" ){
        if($_GET['feild']['category']!=0 || ($_GET['feild']['news_id']!='' || $_GET['feild']['emp_id']!='')){
          $sql1 .= " and ns.status = ".$value;
        }else{
          $sql1 .= "  ns.status = ".$value;
        }
      }

  }

  $sql1.= " group by ns.id";

  $sql = $model->query($sql1);

}else{
  $sql = $model->query("select count(*) as count from ".$table." order by id desc");
}


}

if($table=='news'){

  if(isset($_GET['feild']) && $_GET['feild']['category']!=0){
      try {

          $tresults = ($sql!=null ? $model->countRow($sql1) : '0');
      } catch (Exception $ex) {
          echo($ex->getMessage());
      }

     $cnt = $tresults;


  }else{

      try {

          $tresults = ($sql!=null ? $model->fetch($sql) : '0');
      } catch (Exception $ex) {
          echo($ex->getMessage());
      }

       $cnt = ($sql!=null ? $tresults["count"] : '0') ;

  }
    


}else{
    try {

          $tresults = ($sql!=null ? $model->fetch($sql) : '0');
      } catch (Exception $ex) {
          echo($ex->getMessage());
      }

       $cnt = ($sql!=null ? $tresults["count"] : '0') ;
}





//Calculate the last page based on total number of rows and rows per page. 
 $last = ceil($cnt/$page_limit); 

//this makes sure the page number isn't below one, or more than our maximum pages 
if ($pagenum < 1) { 
	$pagenum = 1; 
} elseif ($pagenum!=1 && $pagenum > $last)  { 
	$pagenum = $last; 
}


	$lower_limit = ($pagenum - 1) * $page_limit;



if($table=='news'){

  if($_SESSION['role']=="admin" || $_SESSION['role']=="2"){

      if(isset($_GET['feild']) && $_GET['feild']['category']!=0){

        $sql1 = "select ns.image1,ns.title as title,ns.date_time,np.news_id,np.cat_id,ca.id as cid,ns.id,ns.status,ns.emp_id,emp.id as emp_id,emp.fullname from news_param np LEFT JOIN news ns on (np.news_id=ns.id) LEFT JOIN category ca on (ca.id = np.cat_id) LEFT JOIN employee emp on (emp.id = ns.emp_id) where ";

        foreach ($_GET['feild'] as $key => $value) {

          
          if($key == "news_id" && $value!=null){
            $sql1 .= "ns.id = ".$value;
          }
          if($key == "category" && $value!=0){
            if($_GET['feild']['news_id']!=null){
              $sql1 .= " and ca.id = ".$value;
            }else{
              $sql1 .= " ca.id = ".$value;
            }
          }

          if($key == "emp_id" && $value!=null){
           
            if($_GET['feild']['category']!=0 || ($_GET['feild']['news_id']!='')){
              $sql1 .= " and ns.emp_id = ".$value;
            }else{
              $sql1 .= " ns.emp_id = ".$value;
            }
          }

          /*
          if($key == "emp_name" && $value!=null){
            if($_GET['feild']['category']!=null){
              $sql1 .= " and emp.fullname like '%".$value."%'";
            }else{
              $sql1 .= " emp.fullname like '%".$value."%'";
            }
            
          }
          */

          if($key == "status" ){
            if($_GET['feild']['category']!=0 || ($_GET['feild']['news_id']!='' || $_GET['feild']['emp_id']!='')){
              $sql1 .= " and ns.status = ".$value;
            }else{
              $sql1 .= "  ns.status = ".$value;
            }
          }

        }

        $sql1.= " group by ns.id order by ns.id desc limit ". ($lower_limit)." ,  ". ($page_limit);

        echo $sql1;

        $sql2 = $model->query($sql1);

      }else{
         $sql1 = "select ns.image1,ns.title as title,ns.date_time,np.news_id,np.cat_id,ca.id as cid,ns.id,ns.status,ns.emp_id,emp.id as emp_id,emp.fullname from news_param np LEFT JOIN news ns on (np.news_id=ns.id) LEFT JOIN category ca on (ca.id = np.cat_id) LEFT JOIN employee emp on (emp.id = ns.emp_id)  group by ns.id order by ns.id desc limit ". ($lower_limit)." ,  ". ($page_limit);
        $sql2 = $model->query($sql1);
      }

  }else if($_SESSION['role']=="1"){

    if(isset($_GET['feild']) && $_GET['feild']['category']!=0){

        $sql1 = "select ns.image1,ns.title as title,ns.date_time,np.news_id,np.cat_id,ca.id as cid,ns.id,ns.status,ns.emp_id,emp.id as emp_id,emp.fullname from news_param np LEFT JOIN news ns on (np.news_id=ns.id) LEFT JOIN category ca on (ca.id = np.cat_id) LEFT JOIN employee emp on (emp.id = ns.emp_id) where ";

        foreach ($_GET['feild'] as $key => $value) {

          
          if($key == "news_id" && $value!=null){
            $sql1 .= "ns.id = ".$value;
          }
          if($key == "category" && $value!=null){
            if($_GET['feild']['news_id']!=null){
              $sql1 .= " and ca.id = ".$value;
            }else{
              $sql1 .= " ca.id = ".$value;
            }
          }

          if($key == "emp_id" && $value!=null){
           
            if($_GET['feild']['category']!=0 || ($_GET['feild']['news_id']!='')){
              $sql1 .= " and ns.emp_id = ".$value;
            }else{
              $sql1 .= " ns.emp_id = ".$value;
            }
          }

          /*
          if($key == "emp_name" && $value!=null){
            if($_GET['feild']['category']!=null){
              $sql1 .= " and emp.fullname like '%".$value."%'";
            }else{
              $sql1 .= " emp.fullname like '%".$value."%'";
            }
            
          }
          */
           if($key == "status" ){
            if($_GET['feild']['category']!=0 || ($_GET['feild']['news_id']!='' || $_GET['feild']['emp_id']!='')){
              $sql1 .= " and ns.status = ".$value;
            }else{
              $sql1 .= "  ns.status = ".$value;
            }
          }
        }
 
        $sql1.= " and ns.emp_id = ".$_SESSION['userId']." group by ns.id order by ns.id desc limit ". ($lower_limit)." ,  ". ($page_limit);

        $sql2 = $model->query($sql1);

      }else{

        $sql1 = "select ns.image1,ns.title as title,ns.date_time,np.news_id,np.cat_id,ca.id as cid,ns.id,ns.status,ns.emp_id,emp.id as emp_id,emp.fullname from news_param np LEFT JOIN news ns on (np.news_id=ns.id) LEFT JOIN category ca on (ca.id = np.cat_id) LEFT JOIN employee emp on (emp.id = ns.emp_id) where ns.emp_id = ".$_SESSION['userId']." group by ns.id order by  ns.id desc limit ". ($lower_limit)." ,  ". ($page_limit);

        $sql2 = $model->query($sql1);

      }

    
  }

}else{

  if(isset($_GET['feild']) && $_GET['feild']['category']!=0){

    $sql1 = "select ns.image1,ns.title as title,ns.date_time,np.news_id,np.cat_id,ca.id as cid,ns.id,ns.status,ns.emp_id,emp.id as emp_id,emp.fullname from news_param np LEFT JOIN news ns on (np.news_id=ns.id) LEFT JOIN category ca on (ca.id = np.cat_id) LEFT JOIN employee emp on (emp.id = ns.emp_id) where ";

    foreach ($_GET['feild'] as $key => $value) {

      
      if($key == "news_id" && $value!=null){
        $sql1 .= "ns.id = ".$value;
      }
      if($key == "category" && $value!=null){
        if($_GET['feild']['news_id']!=null){
          $sql1 .= " and ca.id = ".$value;
        }else{
          $sql1 .= " ca.id = ".$value;
        }
      }
      if($key == "emp_name" && $value!=null){
        if($_GET['feild']['category']!=null){
          $sql1 .= " and emp.fullname like '%".$value."%'";
        }else{
          $sql1 .= " emp.fullname like '%".$value."%'";
        }
        
      }
      if($key == "status" ){
        $sql1 .= " and ns.status = ".$value;
      }
    }

    $sql1.= " group by ns.id order by ns.id desc limit ". ($lower_limit)." ,  ". ($page_limit);

    $sql2 = $model->query($sql1);

  }else{

    $sql2 = $model->query("select * from ".$table." order by id desc limit ". ($lower_limit)." ,  ". ($page_limit));

  }

}






$i=1;
?>
<table class="table center-aligned-table">
    <thead>
      <tr class="text-primary">
        <th>No</th>
         <?php if($table=="news"){ ?>
            
            <th></th>
            <th>Employee</th>
          <?php } ?>
        <?php if($table=="appoint"){
          ?>
          <th>Full name</th>
          <th>Phone No</th>
          <th>Email</th>
          <th>Apply For</th>
          <th>Action</th>
          <?php
        }else{ ?>

        <?php if($table=="employee"){ ?>
        
        <th></th>

        <th>Name</th>
         <th>Emp ID</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Emp Role</th>
        <?php }else{ ?>
        <th width="200">Title</th>
        <?php } ?>
        <?php if($table=="news"){ ?>
        
        <th>Category</th>
        <th>Date</th>
        <?php } ?>
        <th>Status</th>
        <th width="200"></th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
<?php



if($sql2!=null){ while ($users = $model->fetch($sql2)) {
  

  if($table=="news"){
     $categ = null;
    if($users['emp_id']==0){
      $creator = "DESK HP NEWS";
    }else{
       $uuse = $model->fetch($model->selectByCF(array("table"=>"employee","check"=>array("id"=>$users['emp_id']),"sort_by"=>"id","sort_type"=>"desc")));
       $creator = $uuse['fullname'];
     }

     $cat = $model->getResultArray($model->query("select * from category ca LEFT JOIN news_param np on (ca.id = np.cat_id) where np.news_id=".$users['id']));
     
     foreach ($cat as $cats) {
        $categ[] = $cats['title'];
     }

   }
     ?>
     
            <tr class="">

                <td><?=($table=="news" ? $users['id'] : $i)?>.</td>

                <?php if($table=="appoint"){
                  $job = $model->fetch($model->selectByCF(array("table"=>"jobs","check"=>array("id"=>base64_decode($users['jobid'])))));
                  ?>
                  <td><?=$users['name']?></td>
                  <td><?=$users['phone']?></td>
                  <td><?=$users['email']?></td>

                  <td><?=$job['title']?></td>
                  <td align="right">
                    <a href="?page=<?=$table?>_manage&id=<?=base64_encode($users['id'])?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                    <a href="?page=<?=$table?>_delete&id=<?=base64_encode($users['id'])?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                  </td>

                <?php
                }else{ ?>
                 <?php if($table=="news"){ ?>
                 
                 <td width="60"><img src="<?=SITE_URL?>images/<?=$table?>/<?=$users['image1']?>" alt="" style="height: 50px; width: 60px;" class="img-responsive img-circle"></td>

                 <td><?=$creator?></td>

                 <?php }else{ ?>
                <td width="60"><img src="<?=SITE_URL?>images/<?=$table?>/<?=$users['image']?>" alt="" style="height: 50px; width: 60px;" class="img-responsive img-circle"></td>
                <?php } if($table=="employee"){
                  $emprole = $model->fetch($model->selectByCF(array("table"=>"emp_category","check"=>array("status"=>1,"id"=>$users['emprole']))));
                 ?>
                 
                <td><?=$users['fullname']?></td>
                <td><?=$users['id']?></td>
                <td><?=$users['mobile']?></td>
                <td><?=$users['email']?></td>
                <td><?=$emprole['title']?></td>
                <?php }else{ ?>
                <td><?=$users['title']?></td>
                <?php } ?>

                <?php if($table=="news"){
                  ?>
                  <td><?=implode(", ",$categ)?></td>
                  <td><?=date("d M,Y h:i:s A", strtotime($users['date_time']))?></td>
                  <?php
                }?>
                <td><a href="?page=<?=$table?>status&id=<?=base64_encode($users['id'])?>" class="btn btn-xs btn-<?=($users['status'] =="1" ? "success" : "danger")?>"><?=($users['status'] =="1" ? "Active" : "Inactive")?></a></td>

                

                <td align="right"><a href="?page=<?=$table?>_manage&id=<?=base64_encode($users['id'])?>" class="btn btn-primary btn-sm">Manage</a>
                <a href="?page=<?=$table?>_delete&id=<?=base64_encode($users['id'])?>" class="btn btn-danger btn-sm">Remove</a></td>

                <?php } ?>
              </tr>  
                    <?php
                $i++;
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
   
