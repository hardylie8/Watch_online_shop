<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderController extends CI_Controller
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
    public function update($id)
    {
        $where  = array('IdCart' => $id);
        $res = $this->ProductModel->Update('cart', array('StatusCode' => 'Delivered'), $where);
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function index()
    {
        $name  =   $this->session->userdata('nama');
        $status = $this->session->userdata('status');
        if (isset($status) && $status == 'Admin') {
            $d = array();
            $res = $this->ProductModel->GetWhereOr('cart', 'StatusCode != "Cart" ');
            foreach ($res as $data) {
                $this->db->select('*')
                    ->from('cart AS t1, product AS t2')
                    ->where('t2.IdProduct =' . $data['IdProduct'])
                    ->where('t1.IdProduct =' . $data['IdProduct'])
                    ->where('t1.IdCart = ' . $data['IdCart']);
                $da = $this->db->get();
                $da = $da->row_array();
                array_push($d, $da);
            }
            $data = array('order' => $d);
            $data['name'] = $name;
            $data['status'] = $status;
            $this->load->view('template/header', $data);
            $this->load->view('Order', $data);
            $this->load->view('template/footer');
        }
    }
}
