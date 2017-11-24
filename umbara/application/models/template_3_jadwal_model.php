<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @param public template_3_jadwal_model
* @desc model digunakan untuk CRUD kas ataupun transaksi model
* @author ifirlana@gmail.com
* @start 2015 01 03 
*/
class template_3_jadwal_model extends CI_Model { 
	
	function getAllJadwal()
	{
		$query	=	$this->db->query("select * from jadwal order by status asc");
		$this->db->close();
		return $query;
	}
	
	function getAllBooking($id_jadwal)
	{
		$select = "select X.*, data_keberangkatan.status status_seat from 
					(select tipe_kendaraan.seat,tipe_kendaraan.harga, jadwal.* 
						from 
						tipe_kendaraan inner join jadwal on jadwal.id_tipe_kendaraan = tipe_kendaraan.id
						where 
						jadwal.id = $id_jadwal) X 
					left join 
					(select * 
						from 
						data_keberangkatan 
						where
							status = 'pesan'
							and id_jadwal = $id_jadwal) data_keberangkatan 
					on X.seat = data_keberangkatan.seat";
		$query	=	$this->db->query($select);
		$this->db->close();
		return $query;
	}
	/**
	* 
	*/
	function getBookingUser($id_user)
	{
		$select = "select X.*
		from
					(select data_keberangkatan.*, seat.harga harga_seat, jadwal.keterangan, seat.nama_seat
						from 
						data_keberangkatan
						left join seat
						on data_keberangkatan.id_seat = seat.id
						left join
						jadwal
						on jadwal.id = data_keberangkatan.id_jadwal
						where
							id_user = $id_user
							order by status desc) X";
		$query	=	$this->db->query($select);
		$this->db->close();
		return $query;
	}
	/**
	* @param getAllBookingDate
	* DESC 
	*/
	function getAllBookingDate($id_jadwal,$date)
	{
		$select = "select X.*, data_keberangkatan.status status_seat from 
					(select seat.id id_seat, seat.nama_seat seat,seat.harga, jadwal.* 
						from 
						jadwal inner join 
						tipe_kendaraan	
						on jadwal.id_tipe_kendaraan = tipe_kendaraan.id 
						inner join 
						seat 
						on seat.kode = tipe_kendaraan.kode 
						where 
						jadwal.id = $id_jadwal) X 
					left join 
					(select * 
						from 
						data_keberangkatan 
						where
							status = 'pesan'
							and id_jadwal = $id_jadwal
							and date(date_added) = '$date'
							) data_keberangkatan 
					on X.id_seat = data_keberangkatan.id_seat";
		$query	=	$this->db->query($select);
		$this->db->close();
		return $query;
	}
	function getDataHargaSeat($id_jadwal,$seat)
	{
		$select = "select * from jadwal inner join tipe_kendaraan on jadwal.id = tipe_kendaraan.id 
					inner join seat on seat.kode = tipe_kendaraan.kode
					where jadwal.id = $id_jadwal and seat.id = '$seat'";
		$query	=	$this->db->query($select);
		$this->db->close();
		return $query;
	}
	function getDataKeberangkatan($id)
	{
		$select = "select * from data_keberangkatan where id=$id";
		$query = $this->db->query($select);
		$this->db->close();
		return $query;
	}
	function getDataTransaksi($id)
	{
		$select = "select tiket.harga tiket_harga,tiket.date_added tiket_date, data_keberangkatan.* from tiket inner join data_keberangkatan on tiket.id_keberangkatan = data_keberangkatan.id where tiket.id=$id";
		$query = $this->db->query($select);
		$this->db->close();
		return $query;
	}
	function getBerita()
	{
		$select = "select * from berita where id='0'";
		$query = $this->db->query($select);
		$this->db->close();
		return $query;
	}
	function getSuratJalan($id)
	{
		$select = "select * from data_keberangkatan_armada inner join jadwal on data_keberangkatan_armada.id_jadwal = jadwal.id where data_keberangkatan_armada.id=$id";
		$query = $this->db->query($select);
		$this->db->close();
		return $query;
	}
	function getAllPembayaran()
	{
		$select = "select data_keberangkatan.*, seat.harga harga_seat from data_keberangkatan left join seat on data_keberangkatan.id_seat = seat.id where status='pesan'";
		$query = $this->db->query($select);
		$this->db->close();
		return $query;	
	}
	function getPembayaranId($id)
	{
		$select = "select data_keberangkatan.*, seat.harga harga_seat from data_keberangkatan left join seat on data_keberangkatan.id_seat = seat.id where data_keberangkatan.id=$id";
		$query = $this->db->query($select);
		$this->db->close();
		return $query;	
	}
	function getTotalPenumpang($id_jadwal)
	{
		$select = "select count(*) total from data_keberangkatan where id_jadwal = $id_jadwal and status='clear'";
		$query = $this->db->query($select);
		$this->db->close();
		return $query;
	}
	function getLaporanPembayaranHarian($dateawal,$dateakhir)
	{
		$select = "select tiket.*,data_keberangkatan.id_jadwal,data_keberangkatan.seat, data_keberangkatan.nama from tiket inner join data_keberangkatan on tiket.id_keberangkatan = data_keberangkatan.id where date(tiket.date_added) between '$dateawal' and '$dateakhir'";
		$query = $this->db->query($select);
		$this->db->close();
		return $query;
	}
	function getLaporanBooking($dateawal,$dateakhir)
	{
		$select = "select data_keberangkatan.* from data_keberangkatan where date(date_added) between '$dateawal' and '$dateakhir'";
		$query = $this->db->query($select);
		$this->db->close();
		return $query;
	}
	function getSeatAll()
	{
		$select = "select seat.*, tipe_kendaraan.kode from seat inner join tipe_kendaraan on seat.kode = tipe_kendaraan.kode order by id";
		$query = $this->db->query($select);
		$this->db->close();
		return $query;
	}
	function getTipeKendaraanAll()
	{
		$select = "select * from tipe_kendaraan order by id";
		$query = $this->db->query($select);
		$this->db->close();
		return $query;
	}
	function getUsernamePassword($username, $password)
	{
		$select = "select * from user where username = '$username' and password = '$password'";
		$query = $this->db->query($select);
		$this->db->close();
		return $query;	
	}
	function getBookingData($id)
	{
		$select = "select * from data_keberangkatan where id = $id";
		$query	=	$this->db->query($select);
		$this->db->close();
		return $query;
	}
}