<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailController extends CI_Controller
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
    }
    public function insert()
    {

        $IdUser  =   $this->session->userdata('IdUser');
        $data = array(
            'IdCart' => null,
            'IdUser' => $IdUser,
            'IdProduct' => $this->input->post('IdProduct'),
            'Qty' => $this->input->post('Qty'),
            'Total' => $this->input->post('TotalBox'),
            'StatusCode' => 'Cart'
        );

        $data = $this->ProductModel->Insert('cart', $data);
        redirect(base_url('/shop'), 'refresh');
    }
    public function index($IdProduct)
    {
        $data = $this->ProductModel->GetWhere('product', array('IdProduct' => $IdProduct));
        $data = array('product' => $data);
        $name  =   $this->session->userdata('nama');
        $status = $this->session->userdata('status');
        $data['name'] = $name;
        $data['status'] = $status;
        $this->load->view('template/header', $data);
        $this->load->view('details', $data);
        $this->load->view('template/footer');
    }
}
