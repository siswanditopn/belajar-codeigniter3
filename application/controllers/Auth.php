<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Login";
        $this->load->view('template/auth_header');
        $this->load->view('auth/login');
        $this->load->view('template/auth_footer');
    }

    public function registration()
    {
        $data['title'] = "Registration";
        $this->load->view('template/auth_header', $data);
        $this->load->view('auth/registration');
        $this->load->view('template/auth_footer');
    }
}
