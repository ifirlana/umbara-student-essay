<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @param public app
* @desc digunakan untuk server mencoba teknologi hybrid 
* @author ifirlana@gmail.com
* @start 2014 27 12 
*/
class APP extends CI_Controller {
 
	public function index()
	{
		redirect("app/login");
	}
	public function home()
	{
		$data	=	array();
		$data['content'] = $this->load->view("template_3/home",$data,true);
		
		$this->load->view("template_3/header",$data);
		$this->load->view("template_3/main",$data);
		$this->load->view("template_3/footer",$data);
	}
	public function jadwal_booking()
	{
		$this->load->model("template_3_jadwal_model","m_jadwal");
		$data	=	array();
		$data['query']	=	$this->m_jadwal->getAllJadwal();
		$data['content'] = $this->load->view("template_3/jadwal_keberangkatan",$data,true);
		
		$this->load->view("template_3/header",$data);
		$this->load->view("template_3/main",$data);
		$this->load->view("template_3/footer",$data);
	}

	public function booking()
	{
		$data['id']						=	$this->input->post("keberangkatan");
		$data['id_kendaraan']	=	$this->input->post("kendaraan");
		$data['seat']					=	$this->input->post("seat");
		
		
		$data	=	array();
		$this->load->model("template_3_jadwal_model","m_jadwal");
		
		$data['id']						=	$this->input->post("keberangkatan");
		$data['id_kendaraan']	=	$this->input->post("kendaraan");
		$data['seat']					=	$this->input->post("id_seat");
		$data['date']				=	date("Y-m-d");
		//$data['query']							=	$this->m_jadwal->getDataHargaSeat($data['id'],$data['seat']);
		//$data['harga'] = $query->result()[0]->harga;
		$data['content'] = $this->load->view("template_3/booking",$data,true);
		
		$this->load->view("template_3/header",$data);
		$this->load->view("template_3/main",$data);
		$this->load->view("template_3/footer",$data);
	
	}
	public function insert_booking()
	{
		if($_POST)
		{
			$seat		=	$this->input->post("seat");
			$id_user	= $this->session->userdata('id_privillage');;
			for($i=0;$i<count($seat);$i++)
			{
				$data = array(
					"id_jadwal" => $this->input->post("id_jadwal"),
					"nama" => $this->input->post("nama"),
					"ktp" => $this->input->post("ktp"),
					"id_seat" => $seat[$i],
					"harga" => $this->input->post("harga"),
					"date_added" =>$this->input->post("date_added"),
					"id_user" => $id_user,
					"status" => "pesan",
				);
				$this->db->insert("data_keberangkatan",$data);
			//echo $seat[$i];
			}
			//redirect("app/cetak_booking/?id=".$this->db->insert_id());
			redirect("app/bill/");
		}
	}
	public function cetak_booking()
	{
		$data	=	array();
		$this->load->model("template_3_jadwal_model","m_jadwal");
		
		$id = $this->input->get("id");
		$data['query']	=	$this->m_jadwal->getDataKeberangkatan($id);
	$this->load->view("template_3/header",$data);
		$this->load->view("template_3/cetak_booking",$data);
		$this->load->view("template_3/footer",$data);
	}
	public function check()
	{
		$data	=	array();
		$this->load->model("template_3_jadwal_model","m_jadwal");
		
		$data['id']	=	$this->input->get("keberangkatan");
		$data['id_kendaraan']	=	$this->input->get("kendaraan");
		$data['query']	=	$this->m_jadwal->getAllBooking($data['id']);
		$data['content'] = $this->load->view("template_3/tipe_kendaraan_".$data['id_kendaraan'],$data,true);
		
		$this->load->view("template_3/header",$data);
		$this->load->view("template_3/main",$data);
		$this->load->view("template_3/footer",$data);
	}

