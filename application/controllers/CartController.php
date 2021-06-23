<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CartController extends CI_Controller
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
        if (!isset($name)) {
            redirect(base_url('/login'), 'refresh');
        }
    }
    public function index()
    {
        $name  =   $this->session->userdata('nama');
        $status = $this->session->userdata('status');
        $d = array();
        $IdUser  =   $this->session->userdata('IdUser');
        $data = $this->ProductModel->GetWhereOr('cart', 'StatusCode = "Cart" and IdUser = ' . $IdUser);
        foreach ($data as $data) {
            $this->db->select('*')
                ->from('cart AS t1, product AS t2')
                ->where('t2.IdProduct =' . $data['IdProduct'])
                ->where('t1.IdProduct =' . $data['IdProduct'])
                ->where('t1.IdCart = ' . $data['IdCart']);
            $da = $this->db->get();
            $da = $da->row_array();
            array_push($d, $da);
        }
        $data = array('product' => $d);
        $data['name'] = $name;
        $data['status'] = $status;
        $this->load->view('template/header', $data);
        $this->load->view('cart', $data);
        $this->load->view('template/footer');
    }
    public function updateCart()
    {

        $n = count($_POST) / 3;
        for ($i = 1; $i <= $n; $i++) {
            $Qty     = $_POST['QtyU' . $i];
            $IdCart   = $_POST['IdCart' . $i];
            $Total    = $_POST['Total' . $i];
            $data = array(
                'Qty' => $Qty,
                'Total' => $Total
            );
            $where  = array('IdCart' => $IdCart);
            $res = $this->ProductModel->Update('cart', $data, $where);
        }

        redirect(base_url('/cart'), 'refresh');
    }
    public function pay($id)
    {
        $where  = array('IdCart' => $id);
        $res = $this->ProductModel->Update('cart', array('StatusCode' => 'Order'), $where);
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete($IdCart)
    {
        $data = array('IdCart' => $IdCart);
        $this->ProductModel->Delete('cart', $data);
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function insert($IdProduct, $harga)
    {

        $IdUser  =  $this->session->userdata('IdUser');
        $data = array(
            'IdCart' => null,
            'IdUser' => $IdUser,
            'IdProduct' => $IdProduct,
            'Qty' => 1,
            'Total' => $harga,
            'StatusCode' => 'Cart'
        );

        $data = $this->ProductModel->Insert('cart', $data);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
