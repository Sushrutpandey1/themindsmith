<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\slot_model;
use App\Models\doctor_Model;


class add_schedule_slot_controller extends BaseController
{
    public function index()
    {

        $model = new doctor_Model();
        // $data['doctor_name'] = $model->where('doctor_id ')->first();
        $data['doctor_name'] = $model->findAll();

        

        echo view('admin/header');
    	echo view('admin/sidebar');
        echo view('/admin/application/add_schedule_slot',$data);
    	echo view('admin/footer');
    }



    public function add_doc_slot(){
        helper(['form']);
    
        $rules = [
            'doctors_name'    => 'required',
            // 'file'           =>  'required',
            'schedule_date'    => 'required',
            'start_time'     => 'required',
            'end_time'      => 'required',
            'avg_slot_timing' => 'required'
        ];
         
        if($this->validate($rules)){
            $model = new slot_model();
            $data = [
                'doctor_id'  => $this->request->getVar('doctor_id'),
                'doctors_name'    => $this->request->getVar('doctors_name'),
                'schedule_date'     =>$this->request->getVar('schedule_date'),
                'start_time'    => $this->request->getVar('start_time'),
                'end_time'     => $this->request->getVar('end_time'),
                'avg_slot_timing'     => $this->request->getVar('avg_slot_timing'),
            ];

            // print_r($data);
            $usersModel = new \App\Models\slot_model();
            $query = $usersModel->insert($data);
            return redirect()->to('/add_schedule_slot_controller');
        }else{
            $data['validation'] = $this->validator;
            echo view('admin/header');
    	    echo view('admin/sidebar');
            echo view('/admin/application/add_schedule_slot',$data);
    	    echo view('admin/footer');
        }
    
    }


    public function slot_list(){
        $model = new slot_model();
        // $data['homedata'] = $model->where('id',$id)->first();
        $data['slotlist'] = $model->findAll();
    
            echo view('admin/header');
    	    echo view('admin/sidebar');
            echo view('/admin/application/slot_list',$data);
    	    echo view('admin/footer');
    }



    public function deleteslot($slot_id){
        $model = new slot_model();
        $model->where('slot_id',$slot_id)->delete();
        return redirect()->to(base_url('add_schedule_slot_controller/slot_list'));
        
    }


}


