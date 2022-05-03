<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Of Slots</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">admin</a></li>
              <li class="breadcrumb-item active">slot list</li>
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
                        <h4 class="title">slot List</h4>
                        <!-- <p class="category"></p> -->
                    </div>

                    <div class="content table-responsive table-full-width">
                   
                        <table class="table table-hover table-striped" id="product_list">
                            <thead>
                                <th>slot_id</th>
                                <th>doctor_id</th>
                                <th>doctors_name</th>
                                <th>schedule_date</th>
                                <th>start_time</th>
                                <th>end_time</th>
                                <th>avg_slot_timing</th>
                                <th>Delete</th>
                                <th>Update</th>
                            </thead>
                            <tbody>
                                <?php if($slotlist): ?>
                                <?php foreach ($slotlist as $data) : ?>
                                    <tr>
                                        <td><?php echo $data['slot_id']; ?></td>
                                       <!-- <td> <img src="<?php// echo  base_url().'/public/uploads/'.$data['doctor_image'];?>" style="width:50px;height:50px;"></td> -->
                                        <td><?php echo $data['doctor_id']; ?></td>
                                        <td><?php echo $data['doctors_name']; ?></td>
                                        <td><?php echo $data['schedule_date']; ?></td>
                                        <td><?php echo $data['start_time']; ?></td>
                                        <td><?php echo $data['end_time']; ?></td>
                                        <td><?php echo $data['avg_slot_timing']; ?></td>
                                        <td><a href =<?php echo site_url('add_schedule_slot_controller/deleteslot/').$data['slot_id'];?>><i class="fas fa-trash-alt" style="color:red;"></i></a></td>
                                        <td><a href =<?php  //echo site_url('Doctor_controller/#/').$data['doctor_id'];?>><i class="fas fa-edit" style="color:green;"></i></a></td>
                                      
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