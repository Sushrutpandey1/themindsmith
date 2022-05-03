<?php

namespace App\Models;

use CodeIgniter\Model;

class slot_model extends Model
{
  
  protected $table = 'add_schedule_slot';
  protected $primary = 'slot_id'; 
  protected $useAutoIncrement = true;
  protected $allowedFields = ['doctor_id','doctors_name', 'schedule_date','start_time','end_time','avg_slot_timing'];
}



?>


