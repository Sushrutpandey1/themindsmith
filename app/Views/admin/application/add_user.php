<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User data</h1>
            <a href="User_controller/user_list"><button class="btn btn-primary btn-block" >List Of User</button></a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">admin</a></li>
              <li class="breadcrumb-item active">Users</li>
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
	<title>repitar</title>
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
	<form  action="<?php echo base_url('User_controller/add_user'); ?>" method="post" enctype="multipart/form-data">

    <section class="content">
      

      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add User</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
         
            <div class="card-body">

            <div class="form-group">
                <label for="inputName">Client Name</label>
                <input type="text" id="inputheading" name='user_name' class="form-control">
              </div>
            
              <div class="form-group">
                <label for="inputName">User Image</label>
                <input type="file" id="file" name='file1' class="form-control"/>
              </div>
              <div class="form-group">
                <label for="inputDescription">Client Email</label>
                <input type="email" id="moreevent" class="form-control" name="user_email">
              </div>

              <div class="form-group">
                <label for="inputDescription">Client Number</label>
                <input type="phone" id="moreevent" class="form-control" name="user_phone">
              </div>

              <div class="form-group">
                <label for="inputDescription">Client Password</label>
                <input type="password" id="moreevent" class="form-control" name="user_password">
              </div>

              <div class="form-group">
                <label for="inputDescription">Client Confirm Password</label>
                <input type="password" id="moreevent" class="form-control" name="user_confirm_password">
              </div>

              <div class="form-group">
                <label for="inputDescription">User Aadhar Card Name</label>
                <input type="text" id="aadhar_name" class="form-control" name="aadhar_name">
              </div>

              <div class="form-group">
                <label for="inputDescription">Aadhar Card Number</label>
                <input type="text" id="aadhar_card_no" class="form-control" name="aadhar_card_no">
              </div>

              <div class="form-group">
                <label for="inputName">Select User Gender</label>
               <select id="gender" name="gender" class="form-control custom-select">
               <option value="">Select Gender</option>
               <option value="Male">Male</option>
               <option value="femael">Female</option>
                </select>
                 </div>

              <div class="form-group">
                <label for="inputDescription">Front Aadhar Image</label>
                <input type="file" id="front_image_aadhar" class="form-control" name="file2">
              </div>

              <div class="form-group">
                <label for="inputDescription">Back Aadhar Image</label>
                <input type="file" id="back_image_aadhar" class="form-control" name="file3">
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



  