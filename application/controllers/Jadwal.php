<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_model');
        $this->load->model('Perawat_model');
        $this->load->model('Ruangan_model');
    }


    public function index()
    {

        $data = array(
            'title'     => 'Data Jadwal',
            'view'      => 'jadwal/index',
            'jadwal'    => $this->Jadwal_model->get_data()->result(),
            'perawat'   => $this->Perawat_model->get_data()->result(),
            'ruangan'   => $this->Ruangan_model->get_data()->result()
        );

        $this->load->view('layout/index', $data);
    }

    public function get_jadwal()
    {
        $jadwal = $this->Jadwal_model->get_data()->result();
        $data['jadwal'] = $jadwal;
        $this->load->view('jadwal/tabel_jadwal', $data);
    }

    public function get_jadwal_by_id($id_jadwal)
    {
        $query = $this->Jadwal_model->get_data($id_jadwal);
        $date = $query->row()->date;
        $newDate = date("d-m-Y", strtotime($date));
        if ($query) {
            $json = [
                'status'        => true,
                'data_jadwal'   => $query->row(),
                'respon_date'   => $newDate
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
        $originalDate = $this->input->post('date');;
        $newDate = date("Y-m-d", strtotime($originalDate));

        $data = array(
            'id_perawat'   => $this->input->post('id_perawat'),
            'id_ruangan'   => $this->input->post('id_ruangan'),
            'date'         => $newDate
        );
        $query = $this->Jadwal_model->save($data);
        if ($query) {
            $json = [
                'status' => true,
                'pesan'  => 'Berhasil simpan data jadwal'
            ];
        } else {
            $json = [
                'status' => false,
                'pesan'  => 'Gagal simpan data jadwal'
            ];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function edit()
    {
        $originalDate = $this->input->post('date');
        $newDate = date("Y-m-d", strtotime($originalDate));

        $data = array(
            'id_perawat'   => $this->input->post('id_perawat'),
            'id_ruangan'   => $this->input->post('id_ruangan'),
            'date'         => $newDate
        );
        $query = $this->Jadwal_model->edit($data, $this->input->post('id_jadwal'));
        if ($query) {
            $json = [
                'status' => true,
                'pesan'  => 'Berhasil edit data jadwal'
            ];
        } else {
            $json = [
                'status' => false,
                'pesan'  => 'Gagal edit data jadwal'
            ];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function delete($id)
    {
        $query = $this->Jadwal_model->delete($id);
        if ($query) {
            $json = [
                'status' => true,
                'pesan'  => 'Berhasil hapus data jadwal'
            ];
        } else {
            $json = [
                'status' => false,
                'pesan'  => 'Gagal hapus data jadwal'
            ];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
}

/* End of file Jadwal.php */
