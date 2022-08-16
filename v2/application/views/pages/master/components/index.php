<?php
$this->load->view('pages/master/components/modal-add');
$this->load->view('pages/master/components/modal-log-detail');
if (count($data) > 0) {
    $this->load->view('pages/master/components/modal-detail');
    // $this->load->view('pages/master/components/modal-delete');
    $this->load->view('pages/master/components/modal-flag');
    $this->load->view('pages/master/components/modal-hak-akses');
}
