<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class BlogModel extends Model{
        // protected $table = 'blog';
        // protected $primaryKey = 'id';
        // protected $allowedFields = ['title','description'];

        public function getData($sql){
            $db = \Config\Database::connect();
            $result = $db->query($sql);
            $data = $result->getResult();
            if(count($data)>0){
                return $data;
            }else{
                return false;
            }
        }

        public function setData($sql){
            $db = \Config\Database::connect();
            if($db->query($sql)){
                return true;
            }else{
                return false;
            }
            
        }
    }