<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bulma.min.css">
<style type="text/css">
    table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control:before{
        background-color: #395fcf;
    }
</style>
<script type="text/javascript">
    function deleteInfo(id){

      if (confirm("Do you want to delete information?") == true) {       
        window.location.href='?page=delete-categories&id='+id;
      } else {
        return false;
      }
    }
</script>
<div class="container-fluid">

    <div class="py-3 d-flex flex-row align-items-center justify-content-between">
        <h1 class="h3 mb-2 text-gray-800"><?=$page_title?></h1>
        <a href="?page=add-categories" class="btn btn-primary">Add New</a>
    </div>
    <?php 
        if(isset($_SESSION['message'])){
            echo '<div class="alert alert-success">'.$_SESSION['message'].'</div>';
            unset($_SESSION['message']);
        }
    ?>
    
    <div class="card shadow p-0 mb-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table is-striped border responsive nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php 
                        while($data = $model->fetch($orders_query)){
                        ?>
                        <tr>
                            <td>
                                <b><?=$data['title']?></b>
                            </td>
                            <td>
                                <a href="?page=categories&id=<?=$data['id']?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-pen"></i> Edit</a>
                                <button onclick="deleteInfo(<?=$data['id']?>)" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i> Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>