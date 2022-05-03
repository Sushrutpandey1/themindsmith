<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Of User/Client</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">admin</a></li>
              <li class="breadcrumb-item active">User list</li>
            </ol>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="content">
    <div class="container-fluid">
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                         
                    <div class="header">
                        <h4 class="title">User List</h4>
                        <!-- <p class="category"></p> -->
                    </div>

                    <div class="content table-responsive table-full-width">
                   
                        <table class="table table-hover table-striped" id="product_list">
                            <thead>
                                <th>User_id</th>
                                <!-- <th>Doc_Image</th> -->
                                <th>User_Name</th>
                                <th>User_Email</th>
                                <th>User_Phone</th>
                                <th>Delete Doctor</th>
                                <th>Edit Doctor</th>
                                <!-- <th></th> -->
                                <th></th>
                            </thead>
                            <tbody>
                                <?php if($userlist): ?>
                                <?php foreach ($userlist as $data) : ?>
                                    <tr>
                                        <td><?php echo $data['user_id']; ?></td>
                                        <td><?php echo $data['user_name']; ?></td>
                                        <td><?php echo $data['user_email']; ?></td>
                                        <td><?php echo $data['user_phone']; ?></td>
                                        <td><a href =<?php echo site_url('User_controller/deleteuser/').$data['user_id'];?>><i class="fas fa-trash-alt" style="color:red;"></i></a></td>
                                        <td><a href =<?php  echo site_url('User_controller/#/').$data['user_id'];?>><i class="fas fa-edit" style="color:green;"></i></a></td>
                                      
                                    </tr>
                                <?php  endforeach; ?>
                                <?php  endif;?>
                            </tbody>
                        </table>

    

                    </div>
                </div>
            </div>
        </div>

    </div>

   </div>
</div>