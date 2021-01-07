<?php
class Dashboard extends CI_Controller
{
    function index()
    {
        $data = array(
            'title' => 'Arini Robotic',
            'view'  => 'dashboard/index'
        );

        $this->load->view('layout/index', $data);
    }
}
