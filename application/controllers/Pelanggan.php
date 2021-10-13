<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pelanggan_model");
        $this->load->library('form_validation');
        $pesanan = $this->db->get_where('pesanan', ['lunas' => 0])->result_array();
        $this->data['notif_pesanan'] = 0;
        foreach ($pesanan as $p) {
            $this->data['notif_pesanan'] += $p['quantity'];
        }
    }

    public function index()
    {
        $data["pelanggan"] = $this->pelanggan_model->getAll();
        $data = $this->data;
        $data['title'] = 'Pelanggan';
        $this->load->view('layouts/_header', $data);

        $pelanggan = $this->pelanggan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pelanggan->rules());

        if ($validation->run()) {
            $pelanggan->save();
            $this->session->set_flashdata('succes', 'Berhasil disimpan');
        }

        $this->load->view("pelanggan/index");
        $this->load->view('layouts/_footer');
    }

    // public function add()
    // {
    //     $pelanggan = $this->pelanggan_model;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($pelanggan->rules());

    //     if ($validation->run()) {
    //         $pelanggan->save();
    //         $this->session->set_flashdata('succes', 'Berhasil disimpan');
    //     }

    //     $this->load->view("pelanggan/index");
    // }

    // public function edit($id = null)
    // {
    //     if (!isset($id)) redirect('pelanggan/index');

    //     $pelanggan = $this->pelanggan_model;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($pelanggan->rules());

    //     if ($validation->run()) {
    //         $pelanggan->update();
    //         $this->session->set_flashdata('succes', 'Berhasil disimpan');
    //     }

    //     $data["pelanggan"] = $pelanggan->getById($id);
    //     if (!$data["pelanggan"]) show_404();

    //     $this->load->view("pelanggan/index", $data);
    // }

    // public function delete($id = null)
    // {
    //     if (!isset($id)) show_404();

    //     if ($this->pelanggan_model->delete($id)) {
    //         redirect(site_url('pelanggan/index'));
    //     }
    // }
}
