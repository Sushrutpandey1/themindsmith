<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Articles_Model;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;
use \Firebase\JWT\KEY;

class Articles_api_controller extends BaseController
{
    use ResponseTrait;
    // public function insert()
    // {
    //     helper(['form']);
    //     $rules = [
    //         'user_name'          => 'required|min_length[5]|max_length[50]',
    //         'user_email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[add_user.user_email]',
    //         'user_phone'      => 'required|min_length[10]|max_length[15]',
    //         'user_password'  => 'required|min_length[6]|max_length[200]',
    //         'user_confirm_password'=>'matches[user_password]'
    //     ];
    //     if(!$this->validate($rules)) return $this->fail($this->validator->getErrors());
    //     $data = [
    //         // 'email'     => $this->request->getVar('email'),
    //         // 'confpassword'  => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
    //         // 'password'  => md5($this->request->getVar('password'), PASSWORD_BCRYPT) 
    //         'user_name'     => $this->request->getVar('user_name'),
    //         'user_email'    => $this->request->getVar('user_email'),
    //         'user_phone'     => $this->request->getVar('user_phone'),
    //         'user_password' => md5($this->request->getVar('user_password'), PASSWORD_DEFAULT)
    //     ];
    //     $model = new User_Model();
    //     $registered = $model->insert($data);
    //     $this->respondCreated($registered);
    //     return $this->respondCreated([
    //         'status' => 1,
    //         'message' => 'User Create Successfully'
    //     ]);
    // }


    // public function login()
    // {
    //     $users = new User_Model();
    //     $user_email = $this->request->getVar('user_email');
    //     $user_password = $this->request->getVar('user_password');
    //     $is_email = $users->where('user_email', $user_email)->first();
    //     if ($is_email) {
    //         $verify_password = md5($this->request->getVar('user_password'), PASSWORD_DEFAULT);
    //         if ($verify_password) {
    //             $key = "hellorashu";
    //             $payload = [
    //                 "iss" => "localhost",
    //                 "aud" => "localhost",
    //                 // we can also use exprire time in seconds
    //                 "data" => [
    //                     'user_id' => $is_email['user_id'],
    //                     'user_name' => $is_email['user_name'],
    //                     'user_email' => $is_email['user_email']
    //                 ]
    //             ];
    //             $jwt = JWT::encode($payload, $key, 'HS256');
    //             return $this->respondCreated([
    //                 'status' => 1,
    //                 'jwt' => $jwt,
    //                 'message' => 'User Login Successfully',
    //             ]);
    //         } else {
    //             return $this->respondCreated([
    //                 'status' => 0,
    //                 'message' => 'Invalid Email and Password',
    //             ]);
    //         }
    //     } else {
    //         return $this->respondCreated([
    //             'status' => 0,
    //             'message' => 'Email is not found',
    //         ]);
    //     }
    // }


    // public function readUser()
    // {
    //     $request = service('request');
    //     $key = "hellorashu";
    //     $headers = $request->getHeader('authorization');
    //     $jwt = $headers->getValue();
    //     $userData = JWT::decode($jwt, new KEY($key, 'HS256'));
    //     $users = $userData->data;
    //     return $this->respond([
    //         'status' => 1,
    //         'users' => $users
    //     ]);
    // }


    public function AllArticles()
    {
        $model = new Articles_Model();
        $data['AllArticles'] = $model->orderBy('articles_id', 'DESC')->findAll();
        return $this->respond($data);
        // $request = service('request');
        // $key = "hellorashu";
        // $headers = $request->getHeader('authorization');
        // $jwt = $headers->getValue('user_id');
        // $userData = JWT::decode($jwt, new KEY($key, 'HS256'));
        // $users = $userData->data;
        // return $this->respond([
        //     'status' => 1,
        //     'users' => $users
        // ]);
    
    }



}
