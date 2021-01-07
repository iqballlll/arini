<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perawat_model extends CI_Model
{
    public function get_data($id_perawat = null)
    {
        if ($id_perawat) {
            $this->db->where('id_perawat', $id_perawat);
        }

        return $this->db->get('perawat');
    }

    public function save_perawat($data)
    {
        return $this->db->insert('perawat', $data);
    }

    public function edit($data, $id)
    {
        return $this->db->where('id_perawat', $id)
            ->update('perawat', $data);
    }

    public function delete($id)
    {

        return $this->db->where('id_perawat', $id)
            ->delete('perawat');
    }
}
/* End of file Perawat_model.php */
