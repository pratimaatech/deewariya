<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bulma.min.css">
<style type="text/css">
    table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control:before {
        background-color: #395fcf;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $page_title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $page_title ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table is-striped responsive nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order id</th>
                            <th>Product</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Address</th>
                            <th>Payment Status</th>
                            <th>Transaction Amount</th>
                            <th>Transaction ID</th>
                            <th>Payment Method</th>
                            <th>Create at</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($data = $model->fetch($orders_query)) {
                            $image = explode(' | ', $data['image']);
                            ?>
                            <tr>
                                <td><img src="<?= SITE_URL . $image[0] ?>" width="60" alt=""></td>
                                <td><?= $data['order_id'] ?></td>
                                <td>
                                    <b><?= $data['title'] ?></b>, <?= $data['modal_no'] ?>
                                </td>
                                <td><?= $data['billing_name'] ?></td>
                                <td><?= $data['billing_email'] ?></td>
                                <td><?= $data['billing_phone'] ?></td>
                                <td><?= $data['billing_house_no'] ?>, <?= $data['billing_city'] ?>, <?= $data['billing_state'] ?>,
                                    <?= $data['billing_country'] ?>, <?= $data['zipcode'] ?></td>
                                <td><?= ($data['payment'] == 'Success' ? '<label class="badge badge-success">' . $data['payment'] . '</label>' : '<label class="badge badge-danger">' . $data['payment'] . '</label>') ?>
                                </td>
                                <td><?= $data['txn_amount'] ?></td>
                                <td><?= $data['txn_id'] ?></td>
                                <td><?= $data['payment_mode'] ?></td>
                                <td><?= $data['created_at'] ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->