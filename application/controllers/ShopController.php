<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ShopController extends CI_Controller
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
    public function index()
    {

        $query = $this->input->get('sort', TRUE);
        if ($query == '') {
            $query = 'TimeAdded';
            $order = 'desc';
        } else if ($query == 'harga') {
            $query = 'HargaProduct';
            $order = 'desc';
        } else if ($query == 'popular') {
            $query = 'IdProduct';
            $order = 'random';
        }
        $data = $this->ProductModel->GetProduct('product', $query, $order);
        $data = array('product' => $data);
        $data['query'] = $query;
        $name  =   $this->session->userdata('nama');
        $status = $this->session->userdata('status');
        $data['name'] = $name;
        $data['status'] = $status;
        $this->load->view('template/header', $data);
        $this->load->view('shop', $data);
        $this->load->view('template/footer');
    }
    public function NewProduct()
    {
        $name  =   $this->session->userdata('nama');
        $status = $this->session->userdata('status');
        $data['name'] = $name;
        $data['status'] = $status;
        $this->load->view('template/header', $data);
        $this->load->view('newProduct');
        $this->load->view('template/footer');
    }
    public function addProduct()
    {
        $nama =  $this->input->post('namaBarang');
        $harga =  $this->input->post('HargaBarang');
        $Desc =  $this->input->post('Desc');

        $upload = $this->ProductModel->upload();
        if ($upload['result'] == "success") {
            echo "asd";
            $gbr =  $upload['file']['file_name'];
            date_default_timezone_set('Asia/Jakarta');
            $date = date('Y-m-d H:i:s', time());
            $data = array(
                'IdProduct' => null,
                'NamaProduct' => $nama,
                'DescProduk' => $Desc,
                'TimeAdded' => $date,
                'HargaProduct' => $harga,
                'NamaGbr' => $gbr
            );
            $data = $this->ProductModel->Insert('product', $data);
            redirect(base_url('/addproduct'), 'refresh');
        }
    }
}
