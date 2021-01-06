<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class C_user extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_antrian");
		$this->load->model("M_user");
		$this->load->library('form_validation');
	}

	public function layanan($kode)
	{
		$this->M_user->isLogin();
		$this->load->view("V_user");
	}

	public function ubah()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');

		// $this->form_validation->set_rules('nama', 'Nama', 'required');
		// $this->form_validation->set_rules('password', 'Password', 'required');
		
		// if($this->form_validation->run())
		// {
			$this->M_user->ubah($id,$nama,$password);
			// $this->M_user->ubah("2","asu","12345");
		// }
		
	}

	public function pengumuman()
	{
		$this->load->view('pengumuman');
	}

	
}

 ?>