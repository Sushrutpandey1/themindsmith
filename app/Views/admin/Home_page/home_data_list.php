<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Home Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">admin</a></li>
              <li class="breadcrumb-item active">Home Page Data</li>
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
                        <h4 class="title">Product List</h4>
                        <!-- <p class="category"></p> -->
                    </div>

                    <div class="content table-responsive table-full-width">
                   
                        <table class="table table-hover table-striped" id="product_list">
                            <thead>
                                <th>ID</th>
                                <th>banner_heading</th>
                                <th>mfindoes_heading</th>
                                <th>event_heading</th>
                                <th>all data delete</th>
                                <th>All data edit</th>
                                <!-- <th></th> -->
                                <th></th>
                            </thead>
                            <tbody>
                                <?php if($homedata): ?>
                                <?php foreach ($homedata as $data) : ?>
                                    <tr>
                                        <td><?php echo $data['id']; ?></td>
                                        <td><?php  echo $data['banner_heading']; ?></td>
                                        <td><?php echo $data['mfindoes_heading']; ?></td>
                                        <td><?php echo $data['event_heading']; ?></td>
                                        <td><a href =<?php echo site_url('Home_page_controller/deleteproduct/').$data['id'];?>><i class="fas fa-trash-alt" style="color:red;"></i></a></td>
                                        <td><a href =<?php  echo site_url('Home_page_controller/alldatalist/').$data['id'];?>><i class="fas fa-edit" style="color:green;"></i></a></td>
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