<?php require_once APPROOT . '/views/inc/admin/header.php' ?>
<?php require_once APPROOT . '/views/inc/admin/sidebar.php' ?>
<?php require_once APPROOT . '/views/inc/admin/navbar.php' ?>
<?php require APPROOT . '/views/components/auth_message.php'; ?>


    <div class="page-wrapper">
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="text-primary">Users</h4>
                            </div>
                            
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>profile_image</th>
                                                <th>Role</th>	
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                                 $number=1;
                                                foreach ($data['users'] as $user){?>
                                               <tr>
                                                    <td><?php echo $number++; ?> </td>
                                                    <td><?php echo $user['name']; ?> </td>
                                                    <td><?php echo $user['email']; ?> </td>
                                                    <td><?php echo $user['profile_image']; ?> </td>
                                                    <td><?php echo $user['role']; ?> </td>
                                                    <td>
                                                    <a href="#" class="text-danger" onclick="return confirm('Are you sure you want to delete this item?');" data-toggle="modal" data-target="#deleteModal_<?php echo $menu['id']; ?>" title="Delete">
                                                    <i class="uil uil-trash"></i>
                                                    </a>
                                                </td>

                                                    <?php }?>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
        
<?php require_once APPROOT . '/views/inc/admin/footer.php' ?>