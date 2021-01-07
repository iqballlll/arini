<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perawat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Perawat_model');
    }


    public function index()
    {
        $data = array(
            'title'     => 'Data Perawat',
            'view'      => 'perawat/index',
            'perawat'   => $this->Perawat_model->get_data()->result()
        );

        $this->load->view('layout/index', $data);
    }

    public function get_perawat()
    {
        $perawat = $this->Perawat_model->get_data()->result();
        $data['perawat'] = $perawat;
        $this->load->view('perawat/tabel_perawat', $data);
    }

    public function get_perawat_by_id($id_perawat)
    {
        $query = $this->Perawat_model->get_data($id_perawat);
        if ($query) {
            $json = [
                'status'        => true,
                'data_perawat'  => $query->row()
            ];
        } else {
            $json = [
                'status'        => false
            ];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function save()
    {
        $data = array(
            'nama_perawat' => $this->input->post('nama_perawat'),
            'jk'           => $this->input->post('jk'),
            'alamat'       => $this->input->post('alamat')
        );
        $query = $this->Perawat_model->save_perawat($data);
        if ($query) {
            $json = [
                'status' => true,
                'pesan'  => 'Berhasil simpan data perawat'
            ];
        } else {
            $json = [
                'status' => false,
                'pesan'  => 'Gagal simpan data perawat'
            ];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function edit()
    {
        $data = array(
            'nama_perawat' => $this->input->post('nama_perawat'),
            'jk'           => $this->input->post('jk'),
            'alamat'       => $this->input->post('alamat')
        );
        $query = $this->Perawat_model->edit($data, $this->input->post('id_perawat'));
        if ($query) {
            $json = [
                'status' => true,
                'pesan'  => 'Berhasil edit data perawat'
            ];
        } else {
            $json = [
                'status' => false,
                'pesan'  => 'Gagal edit data perawat'
            ];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function delete($id)
    {
        $query = $this->Perawat_model->delete($id);
        if ($query) {
            $json = [
                'status' => true,
                'pesan'  => 'Berhasil hapus data perawat'
            ];
        } else {
            $json = [
                'status' => false,
                'pesan'  => 'Gagal hapus data perawat'
            ];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
}

/* End of file Perawat.php */
