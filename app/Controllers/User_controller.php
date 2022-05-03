<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\User_Model;

class User_controller extends BaseController
{
    public function index()
    {
        echo view('admin/header');
    	echo view('admin/sidebar');
        echo view('/admin/application/add_user');
    	echo view('admin/footer');
       
    }


    public function add_user(){
        /* include helper form */
        helper(['form']);
        /* set rules validation form */
        $rules = [
            'user_name'          => 'required|min_length[5]|max_length[50]',
            'user_email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[add_user.user_email]',
            'user_phone'      => 'required|min_length[10]|max_length[15]',
            'user_password'  => 'required|min_length[6]|max_length[200]',
            'user_confirm_password'=>'matches[user_password]'
        ];
         
        if($this->validate($rules)){
            $model = new user_Model();

            $file1 = $this->request->getFile('file1');
            $name1 = $file1->getRandomName();
            $file1->move(WRITEPATH . '../public/uploads',$name1);  

            $file2 = $this->request->getFile('file2');
            $name2 = $file2->getRandomName();
            $file2->move(WRITEPATH . '../public/uploads',$name2);  

            $file3 = $this->request->getFile('file3');
            $name3 = $file3->getRandomName();
            $file3->move(WRITEPATH . '../public/uploads',$name3);  


            $data = [
                'user_name'     => $this->request->getVar('user_name'),
                'user_image'     => $name1,
                'user_email'    => $this->request->getVar('user_email'),
                'user_phone'     => $this->request->getVar('user_phone'),
                'user_password' => md5($this->request->getVar('user_password')),
                'aadhar_name'     => $this->request->getVar('aadhar_name'),
                'aadhar_card_no'    => $this->request->getVar('aadhar_card_no'),
                'gender'     => $this->request->getVar('gender'),
                'front_image_aadhar' =>$name2,
                'back_image_aadhar' => $name3
            ];

            print_r($data);
            $usersModel = new \App\Models\user_Model();
            $query = $usersModel->insert($data);
            return redirect()->to('/User_controller');
        }else{
            $data['validation'] = $this->validator;
            echo view('admin/header');
    	    echo view('admin/sidebar');
            echo view('/admin/application/add_user',$data);
    	    echo view('admin/footer');
        }
         
    }


    public function user_list(){
        $model = new User_Model();
        // $data['homedata'] = $model->where('id',$id)->first();
        $data['userlist'] = $model->findAll();
    
            echo view('admin/header');
    	    echo view('admin/sidebar');
            echo view('/admin/application/user_list',$data);
    	    echo view('admin/footer');
    }



    public function deleteuser($user_id){
        $model = new user_Model();
        $model->where('user_id',$user_id)->delete();
        return redirect()->to(base_url('User_controller/user_list'));
        
    }


}




















