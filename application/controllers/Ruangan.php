<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ruangan_model');
    }


    public function index()
    {
        $data = array(
            'title'     => 'Data Ruangan',
            'view'      => 'ruangan/index',
        );

        $this->load->view('layout/index', $data);
    }

    public function get_ruangan()
    {
        $ruangan = $this->Ruangan_model->get_data()->result();
        $data['ruangan'] = $ruangan;
        $this->load->view('ruangan/tabel_ruangan', $data);
    }

    public function get_ruangan_by_id($id)
    {
        $query = $this->Ruangan_model->get_data($id);
        if ($query) {
            $json = [
                'status' => true,
                'data_ruangan'  => $query->row()
            ];
        } else {
            $json = [
                'status' => false
            ];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function save()
    {
        $data = array(
            'nama_ruangan'      => $this->input->post('nama_ruangan'),
            'nomor_ruangan'     => $this->input->post('nomor_ruangan'),

        );
        $query = $this->Ruangan_model->save($data);
        if ($query) {
            $json = [
                'status' => true,
                'pesan'  => 'Berhasil simpan data ruangan'
            ];
        } else {
            $json = [
                'status' => false,
                'pesan'  => 'Gagal simpan data ruangan'
            ];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function edit()
    {
        $data = array(
            'nama_ruangan' => $this->input->post('nama_ruangan'),
            'nomor_ruangan' => $this->input->post('nomor_ruangan')
        );
        $query = $this->Ruangan_model->edit($data, $this->input->post('id_ruangan'));
        if ($query) {
            $json = array(
                'status' => true,
                'pesan'  => 'edit data standar'
            );
        } else {
            $json = array(
                'status' => true,
                'pesan'  => 'edit data standar'
            );
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function delete($id)
    {
        $query = $this->Ruangan_model->delete($id);
        if ($query) {
            $json = [
                'status' => true,
                'pesan'  => 'Berhasil hapus data ruangan'
            ];
        } else {
            $json = [
                'status' => false,
                'pesan'  => 'Gagal hapus data ruangan'
            ];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
}

/* End of file Ruangan.php */
