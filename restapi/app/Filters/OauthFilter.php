<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

use \App\Libraries\Oauth;
use \OAuth2\Request;
use \OAuth2\Response;

class OauthFilter implements FilterInterface
{
    public $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function before(RequestInterface $request, $arguments = null)
    {
        $_SERVER['HTTP_AUTHORIZATION'] = $this->session->get('token_type')." ".$this->session->get('access_token');
        $oauth = new Oauth();
        $request = Request::createFromGlobals();
        $response = new Response();
        if(!$oauth->server->verifyResourceRequest($request)){
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('user/login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}