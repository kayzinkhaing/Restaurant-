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
                                         <th>Total Amount</th>
                                         <th>Status</th>                                                
                                         <th>Reg-Date</th>
                                         <th>Action</th>
                                        </tr>
                                  </thead>
                                  <tbody>
                                  <?php foreach ($data['orders'] as $order){ ?>
                                               <tr>
                                                    <td><?php echo $order['id']; ?> </td>
                                                    <td><?php echo $order['user_id']; ?> </td>
                                                    <td><?php echo $order['item_id']; ?> </td>
                                                    <td><?php echo $order['Quantity']; ?> </td>
                                                    <td><?php echo $order['total_amount']; ?> </td>
                                                    <td><?php echo $order['Status']; ?> </td>
                                                    <td><?php echo $order['Reg_Date']; ?> </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal_<?php echo $order['id']; ?>">
                                                            Delete
                                                        </button>
                                                    </td>
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
