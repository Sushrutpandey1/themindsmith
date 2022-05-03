<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Schedule Slot Date</h1>
            <a href="add_schedule_slot_controller/slot_list"><button class="btn btn-primary btn-block" >List Of Slot</button></a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">admin</a></li>
              <li class="breadcrumb-item active">Slot</li>
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
	<title>Add Schedule Slot Date</title>
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
	<form  action="<?php echo base_url('add_schedule_slot_controller/add_doc_slot'); ?>" method="post" enctype="multipart/form-data">

    <section class="content">
      

      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Schedule</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
         
            <div class="card-body">
            <div class="form-group">
            <label for="inputName">Schedule Doctor</label>
               <select id="inputStatus" name="doctors_name" class="form-control custom-select">
               <option value="">Select Doctor</option>
               <?php foreach($doctor_name as $doctor){
                   echo '<option value="'.$doctor['doctor_name'].'">'.$doctor['doctor_name'].'</option>';
                } ?>
                </select>
</div>

<div class="form-group">
            <label for="inputName">Reconfirm Doctor Name</label>
               <select id="inputStatus" name="doctor_id" class="form-control custom-select">
               <option value="">Select again Doctor </option>
               <?php foreach($doctor_name as $doctor){
                   echo '<option value="'.$doctor['doctor_id'].'">'.$doctor['doctor_name'].'</option>';
                } ?>
                </select>
</div>


               

            <div class="form-group">
                <label for="inputName">Schedule Date</label>
                <input type="date" id="scheduledate" name='schedule_date' class="form-control">
              </div>
            
              <!-- <div class="form-group">
                <label for="inputName">Image</label>
                <input type="file" id="file" name='file' onblur="this.value=removeSpaces(this.value);" class="form-control"/>
              </div> -->
              <div class="form-group">
                <label for="inputDescription">Start Time</label>
                <input type="time" id="start_time" class="form-control" name="start_time">
              </div>

              <div class="form-group">
                <label for="inputDescription">End Time</label>
                <input type="time" id="end_time" class="form-control" name="end_time">
              </div>

              <div class="form-group">
              <label for="inputName">Avg Consulting Time</label>
              <select id="inputStatus" name="avg_slot_timing" class="form-control custom-select">
                  <option selected="" disabled="">Select Consulting Time</option>
                  <option value="10 mint">10 mint</option>
                  <option value="15 mint">15 mint</option>
                  <option value="20 mint">20 mint</option>
                  <option value="30 mint">30 mint</option>
                </select>
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



  