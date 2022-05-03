<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\doctor_Model;

class Doctor_controller extends BaseController
{
    public function index()
    {
        echo view('admin/header');
    	echo view('admin/sidebar');
        echo view('/admin/application/add_doctors');
    	echo view('admin/footer');
       
    }



    public function add_doctors(){
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
         
        if($this->validate($rules)){
            $model = new doctor_Model();

            $file = $this->request->getFile('file');
            $name = $file->getRandomName();
            $file->move(WRITEPATH . '../public/uploads',$name);  

            $data = [
                'doctor_name'     => $this->request->getVar('doctor_name'),
                'doctor_image'     =>$name,
                'doctor_number'    => $this->request->getVar('doctor_number'),
                'doctor_address'     => $this->request->getVar('doctor_address'),
                'doctor_qualification'     => $this->request->getVar('doctor_qualification'),
                'doctor_speciality'    => $this->request->getVar('doctor_speciality'),
                'doctor_experience'     => $this->request->getVar('doctor_experience'),
                'doctor_clinic_location'     => $this->request->getVar('doctor_clinic_location'),
                'doctor_clinic_number'    => $this->request->getVar('doctor_clinic_number'),
                'doctor_email'     => $this->request->getVar('doctor_email'),
                'doctor_password' => md5($this->request->getVar('doctor_password'), PASSWORD_DEFAULT),
                'doctor_fee'     => $this->request->getVar('doctor_fee'),
                'doctor_status'    => $this->request->getVar('doctor_status')

            ];

            // print_r($data);
            $usersModel = new \App\Models\doctor_Model();
            $query = $usersModel->insert($data);
            return redirect()->to('/Doctor_controller');
        }else{
            $data['validation'] = $this->validator;
            echo view('admin/header');
    	    echo view('admin/sidebar');
            echo view('/admin/application/add_doctors',$data);
    	    echo view('admin/footer');
        }
    
    }


    public function doc_list(){
        $model = new doctor_Model();
        // $data['homedata'] = $model->where('id',$id)->first();
        $data['doclist'] = $model->findAll();
    
            echo view('admin/header');
    	    echo view('admin/sidebar');
            echo view('/admin/application/doctors_list',$data);
    	    echo view('admin/footer');
    }



    public function deletedoc($doctor_id){
        $model = new doctor_Model();
        $model->where('doctor_id',$doctor_id)->delete();
        return redirect()->to(base_url('Doctor_controller/doc_list'));
        
    }


}


