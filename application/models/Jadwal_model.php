<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
    public function get_data($id_jadwal = null)
    {
        if ($id_jadwal) {
            $this->db->where('id_jadwal', $id_jadwal);
        }

        return $this->db->select('a.*, b.nama_perawat, c.*')
            ->from('jadwal a')
            ->join('perawat b', 'a.id_perawat = b.id_perawat', 'left')
            ->join('ruangan c', 'a.id_ruangan = c.id_ruangan', 'left')
            ->get();
    }

    public function save($data)
    {
        return $this->db->insert('jadwal', $data);
    }

    public function edit($data, $id)
    {
        return $this->db->where('id_jadwal', $id)
            ->update('jadwal', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('jadwal', ['id_jadwal' => $id]);
    }
}

/* End of file Jadwal_model.php */
