<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class C_login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_user");
		$this->load->library("form_validation");
	}

	public function index()
	{
		$login = $this->M_user;
		$validation = $this->form_validation;
		$validation->set_rules($login->rules());
		if(!$this->session->userdata('id'))
		{
			if($validation->run())
			{
				$data['user'] = $login->login();
				if(!$data['user'])
				{
					$this->session->set_flashdata('success', 'Username atau password salah');
					redirect('c_login');
				}
				else
				{
					$session_data = [
						'id' => $data['user']->id,
						'nama' => $data['user']->nama,
						'username' => $data['user']->username,
						'layanan' => $data['user']->layanan,
						'kode' => $data['user']->kode,
					];
					$this->session->set_userdata($session_data);
					$this->session->set_flashdata('success', 'Selamat datang '.$session_data['nama']);
					redirect('c_user/layanan/'.$session_data['kode']);
				}
			}
			$this->load->view("V_login");
		}
		else
		{
			redirect("c_user/layanan/".$this->session->userdata['kode']);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('c_login');
	}
}

 ?>