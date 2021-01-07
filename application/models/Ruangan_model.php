<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan_model extends CI_Model
{

    public function get_data($id_ruangan = null)
    {
        if ($id_ruangan) {
            $this->db->where('id_ruangan', $id_ruangan);
        }
        return $this->db->get('ruangan');
    }


    public function save($data)
    {
        return $this->db->insert('ruangan', $data);
    }

    public function edit($data, $id)
    {
        return $this->db->where('id_ruangan', $id)
            ->update('ruangan', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('ruangan', ['id_ruangan' => $id]);
    }
}

/* End of file Ruangan_model.php */
