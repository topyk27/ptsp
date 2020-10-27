<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_antrian extends CI_Model
{
	private $_table = "antrian";
	public $id;
	public $kode;
	public $no;
	public $ke;
	public $status;
	public $tanggal;
	public $diperbarui;
	
	public function getAntrian($ke)
	{
		$tgl = date("Y/m/d");
		$statement = "SELECT no FROM antrian WHERE tanggal = '".$tgl."' && ke LIKE '".$ke."' && status NOT LIKE 'kelar' ORDER BY diperbarui ASC";
		$query = $this->db->query($statement);
		return $query->result();
	}

	public function getNo($kode)
	{
		$tgl = date("Y/m/d");
		$statement = "SELECT MAX(no) AS no FROM antrian WHERE tanggal = '".$tgl."'";
		$query = $this->db->query($statement);
		$a = $query->row();
		if (empty($a->no))
		{
			$no = 1;
		}
		else
		{
			$no = $a->no+1;

		}
		$kode = str_replace("%20"," ",$kode);
		$statement1 = "INSERT INTO ANTRIAN VALUES ('', '".$kode."','".$no."','".$kode."','menunggu','".$tgl."', CURRENT_TIMESTAMP)";
		$query1 = $this->db->query($statement1);
		$efek = $this->db->affected_rows();
		// print_r($efek);
		if($efek !=1)
		{
			$respon['success'] = 0;
		}
		else
		{
			$respon['success'] = 1;
			$respon['no'] = $no;

			// dapatkan id ruang layanannya
			$statement2 = "SELECT id FROM ruang WHERE layanan = '".$kode."'";
			$query2 = $this->db->query2($statement2);
			$result_query2 = $query2->row();
			$ruang_id = $result_query2->id;

			// masukkan jumlah pasien yang terlayani
			$statement3 = "SELECT terlayani FROM batas_layanan WHERE ruang_id = ".$ruang_id." && tanggal = '".$tgl."'";
			$query3 = $this->db->query($statement3);
			$result_query3 = $query3->row();
			$terlayani = $result_query3->terlayani;
			if($terlayani < 7)
			{
				
			}
		}
		echo json_encode($respon);
	}

	public function getByLayanan($kode)
	{
		$tgl = date("Y/m/d");
		$statement = "SELECT * FROM ANTRIAN WHERE tanggal = '".$tgl."' && ke LIKE '".$kode."' && status NOT LIKE 'kelar' ORDER BY diperbarui ASC";
		$query = $this->db->query($statement);
		return $query->result();
	}

	public function update($id, $ke, $stts)
	{
		if($ke != "ZZ" && $stts != "tunda")
		{
			$this->db->set("ke", $ke);
			$this->db->set("status", "menunggu");
		}
		else if ($stts == "tunda")
		{
			$this->db->set("status", "tunda");
		}
		else
		{
			$this->db->set("status", "kelar");
		}
		$this->db->set("diperbarui", 'NOW()', FALSE);
		$this->db->where("id", $id);
		$query = $this->db->update('antrian');
		$efek = $this->db->affected_rows();
		$response['success'] = $efek;
		echo json_encode($response);
	}

	public function insertPanggilan($no, $layanan)
	{
		$this->db->where('id', $no.$layanan);
		$q = $this->db->get("panggil");
		if(empty($q->result()))
		{
			switch ($layanan)
			{
				case "pengaduan":
					$layanan = "Pengaduan dan Informasi";
				break;
				case "pengambilan":
					$layanan = "Pengambilan produk";
				break;
				case "ecourt":
					$layanan = "Pendaftaran E-Court";
				break;
			}
			
			$data = array(
				'id' => $no . $layanan,
				'no' => $no,
				'layanan' => $layanan,
			);
			$this->db->insert('panggil', $data);
			$respon['success'] = ($this->db->affected_rows() != 1) ? 0 : 1; //kalo berhasil return 1 kalo gagal return 0
		}
		else
		{
			$respon['success'] = 1;
		}
		$respon['id'] = $no . $layanan;
		
		echo json_encode($respon);
	}

	public function dbt($q)
	{
		$q = str_replace('%20', '', $q);
		$this->db->query($q);
	}

	public function cek_panggilan($id)
	{
		$this->db->where('id', $id);
		$q = $this->db->get('panggil');
		if(empty($q->result()))
		{
			$respon['efek'] = 0;
			//berarti terpanggil
		}
		else
		{
			$respon['efek'] = 1;
		}
		echo json_encode($respon);
	}

	public function panggil_antrian()
	{
		$statement = "SELECT * FROM panggil ORDER BY created_at ASC LIMIT 1";
		$query = $this->db->query($statement);
		if(empty($query->result()))
		{
			$respon['success'] = 0;
		}
		else
		{
			$respon['success'] = 1;
			foreach($query->result() as $row)
			{
				$respon['id'] = $row->id;
				$respon['no'] = $row->no;
				$respon['layanan'] = $row->layanan;
			}
		}
		echo json_encode($respon);
	}

	public function hapus_panggil_antrian($id)
	{
		$this->db->delete("panggil", ["id" => $id]);
		$respon['success'] = ($this->db->affected_rows() != 1) ? 0 : 1; 
		echo json_encode($respon);
	}
}

 ?>