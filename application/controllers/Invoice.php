<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $pesanan = $this->db->get_where('pesanan', ['lunas' => 0])->result_array();
        $this->data['notif_pesanan'] = 0;
        foreach ($pesanan as $p) {
            $this->data['notif_pesanan'] += $p['quantity'];
        }
    }

    public function index()
    {
        $data = $this->data;
        $data['title'] = 'Invoice';
        $this->load->view('layouts/_header', $data);
        $this->load->view('invoice/index');
        $this->load->view('layouts/_footer');
    }
}
