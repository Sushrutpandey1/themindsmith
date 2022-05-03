<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Artical</h1>
            <a href="Articles_controller/article_list"><button class="btn btn-primary btn-block" >List Of Articles </button></a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">admin</a></li>
              <li class="breadcrumb-item active">Articles</li>
            </ol>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <!DOCTYPE html>
<html>
<head>

	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"></script>

</head>
<body>
<div class="container">
<?php if(isset($validation)):?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif;?>
	<form  action="<?php echo base_url('Articles_controller/add_article'); ?>" method="post" enctype="multipart/form-data">
	

    <section class="content">
    
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Video Article</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
         
            <div class="card-body">

            <div class="form-group">
                <label for="inputName">Add Thumbnail Image</label>
                <input type="file" id="file" name='file' class="form-control">
              </div>
            
              <div class="form-group">
                <lab   el for="inputName">Add Article Video Link</label>
                <input type="url" id="articlelink" class="form-control" name="article_link">
              </div>
              <div class="form-group">
                <label for="inputName">Add Play Image</label>
                <input type="file" id="file1" name='file1' class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Article Description</label>
                <textarea id="articledescription" name="article_description" class="form-control" rows="4"></textarea>
              </div>
            </div>
         </div>
        </div>
      </div>
   


   
           <center>
            <button type="submit" class="btn btn-primary btn-block" >Save Data</button>
			     </center>
      </form>
    </section>
  
  </div>
	</form>

</div>

<script language="javascript" type="text/javascript">
function removeSpaces(string) {
 return string.split(' ').join('');
}
</script>



  