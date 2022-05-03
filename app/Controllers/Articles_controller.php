<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Articles_Model;

class Articles_controller extends BaseController
{
    public function index()
    {
        echo view('admin/header');
    	echo view('admin/sidebar');
        echo view('/admin/application/add_Articles');
    	echo view('admin/footer');
       
    }

    public function add_article(){

        helper(['form']);

        $rules = [
            // 'file'    => 'required',
            'article_link'           =>  'required',
            // 'file1'    => 'required',
            'article_description'     => 'required'
         
        ];

        if($this->validate($rules)){
            $model = new Articles_Model();

            $file = $this->request->getFile('file');
            $name = $file->getRandomName();
            $file->move(WRITEPATH . '../public/uploads',$name); 

            $file1 = $this->request->getFile('file1');
            $name1 = $file1->getRandomName();
            $file1->move(WRITEPATH . '../public/uploads',$name1); 

            $article_link = $this->request->getVar('article_link');
            $article_description = $this->request->getVar('article_description');
                
          $data = [
              'article_thumbnail_img'=>$name,
              'article_link'=>$article_link,
              'article_play_image'=>$name1,
              'article_description'=> $article_description
         ];

         print_r($data);

         $usersModel = new \App\Models\Articles_Model();
         $query = $usersModel->insert($data);
         return redirect()->to('/Articles_controller');
        

        }else{
            $data['validation'] = $this->validator;
            echo view('admin/header');
    	    echo view('admin/sidebar');
            echo view('/admin/application/add_articles',$data);
    	    echo view('admin/footer');
        }
 

    }


    public function article_list(){
        $model = new Articles_Model();
        // $data['homedata'] = $model->where('id',$id)->first();
        $data['articlelist'] = $model->findAll();
    
            echo view('admin/header');
    	    echo view('admin/sidebar');
            echo view('/admin/application/article_list',$data);
    	    echo view('admin/footer');
    }


    public function deletearticle($articles_id){
        $model = new Articles_Model();
        $model->where('articles_id',$articles_id)->delete();
        return redirect()->to(base_url('Articles_controller/article_list'));
        
    }


}
