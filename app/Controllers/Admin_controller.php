<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Admin_model;

class Admin_controller extends BaseController
{
    public function index()
    {
    	helper(['form']);
        echo view('admin/login');
    }

    public function loginAuth(){

        $session = session();

        $userModel = new Admin_model();

        $email = $this->request->getVar('admin_email');
        $password =md5($this->request->getVar('admin_password'));
        
        $data = $userModel->where('admin_email', $email)->where('admin_password', $password)->first();
        
        if($data){
                $ses_data = [
                    'admin_id' => $data['admin_id'],
                    'admin_name' => $data['admin_name'],
                    'admin_email' => $data['admin_email'],
                    'admin_password' => $data['admin_password'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);
                return redirect()->to('Admin_controller/dasboard');
            
            }else{
                $session->setFlashdata('msg', 'Password or Email is incorrect');
                return redirect()->to('Admin_controller');
            }

    }
    
    public function dasboard(){
        
        // return redirect()->to('Admin_controller');

    	echo view('admin/header');
    	echo view('admin/sidebar');
    	echo view('admin/index');
    	echo view('admin/footer');
    }

    public function logout(){

        $session = session();
        $session->destroy();
        return redirect()->to('/Admin_controller');
          
    }


}
