<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pasien_model');
    }


    public function index()
    {
        $data = array(
            'title'     => 'Data Pasien',
            'view'      => 'pasien/index'
        );

        $this->load->view('layout/index', $data);
    }

    public function get_data()
    {
        $pasien = $this->Pasien_model->get_data()->result();
        $data['pasien'] = $pasien;
        $this->load->view('pasien/tabel_pasien', $data);
    }

    public function get_pasien_by_id($id_pasien)
    {

        $query = $this->Pasien_model->get_data($id_pasien);
        $originalDate = $query->row()->tgl_lahir;
        $newDate = date("d-m-Y", strtotime($originalDate));
        if ($query) {
            $json = [
                'status'        => true,
                'data_pasien'   => $query->row(),
                'respon_tgl'    => $newDate
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
        $originalDate = $this->input->post('tgl_lahir');
        $newDate = date("Y-m-d", strtotime($originalDate));

        $data = array(
            'nama_pasien'  => $this->input->post('nama_pasien'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir'    => $newDate,
            'jk'           => $this->input->post('jk'),
            'umur'         => $this->input->post('umur'),
            'penyakit'     => $this->input->post('penyakit'),
        );
        $query = $this->Pasien_model->save($data);
        if ($query) {
            $json = [
                'status' => true,
                'pesan'  => 'Berhasil simpan data pasien'
            ];
        } else {
            $json = [
                'status' => false,
                'pesan'  => 'Gagal simpan data pasien'
            ];
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function edit()
    {
        $originalDate = $this->input->post('tgl_lahir');
        $newDate = date("Y-m-d", strtotime($originalDate));

        $data = array(
            'nama_pasien'  => $this->input->post('nama_pasien'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir'    => $newDate,
            'jk'           => $this->input->post('jk'),
            'umur'         => $this->input->post('umur'),
            'penyakit'   => $this->input->post('penyakit')
        );
        $query = $this->Pasien_model->edit($data, $this->input->post('id_pasien'));
        if ($query) {
            $json = [
                'status' => true,
                'pesan'  => 'Berhasil edit data pasien'
            ];
        } else {
            $json = [
                'status' => false,
                'pesan'  => 'Gagal edit data pasien'
            ];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function delete($id)
    {
        $query = $this->Pasien_model->hapus($id);
        if ($query) {
            $json = [
                'status' => true,
                'pesan'  => 'Berhasil hapus data pasien'
            ];
        } else {
            $json = [
                'status' => false,
                'pesan'  => 'Gagal hapus data pasien'
            ];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
}

/* End of file Pasien.php */
