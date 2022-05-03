<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User_Model;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;
use \Firebase\JWT\KEY;

class Userapi_controller extends BaseController
{
    use ResponseTrait;
    public function insert()
    {

        helper(['form']);
        $rules = [
            'user_name'   => 'required|min_length[5]|max_length[50]',
            'user_email'  => 'required|min_length[6]|max_length[50]|valid_email|is_unique[add_user.user_email]',
            'user_phone'   => 'required|min_length[10]|max_length[15]',
            'user_password' => 'required|min_length[6]|max_length[200]',
            'user_confirm_password' =>'matches[user_password]'
        ];
        if(!$this->validate($rules)) return $this->fail($this->validator->getErrors());


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
            // 'email'     => $this->request->getVar('email'),
            // 'confpassword'  => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            // 'password'  => md5($this->request->getVar('password'), PASSWORD_BCRYPT) 
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
        $model = new User_Model();
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

        $userModel = new User_Model();
        
        $user_email = $this->request->getVar('user_email');
        $user_password =md5($this->request->getVar('user_password'));
        
        $data = $userModel->where('user_email', $user_email)->where('user_password', $user_password)->first();
        
        if($data){
                $key = "hellorashu";
                $payload = [
                    "iss" => "localhost",
                    "aud" => "localhost",
                    // we can also use exprire time in seconds
                    "data" => [
                        'user_id' => $data['user_id'],
                        'user_name' => $data['user_name'],
                        'user_email' => $data['user_email']
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


    public function readUser()
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


    public function readAllUser()
    {
   
        $model = new User_Model();
        $data['Alluser'] = $model->orderBy('user_id', 'DESC')->findAll();
        return $this->respond($data);
    }


    public function getuser(){
         $apiModel = new User_Model();
        $user_id = $this->request->getVar('user_id');
     
        $data = $apiModel->where(['user_id'=> $user_id])->first();
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

  
    public function delete(){
        $apiModel = new User_Model();
        $user_id = $this->request->getVar('user_id');
     
        $data = $apiModel->where(['user_id'=> $user_id])->first();
        

        if($data){
            $apiModel->where(['user_id'=> $user_id])->delete();
           
            return $this->respondCreated([
                'status' => 1,
                'message' => 'user deleted successfully',
            ]);


        }else{
            return $this->respondCreated([
                'status' => 0,
                'message' => 'user not found to deleted',
            ]);
        }
    }


      // update product
      public function update($user_id = null)
      {
          $model = new User_Model();
          $json = $this->request->getJSON();
          if($json){
              $data = [
                  'user_name' => $json->user_name
                //   'product_price' => $json->product_price
              ];
          }else{
              $input = $this->request->getRawInput();
              $data = [
                  'user_name' => $input['user_name']
                //   'product_price' => $input['product_price']
              ];
          }
          // Insert to Database
          $model->update($user_id, $data);
          $response = [
              'status'   => 200,
              'error'    => null,
              'messages' => [
                  'success' => 'Data Updated'
              ]
          ];
          return $this->respond($response);
      }




}
