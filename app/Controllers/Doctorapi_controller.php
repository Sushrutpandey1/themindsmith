<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\doctor_Model;
use App\Models\slot_model;

use \Firebase\JWT\JWT;
use \Firebase\JWT\KEY;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Doctorapi_controller extends BaseController
{
    use ResponseTrait;
    
    public function insertdoc()
    {
        helper(['form']);
        $rules = [
            'doctor_name'    => 'required|min_length[5]|max_length[50]',
            // 'file'           =>  'required',
            'doctor_number'    => 'required|min_length[10]|max_length[15]',
            'doctor_address'     => 'required|min_length[10]|max_length[5000]',
            'doctor_qualification'      => 'required|min_length[3]|max_length[5000]',
            'doctor_speciality'       =>'required|min_length[2]|max_length[5000]',
             'doctor_experience'           =>'required|min_length[0]|max_length[5000]',
             'doctor_clinic_location'         => 'required|min_length[10]|max_length[50000]',
            'doctor_clinic_number'       => 'required|min_length[10]|max_length[15]',
             'doctor_email'            =>'required|min_length[6]|max_length[50]|valid_email|is_unique[add_doctors.doctor_email]',
             'doctor_password'         => 'required|min_length[6]|max_length[200]',
             'doctor_confirm_password'          => 'matches[doctor_password]',
           'doctor_fee'              => 'required|min_length[3]|max_length[5]',
         'doctor_status'           => 'required|min_length[3]|max_length[15]'
        ];
        if(!$this->validate($rules)) return $this->fail($this->validator->getErrors());


        // $file = $this->request->getFile('file');
        // $name = $file->getRandomName();
        // $file->move(WRITEPATH . '../public/uploads',$name);  

        $data = [
            'doctor_name'     => $this->request->getVar('doctor_name'),
            // 'doctor_image'     =>$name,
            'doctor_number'    => $this->request->getVar('doctor_number'),
            'doctor_address'     => $this->request->getVar('doctor_address'),
            'doctor_qualification'     => $this->request->getVar('doctor_qualification'),
            'doctor_speciality'    => $this->request->getVar('doctor_speciality'),
            'doctor_experience'     => $this->request->getVar('doctor_experience'),
            'doctor_clinic_location'     => $this->request->getVar('doctor_clinic_location'),
            'doctor_clinic_number'    => $this->request->getVar('doctor_clinic_number'),
            'doctor_email'     => $this->request->getVar('doctor_email'),
            'doctor_password' => md5($this->request->getVar('doctor_password')),
            'doctor_fee'     => $this->request->getVar('doctor_fee'),
            'doctor_status'    => $this->request->getVar('doctor_status')

        ];
        $model = new doctor_Model();
        $registered = $model->insert($data);
        $this->respondCreated($registered);
        return $this->respondCreated([
            'status' => 1,
            'message' => 'User Create Successfully'
        ]);
    }


    public function login()
    {
        $session = session();

        $userModel = new doctor_Model();
        
        $doctor_email = $this->request->getVar('doctor_email');
        $doctor_password =md5($this->request->getVar('doctor_password'));
        
        $data = $userModel->where('doctor_email', $doctor_email)->where('doctor_password', $doctor_password)->first();
        
        if($data){
                $key = "hellorashu";
                $payload = [
                    "iss" => "localhost",
                    "aud" => "localhost",
                    // we can also use exprire time in seconds
                    "data" => [
                        'doctor_id' => $data['doctor_id'],
                        'doctor_name' => $data['doctor_name'],
                        'doctor_image' => $data['doctor_image'],
                        'doctor_number' => $data['doctor_number'],
                        'doctor_address' => $data['doctor_address'],
                        'doctor_qualification' => $data['doctor_qualification'],
                        'doctor_speciality' => $data['doctor_speciality'],
                        'doctor_experience' => $data['doctor_experience'],
                        'doctor_clinic_location' => $data['doctor_clinic_location'],
                        'doctor_clinic_number' => $data['doctor_clinic_number'],
                        'doctor_email' => $data['doctor_email'],
                        'doctor_password' => $data['doctor_password'],
                        'doctor_fee' => $data['doctor_fee'],
                        'doctor_status' => $data['doctor_status']
                      
                    ]
                ];
                $jwt = JWT::encode($payload, $key, 'HS256');
                return $this->respondCreated([
                    'status' => 1,
                    'jwt' => $jwt,
                    'message' => 'User Login Successfully',
                ]);
        
                $session->set($jwt);
                return $this->respondCreated([
                    'status' => 1,
                    'jwt' => $jwt,
                    'message' => 'User Login Successfully',
                ]);
            
            }else{
                return $this->respondCreated([
                    'status' => 0,
                    'jwt'=>null,
                    'message' => 'Password or email is incorect',
                ]);
            
            }
    }


    public function readdoc()
    {
        $request = service('request');
        $key = "hellorashu";
        $headers = $request->getHeader('authorization');
        $jwt = $headers->getValue();
        $userData = JWT::decode($jwt, new KEY($key, 'HS256'));
        $users = $userData->data;
        return $this->respond([
            'status' => 1,
            'users' => $users
        ]);
    }


    public function AllDoctors()
    {
        $model = new doctor_Model();
        $data['AllDoctors'] = $model->orderBy('doctor_id', 'DESC')->findAll();
        return $this->respond($data);
    
    
    }


    public function getdoc($doctor_id=null){
        $apiModel = new doctor_Model();
        $doctor_id = $this->request->getVar('doctor_id');
     
        $data = $apiModel->where(['doctor_id'=> $doctor_id])->first();
        if($data){
            return $this->respond([
                'status' => 1,
                'data' => $data,
                'message' => 'User found',
            ]);
        }else{
            return $this->respondCreated([
                'status' => 0,
                'data' => $null,
                'message' => 'user not found',
            ]);
        }
            
            
    }


    
    
    public function slot_list(){
        $model = new slot_model();
        $data['doc_slot'] = $model->orderBy('doctor_id', 'DESC')->findAll();
        return $this->respond($data);

    }


    public function slot_by_doc_id(){
        $apiModel = new slot_model();
        $doctor_id = $this->request->getVar('doctor_id');
     
        $data = $apiModel->where(['doctor_id'=> $doctor_id])->findAll();
        if($data){
            return $this->respond([
                'status' => 1,
                'data' => $data,
                'message' => 'User found',
            ]);
        }else{
            return $this->respondCreated([
                'status' => 0,
                'data' => $null,
                'message' => 'user not found',
            ]);
        }

    }


}