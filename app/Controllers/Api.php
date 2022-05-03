<?php 

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\User_Model;


class Api extends ResourceController
{

    use ResponseTrait;

    // get all
    // public function index(){
    //   $apiModel = new User_Model();
    //   $data = $apiModel->orderBy('user_id', 'DESC')->findAll();
    //   return $this->respond($data);
    // }

    // create
    public function create() {
        $apiModel = new User_Model();
        $data = [
            'user_name'     => $this->request->getVar('user_name'),
            'user_email'    => $this->request->getVar('user_email'),
            'user_phone'     => $this->request->getVar('user_phone'),
            'user_password' => md5($this->request->getVar('user_password'), PASSWORD_DEFAULT)
        ];
        $apiModel->insert($data);
        $response = [
          'status'   => 201,
          'error'    => null,
          'messages' => [
              'success' => 'Customer created'
          ]
      ];
      return $this->respondCreated($response);
    }

    // single
    public function getCustomer($id = null){
        $apiModel = new User_Model();
        $data = $apiModel->where('user_id', $id)->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('Customer does not exist.');
        }
    }

    // update
    // public function update($id = null){
    //     $apiModel = new ApiModel();
    //     $id = $this->request->getVar('id');
    //     $data = [
    //         'name' => $this->request->getVar('name'),
    //         'email'  => $this->request->getVar('email'),
    //     ];
    //     $apiModel->update($id, $data);
    //     $response = [
    //       'status'   => 200,
    //       'error'    => null,
    //       'messages' => [
    //           'success' => 'Customer updated.'
    //       ]
    //   ];
    //   return $this->respond($response);
    // }

    // delete
    // public function delete($id = null){
    //     $apiModel = new ApiModel();
    //     $data = $apiModel->where('id', $id)->delete($id);
    //     if($data){
    //         $apiModel->delete($id);
    //         $response = [
    //             'status'   => 200,
    //             'error'    => null,
    //             'messages' => [
    //                 'success' => 'Customer deleted'
    //             ]
    //         ];
    //         return $this->respondDeleted($response);
    //     }else{
    //         return $this->failNotFound('Customer does not exist.');
    //     }
    // }

   
}