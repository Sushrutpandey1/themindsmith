<?php

namespace App\Models;

use CodeIgniter\Model;

class doctor_Model extends Model
{
  
  protected $table = 'add_doctors';
  protected $primary = 'doctor_id '; 
  protected $useAutoIncrement = true;
  protected $allowedFields = ['doctor_name', 'doctor_image', 
  'doctor_number','doctor_address',
  'doctor_qualification','doctor_speciality',
  'doctor_experience','doctor_clinic_location',
  'doctor_clinic_number',
  'doctor_email','doctor_password','doctor_fee','doctor_status'];
}



?>