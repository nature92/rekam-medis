<?php 
   defined('BASEPATH') or exit('No direct script access allowed');

   class TimeZoneModel extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->db->query("SET TIMEZONE = 'ASIA/JAKARTA'");
    }
   }
