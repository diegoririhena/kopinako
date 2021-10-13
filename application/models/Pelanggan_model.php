<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{
    private $_table = "pelanggan";

    public $id;
    public $nama_depan;
    public $nama_belakang;
    public $no_telp;
    public $email;

    public function rules()
    {
        return [
            [
                'field' => 'nama_depan',
                'label' => 'Nama_depan',
                'rules' => 'required'
            ],

            [
                'field' => 'nama_belakang',
                'label' => 'Nama_belakang',
                'rules' => 'required'
            ],

            [
                'field' => 'no_telp',
                'label' => 'No_telp',
                'rules' => 'required'
            ],

            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = uniqid();
        $this->nama_depan = $post["nama_depan"];
        $this->nama_belakang = $post["nama_belakang"];
        $this->no_telp = $post["no_telp"];
        $this->email = $post["email"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama_depan = $post["nama_depan"];
        $this->nama_belakang = $post["nama_belakang"];
        $this->no_telp = $post["no_telp"];
        $this->email = $post["email"];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete()
    {
        return $this->db->delete($this->_table, $this, array('id' => ['id']));
    }
}
