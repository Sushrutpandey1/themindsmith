<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Doctoers data</h1>
            <a href="Doctor_controller/doc_list"><button class="btn btn-primary btn-block" >List Of doctors</button></a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">admin</a></li>
              <li class="breadcrumb-item active">doctors</li>
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
	<form  action="<?php echo base_url('Doctor_controller/add_doctors'); ?>" method="post" enctype="multipart/form-data">

    <section class="content">
      

      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Doctors</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
         
            <div class="card-body">

            <div class="form-group">
                <label for="inputName">Doctor Name</label>
                <input type="text" id="inputheading" name='doctor_name' class="form-control">
              </div>
            
              <div class="form-group">
                <label for="inputName">Image</label>
                <input type="file" id="file" name='file' onblur="this.value=removeSpaces(this.value);" class="form-control"/>
              </div>
              <div class="form-group">
                <label for="inputDescription">doctor_number</label>
                <input type="phone" id="moreevent" class="form-control" name="doctor_number">
              </div>

              <div class="form-group">
                <label for="inputDescription">doctor_address</label>
                <textarea id="inputDescription" name="doctor_address" class="form-control" rows="4"></textarea>
              </div>

              <div class="form-group">
                <label for="inputDescription">doctor_qualification</label>
                <input type="text" id="moreevent" class="form-control" name="doctor_qualification">
              </div>

              <div class="form-group">
                <label for="inputDescription">doctor_speciality</label>
                <input type="text" id="moreevent" class="form-control" name="doctor_speciality">
              </div>


              <div class="form-group">
                <label for="inputDescription">doctor_experience</label>
                <input type="text" id="moreevent" class="form-control" name="doctor_experience">
              </div>

              <div class="form-group">
                <label for="inputDescription">doctor_clinic_location</label>
                <textarea id="inputDescription" name="doctor_clinic_location" class="form-control" rows="4"></textarea>
              </div>

              <div class="form-group">
                <label for="inputDescription">doctor_clinic_number</label>
                <input type="phone" id="moreevent" class="form-control" name="doctor_clinic_number">
              </div>


              <div class="form-group">
                <label for="inputDescription">doctor_email</label>
                <input type="email" id="moreevent" class="form-control" name="doctor_email">
              </div>

              
              <div class="form-group">
                <label for="inputDescription">doctor_password</label>
                <input type="password" id="moreevent" class="form-control" name="doctor_password">
              </div>

              <div class="form-group">
                <label for="inputDescription">doctor_confirm_password</label>
                <input type="password" id="moreevent" class="form-control" name="doctor_confirm_password">
              </div>

              <div class="form-group">
                <label for="inputDescription">doctor_fee</label>
                <input type="text" id="moreevent" class="form-control" name="doctor_fee">
              </div>

              <div class="form-group">
                <label for="inputDescription">doctor_status</label>
                <input type="text" id="moreevent" class="form-control" name="doctor_status">
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



  