<?php

//Header
$this->load->view('templates/header');

//Body
$this->load->view("pages/" . $pages['page'] . "/" . $pages['menu'] . "");

//Footer
$this->load->view('templates/footer');

//Components
if ($pages['page'] === 'master' || $pages['page'] === 'dashboard')
    $this->load->view("pages/" . $pages['page'] . "/components/index");
else if ($pages['page'] === 'transaksi')
    $this->load->view("pages/" . $pages['page'] . "/" . $pages['menu'] . "/index");

//Modal
if ($user['password'] === 'local')
    $this->load->view('templates/components/modal-pengaturan');
