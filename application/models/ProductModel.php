<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductModel extends CI_Model
{
    public function upload()
    {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['remove_space'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('input_gambar')) {
            $return = array(
                'result' => 'success', 'file' => $this->upload->data(),
                'error' => ''
            );
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
    public function GetData($table)
    {

        $res = $this->db->get($table); // Kode ini berfungsi untuk memilih tabel yang akan ditampilkan

        return $res->result_array(); // Kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
    }
    public function GetProduct($table, $query, $order)
    {
        $this->db->order_by($query, $order);
        $res = $this->db->get($table); // Kode ini berfungsi untuk memilih tabel yang akan ditampilkan

        return $res->result_array(); // Kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
    }
    public function GetWhere($table, $data)
    {
        $res = $this->db->get_where($table, $data);
        return $res->result_array();
    }
    public function GetWhereOr($table, $data)
    {
        $res =  $this->db->select('*')
            ->from($table)->where($data);
        $res = $this->db->get();
        $res = $res->result_array();
        return $res;
    }
    public function Insert($table, $data)
    {
        $res = $this->db->insert($table, $data); // Kode ini digunakan untuk memasukan record baru kedalam sebuah tabel
        return $res; // Kode ini digunakan untuk mengembalikan hasil $res
    }
    public function Update($table, $data, $where)
    {
        $res = $this->db->update($table, $data, $where); // Kode ini digunakan untukmerubah record yang sudah ada dalam sebuah tabel
        return $res;
    }
    public function Delete($table, $where)
    {
        $res = $this->db->delete($table, $where); // Kode ini digunakan untuk menghapus record yang sudah ada
        return $res;
    }
}
