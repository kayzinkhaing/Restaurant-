<?php require_once APPROOT . '/views/inc/admin/header.php'; ?>
<?php require_once APPROOT . '/views/inc/admin/sidebar.php'; ?>
<?php require_once APPROOT . '/views/inc/admin/navbar.php'; ?>
<?php require APPROOT . '/views/components/auth_message.php'; ?>

<div class="page-wrapper"> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="col-lg-12">
                    <div class="card card-outline-primary">
                        <div class="card-header">
                            <h4 class="text-primary">All Orders</h4>
                        </div>
                       
                          <div class="table-responsive m-t-40">
                              <table id="myTable" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                         <th>Id</th>
                                         <th>Name</th>
                                         <th>Item Name</th>
                                         <th>Quantity</th>
                                         <th>Price</th>
                                         <th>Total Amount</th>
                                        </tr>
                                  </thead>
                                  <tbody>
                                  <?php 
                                $number=1;
                                foreach ($data['cart'] as $cart) { ?>
                                    <tr>
                                        <td><?php echo $number++; ?></td>
                                        <td><?php echo $cart['user_name']; ?></td>
                                        <td><?php echo $cart['menu_name']; ?></td>
                                        <td><?php echo $cart['quantity']; ?></td>
                                        <td><?php echo $cart['sale_price']; ?></td>
                                        <td><?php echo $cart['total_amount']; ?></td>
                                    </tr>
                                <?php } ?>
                                  </tbody>
                              </table>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>
