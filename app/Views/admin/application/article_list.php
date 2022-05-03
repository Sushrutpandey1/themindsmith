<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Of Article</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">admin</a></li>
              <li class="breadcrumb-item active">Article list</li>
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
                        <h4 class="title">Article List</h4>
                        <!-- <p class="category"></p> -->
                    </div>

                    <div class="content table-responsive table-full-width">
                   
                        <table class="table table-hover table-striped" id="product_list">
                            <thead>
                                <th>Articles_id</th>
                                <th>Article_Thumbnail_Img</th>
                                <th>Article_Link</th>
                                <th>Delete Article</th>
                                <th>Edit Article</th>
                                <!-- <th></th> -->
                                <th></th>
                            </thead>
                            <tbody>
                                <?php if($articlelist): ?>
                                <?php foreach ($articlelist as $data) : ?>
                                    <tr>
                                        <td><?php echo $data['articles_id']; ?></td>
                                        <td> <img src="<?php echo base_url().'/public/uploads/'.$data['article_thumbnail_img'];?>" style="width:50px;height:50px;"></td>
                                        <td><?php echo $data['article_link']; ?></td>
                                        <td><a href =<?php echo site_url('Articles_controller/deletearticle/').$data['articles_id'];?>><i class="fas fa-trash-alt" style="color:red;"></i></a></td>
                                        <td><a href =<?php  echo site_url('Articles_controller/#/').$data['articles_id'];?>><i class="fas fa-edit" style="color:green;"></i></a></td>
                                      
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