	public function pembayaran()
	{
		$data	=	array();
		$this->load->model("template_3_jadwal_model","m_jadwal");
		
		$data['query']	=	$this->m_jadwal->getAllPembayaran();
		$data['content'] = $this->load->view("template_3/pembayaran",$data,true);
		
		$this->load->view("template_3/header",$data);
		$this->load->view("template_3/main",$data);
		$this->load->view("template_3/footer",$data);
	}
	public function pelunasan()
	{
		$data	=	array();
		$this->load->model("template_3_jadwal_model","m_jadwal");
		
		$id = $this->input->get("id");
		$query	=	$this->m_jadwal->getPembayaranId($id);
		$data['id']	=$id;
		$data['query']	=	$query->result();
		$data['content'] = $this->load->view("template_3/pelunasan",$data,true);
		
		$this->load->view("template_3/header",$data);
		$this->load->view("template_3/main",$data);
		$this->load->view("template_3/footer",$data);	
	}
	public function insert_pelunasan()
	{
		if($_POST)
		{
			$data = array(
			"harga" => $this->input->post("harga"),
			"id_keberangkatan" => $this->input->post("id_keberangkatan"),
			);
			$this->db->insert("tiket",$data);
			$id = $this->db->insert_id();
			
			$data_update = array(
               'status' => "clear",
            );

			$this->db->where('id', $this->input->post("id_keberangkatan"));
			$this->db->update('data_keberangkatan', $data_update);

			redirect("app/cetak_nota/?id=".$id);
		}			
	}
	public function cetak_nota()
	{
		$data	=	array();
		$this->load->model("template_3_jadwal_model","m_jadwal");
		
		$id = $this->input->get("id");
		$data['query']	=	$this->m_jadwal->getDataTransaksi($id);

		$this->load->view("template_3/cetak_booking",$data);
	}
	public function jadwal_perubahan()
	{
		if($_POST)
		{
			$id_jadwal = $this->input->post("id_jadwal");
			$status = $this->input->post("status");
			$id_tipe_kendaraan = $this->input->post("id_tipe_kendaraan");
			$data_insert = array(
				"id_tipe_kendaraan" => $id_tipe_kendaraan,
				"id_jadwal" => $id_jadwal,
				"status"	=>$status,
				); 
			$this->db->insert("data_keberangkatan_armada",$data_insert);
			$id = $this->db->insert_id();

			$data_update = array(
               'status' => $status,
            );

			$this->db->where('status', "clear");
			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->update('data_keberangkatan', $data_update);

			$data_update_jadwal = array(
               'status' => $status,
            );
			$this->db->where('id', $id_jadwal);
			$this->db->update('jadwal', $data_update_jadwal);

			redirect("app/cetak_surat_keberangkatan/?id=".$id);
		}
		else
		{
			$data	=	array();
			$this->load->model("template_3_jadwal_model","m_jadwal");
			
			$data['query']	=	$this->m_jadwal->getAllJadwal();
			$data['content']	=	$this->load->view("template_3/keberangkatan_armada",$data,true);

			$this->load->view("template_3/header",$data);
			$this->load->view("template_3/main",$data);
			$this->load->view("template_3/footer",$data);
		}
	}
	public function login()
	{
		$this->load->view("template_3/header");
		$this->load->view("template_3/login");
		$this->load->view("template_3/footer");
	}
	public function login_konsumen()
	{
		$data['message'] = "<div><a href='".site_url()."app/daftar/'>daftar</a></div>";
		$this->load->view("template_3/header");
		$this->load->view("template_3/login",$data);
		$this->load->view("template_3/footer");
	}

	public function check_login()
	{
		if($_POST)
		{
			$this->load->model("template_3_jadwal_model","m_jadwal");
			
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			//echo $username.",".$password;
			$query	=	$this->m_jadwal->getUsernamePassword($username,$password);
			
			if($query->result() > 0 ){
				$newdata = array(
                   'id_user'  => $query->result()[0]->id,
                   'username'  => $query->result()[0]->username,
                   'id_privillage' => $query->result()[0]->id_privillage,
               	);

				$this->session->set_userdata($newdata);
				
				redirect("app/home");
			}
			else{
				redirect("app/login");
			}
		}
		//redirect("app/login");
	}
	public function laporan()
	{
		$data	=	array();
		$data['content']	=	$this->load->view("template_3/laporan",$data,true);

		$this->load->view("template_3/header",$data);
		$this->load->view("template_3/main",$data);
		$this->load->view("template_3/footer",$data);
	}
	public function cetak_surat_keberangkatan()
	{
		$data	=	array();
		$this->load->model("template_3_jadwal_model","m_jadwal");
		
		$id = $this->input->get("id");
		$data['query']	=	$this->m_jadwal->getSuratJalan($id);

		$this->load->view("template_3/cetak_surat_jalan",$data);
	}

