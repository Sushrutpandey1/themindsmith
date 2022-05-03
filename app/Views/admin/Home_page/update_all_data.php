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
<!-- <script type="text/javascript">



	$(document).ready(function(){


		var html = '<tr><td><input  type="file" name="file[]" id="file" /></td><td><input class="form-control" type="text" name="heading[]"></td><td><textarea class="form-control" name="content[]" rows="4"></textarea></td><td><input class="form-control" type="url" name="button_link[]"></td><td><input class="btn btn-warning" type="button" name="remove" id="remove" value="remove"></tr></tr>';

         var max=5;
		var x = 1;
		$('#add').click(function(){
           if(x <= max){
           	$('#table_field').append(html);
           	x++;
           }var_exportwe
		});
    
    $('#table_field').on('click','#remove',function(){
           $(this).closest('tr').remove();
           x--;
		});

        

	});



</script>

<style type="text/css">
	
.ram{

   color: #ff5e00c7;
   text-align: center;
   font-size: 100px;

}



.insert_form{
	background-color: pink;
}
 -->

<!-- </style> -->





</head>
<body>
<div class="container">
	<form  action="<?php echo base_url('Home_page_controller/dataupdate'); ?>" method="post" enctype="multipart/form-data">
		
		
		<div class="input-field">
			<table class="table table-bordered" id="table_field">
				<tr>
				
					<th>image</th>
          <th>heading</th>
          <th>Contant</th>
          <th>Link</th>
					<!-- <th>Add or Remove</th> -->
				</tr>
        

				<tr>

                <?php if($homedata): ?>
                <?php foreach ($homedata as $data) : ?>
                <div class="form-group">
                    <td><input  type="file" name="file[]" id="file"  value="<?php echo $data['banner_image']; ?>" /></td>
                    

                    <img src="<?php echo  base_url().'/public/uploads/'.$data['banner_image'];?>" class="hover_img">
                    </div>
                    <input type="hidden" name="data_id" value="<?php echo $data['id'];?>">
                    <div class="form-group">
					          <td><input class="form-control" type="text" name="heading[]" value="<?php echo $data['banner_heading']; ?>"></td>
                                 </div>
                              <div class="form-group">
				           	<td><textarea class="form-control" name="content[]" rows="4"  value="<?php echo $data['banner_content']; ?>"><?php echo $data['banner_content']; ?></textarea></td>
                                      </div>
                               <div class="form-group">
                    <td><input class="form-control" type="url" name="button_link[]"  value="<?php echo $data['banner_link']; ?>"></td>
                            </div>
				    

					<!-- <td><input class="btn btn-warning" type="button" name="add" id="add" value="Add"></td> -->

				</tr>
			</table>
		
		</div>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">What mfin Does</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
         
            <div class="card-body">
            
              <div class="form-group">
                <label for="inputName">Add Heading</label>
                <input type="text" id="inputheading" name='heading_what[]'  value="<?php echo $data['mfindoes_heading']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Heading Description</label>
                <textarea id="inputDescription" name="description[]"  value="<?php echo $data['mfindoes_content']; ?>" class="form-control" rows="4"><?php echo $data['mfindoes_content']; ?></textarea>
              </div>
            </div>
         </div>
        </div>
      </div>


      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Event</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
         
            <div class="card-body">

            <div class="form-group">
                <label for="inputName">Add Heading</label>
                <input type="text" id="inputheading" name='heading_event[]'  value="<?php echo $data['event_heading']; ?>" class="form-control">
              </div>
            
              <div class="form-group">
                <label for="inputName">Add Event Image</label>
                <input type="file" id="file2" name='file2'  value="<?php echo $data['event_image']; ?>" class="form-control"/>
                <td><input  type="hidden" name="old_file[]" id="file"  value="<?php echo $data['banner_image']; ?>" /></td>
                <img src="<?php echo  base_url().'/public/uploads/'.$data['event_image'];?>" class="hover_img">
              </div>
              <div class="form-group">
                <label for="inputDescription">Heading Description</label>
                <textarea id="inputDescription" name="event_description[]"  value="<?php echo $data['event_description']; ?>" class="form-control" rows="4"><?php echo $data['event_description']; ?></textarea>
              </div>
              <div class="form-group">
                <label for="inputDescription">More Event Link</label>
                <input type="url" id="moreevent" class="form-control"  value="<?php echo $data['event_link']; ?>" name="event_link[]">
              </div>
            </div>
         </div>
        </div>
      </div>



      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Success Story</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
         
            <div class="card-body">

            <div class="form-group">
                <label for="inputName">Add Heading</label>
                <input type="text" id="inputheading" name='heading_story[]'  value="<?php echo $data['story_heading']; ?>" class="form-control">
              </div>
            
              <div class="form-group">
                <label for="inputName">Add Story Image</label>
                <input type="file" id="file3" name='file3'  value="<?php echo $data['story_image']; ?>" class="form-control"/>
                <img src="<?php echo  base_url().'/public/uploads/'.$data['story_image'];?>" class="hover_img">
              </div>
              <div class="form-group">
                <label for="inputDescription">Heading Description</label>
                <textarea id="inputDescription" name="story_description[]"  value="<?php echo $data['story_description']; ?>" class="form-control" rows="4"><?php echo $data['story_description']; ?></textarea>
              </div>
              <div class="form-group">
                <label for="inputDescription">More sucess story Link</label>
                <input type="url" id="moreevent" class="form-control"  value="<?php echo $data['story_link']; ?>" name="story_link[]">
              </div>
            </div>
         </div>
        </div>
      </div>



      
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Video Slider</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
         
            <div class="card-body">

            <div class="form-group">
                <label for="inputName">Add Video Image</label>
                <input type="file" id="file4" name='file4'  value="<?php echo $data['video_image1']; ?>" class="form-control">
                <img src="<?php echo  base_url().'/public/uploads/'.$data['video_image1'];?>" class="hover_img">
              </div>
            
              <div class="form-group">
                <label for="inputName">Add Video Link</label>
                <input type="url" id="videolink" class="form-control" name="video_link[]"  value="<?php echo $data['video_link']; ?>">
              </div>
              <div class="form-group">
                <label for="inputName">Add Video Image</label>
                <input type="file" id="file5" name='file5'  value="<?php echo $data['video_image2']; ?>" class="form-control">
                <img src="<?php echo  base_url().'/public/uploads/'.$data['video_image2'];?>" class="hover_img">
              </div>
              <div class="form-group">_
                <label for="inputDescription">Video Description</label>
                <textarea id="videoDescription" name="video_description[]"  value="<?php echo $data['video_description']; ?>" class="form-control" rows="4"><?php echo $data['video_description']; ?>"</textarea>
              </div>
            </div>
         </div>
        </div>
      </div>
      <?php  endforeach; ?>
                                <?php  endif;?>


   
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



  