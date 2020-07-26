<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_user");
        $this->load->library("form_validation");
    }

    public function tambah()
    {
        $this->load->view("V_user_tambah");
    }
}

?>