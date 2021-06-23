<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->library('session');
    }

    public function index()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required'
        );

        $name  =   $this->session->userdata('nama');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('login');
            $this->load->view('template/footer');
        } else {
            $this->login_action();
        }
    }
    public function login_action()
    {
        $username = set_value('username');
        $password = set_value('password');
        $where = array(
            'nama' => $username,
            'Password' => md5($password)
        );
        $cek = $this->ProductModel->GetWhere("account", $where);
        if (count($cek) > 0) {
            $data_session = array(
                'IdUser' => $cek[0]['IdUser'],
                'nama' => $username,
                'status' =>  $cek[0]['Level']
            );
            $this->session->set_userdata($data_session);
            redirect(base_url("/"));
        } else {
            echo "Username dan password salah!";
        }
    }
    function logout()
    {
        session_destroy();
        redirect(base_url("login"));
    }
}
