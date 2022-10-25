<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\BlogModel;

class BlogController extends Controller
{
    //protected $modelName = 'App\Models\BlogModel';
    //protected $format = 'json';

        public $bm;
        public $input;
        public $session;
        public function __construct()
        {
            $this->bm = new BlogModel();
            $this->input = \Config\Services::request();
            $this->session = \Config\Services::session();
            helper(array('form','url'));
        }

    public function index(){
        $sql = "select * from blog";
        $posts = $this->bm->getData($sql);
        //$result = $this->respond($posts);
        $data['posts'] = $posts;
        return view('blog',$data);
    }

    public function create(){
        helper(['form']);
        $data = [];

        $rules = [
            'title' => 'required',
            'description' => 'required',
        ];

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            if(!$this->validate($rules)){
                $data['validator'] = $this->validator;
                return view('create',$data);
            }else{
                $title = htmlspecialchars($this->input->getpost('title'));
                $description = htmlspecialchars($this->input->getpost('description'));
                $sql = "INSERT INTO blog(title,description,created_at) VALUES('$title','$description',NOW())";
                if($this->bm->setData($sql)){
                    $this->session->setTempdata('success','<div class="alert alert-success" role="alert"> post added successfully! </div>',5);
                }else{
                    $this->session->setTempdata('error','<div class="alert alert-danger" role="alert"> failed! please try again later </div>',5);
                }
                return redirect()->to(site_url('blog'));
            }
        }
        else
        {
            return view('create');
        }
    }

    public function edit($id = null){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $id = $this->input->getpost('id');
        }

        $rules = [
            'title' => 'required',
            'description' => 'required',
        ];

        if(isset($_POST['send']))
        {
            $data['flag'] = 'update';
            if(!$this->validate($rules)){
                $data['validator'] = $this->validator;
                return view('edit',$data);
            }else{
                $id = htmlspecialchars($this->input->getpost('id'));
                $title = htmlspecialchars($this->input->getpost('title'));
                $description = htmlspecialchars($this->input->getpost('description'));
                $sql = "UPDATE blog SET title = '$title', description = '$description' , edited_at = NOW() WHERE id = '$id'";
                if($this->bm->setData($sql)){
                    $this->session->setTempdata('success','<div class="alert alert-success" role="alert"> post updated successfully! </div>',5);
                }else{
                    $this->session->setTempdata('error','<div class="alert alert-danger" role="alert"> failed! please try again later </div>',5);
                }
                return redirect()->to(site_url('blog'));
            }
        }
        else
        {
            $sql = "select * FROM blog where id = '$id'";
            $posts = $this->bm->getData($sql);
            $data['flag'] = 'edit';
            $data['posts'] = $posts;
            return view('edit',$data);
        }
    }

    public function delete($id = null){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $id = $this->input->getpost('id');
        }
        $sql = "DELETE FROM blog WHERE id = '$id'";

        if($this->bm->setData($sql)){
            $this->session->setTempdata('success','<div class="alert alert-success" role="alert"> post deleted successfully! </div>',5);
        }else{
            $this->session->setTempdata('error','<div class="alert alert-danger" role="alert"> failed! please try again later </div>',5);
        }
        return redirect()->to(site_url('blog'));
    }

    public function _remap($method,$param =null){
        if(method_exists($this,$method)){
            return $this->$method($param);
        }else{
            return view('static/404.php');
        }
    }
}
