<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Arini_model extends CI_Model
{
    public function ntf_toastr($clr_msg, $ctn_msg, $hed_msg)
    {
        /*
			info
			warning
			success
			error
		*/
        $newdata = array(
            'ntf_toastr'      => true,
            'clr_toastr'      => $clr_msg,
            'hed_toastr'     => $hed_msg,
            'ctn_toastr'     => $ctn_msg,
        );
        $this->session->set_flashdata($newdata);
    }
}

/* End of file Arini_model.php */