	public function print_datebetween()
	{
		$data	=	array();
		$this->load->model("template_3_jadwal_model","m_jadwal");
		
		$data['datestart'] 		=	$this->input->post("datestart");
		$data['dateend'] 		=	$this->input->post("dateend");
		$data['query']		=	$this->m_jadwal->getLaporanPembayaranHarian($data['datestart'],$data['dateend']);
		$this->load->view("template_3/laporan_transaksi",$data);

		//$this->load->view("template_3/header",$data);
		//$this->load->view("template_3/main",$data);
		//$this->load->view("template_3/footer",$data);
	}
	
	public function printbooking_datebetween()
	{
		$data	=	array();
		$this->load->model("template_3_jadwal_model","m_jadwal");
		
		$data['datestart'] 		=	$this->input->post("datestart");
		$data['dateend'] 		=	$this->input->post("dateend");
		$data['query']		=	$this->m_jadwal->getLaporanBooking($data['datestart'],$data['dateend']);
		$this->load->view("template_3/laporan_transaksi_booking",$data);

		//$this->load->view("template_3/header",$data);
		//$this->load->view("template_3/main",$data);
		//$this->load->view("template_3/footer",$data);
	}
	public function Seat()
	{
		$data	=	array();
		$this->load->model("template_3_jadwal_model","m_jadwal");
		
		$data['query']		=	$this->m_jadwal->getSeatAll();
		$data['query_kendaraan']		=	$this->m_jadwal->getTipeKendaraanAll();
		$data['content']	=	$this->load->view("template_3/seat",$data,true);

		$this->load->view("template_3/header",$data);
		$this->load->view("template_3/main",$data);
		$this->load->view("template_3/footer",$data);

	}
	public function insert_seat()
	{
		$id 	=	$this->input->post("id");
		$seat 	=	$this->input->post("seat");
		$harga 	=	$this->input->post("harga");
		$data 	=	array("kode" => $id,
			"nama_seat" => $seat,
			"harga" => $harga);
		$this->db->insert("seat",$data);
		redirect("app/seat");
	}
	function hapus_seat()
	{
		$id 	= $this->input->get("id");
		$seat 	= $this->input->get("seat");
		$select = "delete from seat where id = $id and nama_seat = '$seat'";
		$this->db->query($select);
		redirect("app/seat");
	}
	public function jadwal_keberangkatan()
	{
		$data	=	array();
		$this->load->model("template_3_jadwal_model","m_jadwal");
		
		$data['query']		=	$this->m_jadwal->getAllJadwal();
		$data['query_kendaraan']		=	$this->m_jadwal->getTipeKendaraanAll();
		$data['content']	=	$this->load->view("template_3/jadwal_keberangkatan_admin",$data,true);

		$this->load->view("template_3/header",$data);
		$this->load->view("template_3/main",$data);
		$this->load->view("template_3/footer",$data);

	}

