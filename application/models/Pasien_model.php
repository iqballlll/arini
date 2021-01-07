<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pasien_model extends CI_Model
{

    public function get_data($id_pasien = null)
    {
        if ($id_pasien) {
            $this->db->where('id_pasien', $id_pasien);
        }
        return $this->db->get('pasien');
    }

    public function save($data)
    {
        return $this->db->insert('pasien', $data);
    }

    public function edit($data, $id)
    {
        return $this->db->where('id_pasien', $id)
            ->update('pasien', $data);
    }

    public function hapus($id)
    {
        return $this->db->where('id_pasien', $id)->delete('pasien');
    }
}

/* End of file Pasien_model.php */
