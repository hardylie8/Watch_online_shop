<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SignUpController extends CI_Controller
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
        $name  =   $this->session->userdata('nama');
        if (isset($name)) {
            redirect(base_url('/'), 'refresh');
        }
    }
    public function singIn()
    {
        $username = set_value('username');
        $password = set_value('password');
        $passconf = set_value('passconf');
        if ($password == $passconf && $username != '' && $passconf != '' && $password != '') {
            $data = array(
                'IdUser' => null,
                'Password' => md5($password),
                'Nama' => $username,
                'Level' => 'User'
            );
            $data = $this->ProductModel->Insert('account', $data);
            $insert_id = $this->db->insert_id();
            $data_session = array(
                'IdUser' => $insert_id,
                'nama' => $username,
                'status' => 'User'
            );
            $this->session->set_userdata($data_session);
            redirect(base_url('/'), 'refresh');
        }
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
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('signup');
            $this->load->view('template/footer');
        } else {
            $this->singIn();
        }
    }
}
