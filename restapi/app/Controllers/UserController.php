<?php

namespace App\Controllers;

use App\Libraries\Oauth;
use \OAuth2\Request;
use CodeIgniter\API\ResponseTrait;

class UserController extends BaseController
{
    use ResponseTrait;

    public $session;

    public function __construct()
    {
        $this->input = \Config\Services::request();
        $this->session = \Config\Services::session();
        helper(array('form','url'));
    }


    public function index(){
        echo "<font color='red'>Here i am!</font>";
        return;
    }

    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $_SERVER['PHP_AUTH_USER'] = 'client';
            $_SERVER['PHP_AUTH_PW'] = 'secret';
            $oauth = new Oauth();
            $request = new Request();

            if($respond = $oauth->server->handleTokenRequest($request->createFromGlobals())){
            //$code = $respond->getStatusCode();
            $body = $respond->getResponseBody();
            //if($this->respond(json_decode($body),$code)){
                $this->session->set('access_token',json_decode($body)->access_token);
                $this->session->set('token_type',json_decode($body)->token_type);  
                return redirect()->to(site_url('blog'));
            } 
        }
        else
        {
            if(!is_null($this->session->get('access_token')))
            {
                return redirect()->to(site_url('blog'));  
            }
            else
            {
                return view('login');
            }
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(site_url('user/login'));
    }

    public function _remap($method,$param =null){
        if(method_exists($this,$method)){
            return $this->$method($param);
        }else{
            return view('static/404');
        }
    }
}
