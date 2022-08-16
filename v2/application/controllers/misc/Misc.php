<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Misc extends CI_Controller
{

    public function maintenance()
    {
        $this->load->view('misc/maintenance');
    }
}
