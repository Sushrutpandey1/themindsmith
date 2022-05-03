<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Of Doctors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">admin</a></li>
              <li class="breadcrumb-item active">Doctor list</li>
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
                        <h4 class="title">Doctors List</h4>
                        <!-- <p class="category"></p> -->
                    </div>

                    <div class="content table-responsive table-full-width">
                   
                        <table class="table table-hover table-striped" id="product_list">
                            <thead>
                                <th>Doc_id</th>
                                <th>Doc_Image</th>
                                <th>Doc_Name</th>
                                <th>Doc_Qualification</th>
                                <th>Doc_Fee</th>
                                <th>Delete Doctor</th>
                                <th>Edit Doctor</th>
                                <!-- <th></th> -->
                                <th></th>
                            </thead>
                            <tbody>
                                <?php if($doclist): ?>
                                <?php foreach ($doclist as $data) : ?>
                                    <tr>
                                        <td><?php echo $data['doctor_id']; ?></td>
                                       <td> <img src="<?php echo  base_url().'/public/uploads/'.$data['doctor_image'];?>" style="width:50px;height:50px;"></td>
                                        <td><?php echo $data['doctor_name']; ?></td>
                                        <td><?php echo $data['doctor_qualification']; ?></td>
                                        <td><?php echo $data['doctor_fee']; ?></td>
                                        <td><a href =<?php echo site_url('Doctor_controller/deletedoc/').$data['doctor_id'];?>><i class="fas fa-trash-alt" style="color:red;"></i></a></td>
                                        <td><a href =<?php  echo site_url('Doctor_controller/#/').$data['doctor_id'];?>><i class="fas fa-edit" style="color:green;"></i></a></td>
                                      
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