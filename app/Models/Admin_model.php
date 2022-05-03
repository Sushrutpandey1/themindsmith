<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_model extends Model
{
  
  protected $table = 'admin_login';
  protected $primary = 'admin_id'; 
  protected $useAutoIncrement = true;
  protected $allowedFields = ['admin_name', 'admin_email', 'admin_password'];
}



?>