	function hapus_jadwal()
	{
		$id 	= $this->input->get("id");
		$select = "delete from jadwal where id = $id";
		$this->db->query($select);
		redirect("app/jadwal_keberangkatan");
	}
	function insert_jadwal()
	{
		$id_tipe_kendaraan 	=	$this->input->post("id_tipe_kendaraan");
		$keterangan 	=	$this->input->post("keterangan");
		$status 	=	$this->input->post("status");
		$data 	=	array(
			"id_tipe_kendaraan" => $id_tipe_kendaraan,
			"keterangan" => $keterangan,
			"status" => $status);
		$this->db->insert("jadwal",$data);
		redirect("app/jadwal_keberangkatan");
	}
	function logout_app()
	{
		$this->session->sess_destroy();
		redirect("app");
	}
	function view_jadwal_user()
	{
		$this->load->model("template_3_jadwal_model","m_jadwal");
		$data	=	array();
		$data['query']	=	$this->m_jadwal->getAllJadwal();
		$data['content'] = $this->load->view("template_3/jadwal_keberangkatan",$data,true);
		
		$this->load->view("template_3/header",$data);
		$this->load->view("template_3/main",$data);
		$this->load->view("template_3/footer",$data);
	}
	public function check_user()
	{
		$data	=	array();
		$this->load->model("template_3_jadwal_model","m_jadwal");
		
		$data['id']						=	$this->input->get("keberangkatan");
		$data['id_kendaraan']	=	$this->input->get("kendaraan");
		$data['date']				=	$this->input->get("date");
		$data['query']				=	$this->m_jadwal->getAllBookingDate($data['id'],$data['date']);
		$data['content'] = $this->load->view("template_3/tipe_kendaraan_".$data['id_kendaraan'],$data,true);
		
		$this->load->view("template_3/header",$data);
		$this->load->view("template_3/main",$data);
		$this->load->view("template_3/footer",$data);
	}
	public function tentang_kami()
	{
		$data	=	array();
		$data['content']	=	$this->load->view("template_3/tentang_kami",$data,true);

		$this->load->view("template_3/header",$data);
		$this->load->view("template_3/main",$data);
		$this->load->view("template_3/footer",$data);
	}
	
	public function berita()
	{
	$this->load->model("template_3_jadwal_model","m_jadwal");
		
		$data	=	array();
		$data['query']				=	$this->m_jadwal->getBerita();
		$data['content']	=	$this->load->view("template_3/berita",$data,true);

		$this->load->view("template_3/header",$data);
		$this->load->view("template_3/main",$data);
		$this->load->view("template_3/footer",$data);
	}
	public function formBerita()
	{
	$this->load->model("template_3_jadwal_model","m_jadwal");
		
		$data	=	array();
		if($_POST)
		{
			$content = $this->input->post("content");
			$update = array(
				"content" => $content
				);
			$this->db->where("id",0);
			$this->db->update("berita",$update);
		}
		$data['query']				=	$this->m_jadwal->getBerita();
		$data['content']	=	$this->load->view("template_3/berita_form",$data,true);
		
		$this->load->view("template_3/header",$data);
		$this->load->view("template_3/main",$data);
		$this->load->view("template_3/footer",$data);
	}
	public function daftar()
	{
		if($_POST)
		{
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			$password_lagi = $this->input->post("password_lagi");
			if($password == $password_lagi)
			{
				$insert = array(
					"username" => $username,
					"password" => $password,
					"id_privillage" => 4
					);
				$this->db->insert("user",$insert);
				redirect("app/login_konsumen");
			}
			else
			{
				$data['message'] = "password tidak sama";
			}
		}
		$data	=	array();
		$data['content']	=	$this->load->view("template_3/daftar",$data,true);

		$this->load->view("template_3/header",$data);
		$this->load->view("template_3/main",$data);
		$this->load->view("template_3/footer",$data);
	}
	
	function bill()
	{
		$id_user = $this->session->userdata('id_user');
		$this->load->model("template_3_jadwal_model","m_jadwal");
		$data	=	array();
		$data['query']	=	$this->m_jadwal->getBookingUser($id_user);
		$data['content'] = $this->load->view("template_3/bill",$data,true);
		
		$this->load->view("template_3/header",$data);
		$this->load->view("template_3/main",$data);
		$this->load->view("template_3/footer",$data);
	}
	
	function upload_pembayaran()
	{
		$id_user = $this->session->userdata('id_user');
		$this->load->model("template_3_jadwal_model","m_jadwal");
		$data	=	array();
		$data['id'] = $this->input->get("id");
		$data['content'] = $this->load->view("template_3/form_upload",$data,true);
		
		$this->load->view("template_3/header",$data);
		$this->load->view("template_3/main",$data);
		$this->load->view("template_3/footer",$data);
	}
	function do_upload()
	{
		$id = $this->input->post("id");
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['file_name']  = $id;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			
			//$this->load->view('upload_form', $error);
			redirect("app/upload_pembayaran/?id=".$id);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			$update	=	array("url_bukti" => $this->upload->data()['orig_name']);			
			$this->db->where('id', $id);
			$this->db->update('data_keberangkatan', $update);
			//echo $this->upload->data()['orig_name'];
			redirect("app/bill");
		}
	}
}