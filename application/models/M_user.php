<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_user extends CI_Model
{
	
	private $_table = "user_antrian";
	public $id;
	public $nama;
	public $username;
	public $password;
	public $layanan;
	public $kode;

	public function rules()
	{
		return [
			['field' => 'username',
			'label' => 'username',
			'rules' => 'required'
			],
			['field' => 'password',
			'label' => 'password',
			'rules' => 'required'
			]
		];
	}

	public function login()
	{
		$post = $this->input->post();
		$this->username = $post['username'];
		$this->password = $post['password'];
		$where = [
			'username' => $this->username,
			'password' => md5($this->password)
		];
		return $this->db->get_where($this->_table, $where)->row();
	}

	public function isLogin()
	{
		if(!$this->session->userdata('id'))
		{
			redirect('c_login');
		}
	}

	public function ubah($id,$nama,$password)
	{
		$this->db->set("nama", $nama);
		$this->db->set("password", md5($password));
		$this->db->where("id", $id);
		$query = $this->db->update("user");
		$efek = $this->db->affected_rows();
		if($efek==1)
		{
			$this->session->set_userdata('nama', $nama);
		}
		$respon['success'] = $efek;

		// echo json_encode($respon);
		$this->session->sess_destroy();
		redirect('c_login');
	}
}
 ?>