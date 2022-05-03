<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{
  
  protected $table = 'add_user';
  protected $primary = 'user_id'; 
  protected $useAutoIncrement = true;
  protected $allowedFields = ['user_name','user_image', 'user_email',
  'user_phone','user_password',
  'aadhar_name','aadhar_card_no','gender',
  'front_image_aadhar','back_image_aadhar'];
}



?>


