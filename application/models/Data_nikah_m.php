<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_nikah_m extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_daftar_nikah_per_kua($mitra_id){
		$this->db->select('count(data_nikah.data_nikah_id) AS jumlah
					,month(tanggal_akta_nikah) AS bulane
					,nama_bulan(month(tanggal_akta_nikah)) AS nama_bulan
					,year(tanggal_akta_nikah) AS tahune
					,master_mitra.nama_satker AS kua
					,data_nikah.mitra_id
				');
		$this->db->from('data_nikah');
		$this->db->where('data_nikah.mitra_id', $mitra_id);
		$this->db->join('master_mitra', 'master_mitra.mitra_id = data_nikah.mitra_id', 'left');
		$this->db->group_by('year(tanggal_akta_nikah)');
		$this->db->group_by('month(tanggal_akta_nikah)');
		$this->db->order_by('year(tanggal_akta_nikah)', 'DESC'); 
		$this->db->order_by('month(tanggal_akta_nikah)', 'ASC'); 
		return $this->db->get()->result();
	}
    function daftar_nikah_per_kua($mitra_id, $bulan, $tahun){
		$this->db->select('data_nikah.data_nikah_id
							,data_nikah.nomor_akta_nikah
							,data_nikah.nama_suami
							,data_nikah.alamat_suami
							,data_nikah.status_suami
							,data_nikah.bukti_duda
							,data_nikah.nama_istri
							,data_nikah.alamat_istri
							,data_nikah.status_istri
							,data_nikah.bukti_janda
							,master_mitra.nama_satker AS nama_kua
							,convert_tanggal_indonesia(tanggal_akta_nikah) AS tanggalaktanikah
			');
		$this->db->from('data_nikah');
		$this->db->where('data_nikah.mitra_id', $mitra_id);
		$this->db->where('year(data_nikah.tanggal_akta_nikah)', $tahun);
		$this->db->where('month(data_nikah.tanggal_akta_nikah)', $bulan);
		$this->db->join('master_mitra', 'master_mitra.mitra_id = data_nikah.mitra_id', 'left');
		$this->db->order_by('tanggal_akta_nikah', 'ASC'); 
		$this->db->order_by('nomor_akta_nikah', 'ASC'); 
		return $this->db->get()->result();
	}
    function detail_data_nikah($id){
		$this->db->select('data_nikah.*
			, convert_tanggal_indonesia(tanggal_akta_nikah) AS tanggal_akta_nikah
			, convert_tanggal_indonesia(tanggal_lahir_suami) AS tanggal_lahir_suami
			, convert_tanggal_indonesia(tanggal_lahir_istri) AS tanggal_lahir_istri
			, master_mitra.nama_satker AS nama_kua
							');
		$this->db->from('data_nikah');
		$this->db->where('data_nikah.data_nikah_id', $id );
		$this->db->join('master_mitra', 'master_mitra.mitra_id = data_nikah.mitra_id', 'left');

		return $this->db->get()->result();
	}
	function proses($sql){
		$query = $this->db->query($sql);
		//return $query->result();
	}


    function get_daftar_nikah_pa($pengadilan_id){
    	$sql="SELECT 
				count(data_nikah.data_nikah_id) AS jumlah
				,month(tanggal_akta_nikah) AS bulane
				,nama_bulan(month(tanggal_akta_nikah)) AS nama_bulan
				,year(tanggal_akta_nikah) AS tahune
				,master_mitra.nama_satker AS kua
				,data_nikah.mitra_id
			FROM data_nikah 
			LEFT JOIN master_mitra on master_mitra.mitra_id=data_nikah.mitra_id
			WHERE data_nikah.mitra_id IN (SELECT mitra_id FROM master_mitra WHERE pengadilan_id=$pengadilan_id)
			GROUP BY data_nikah.mitra_id, year(tanggal_akta_nikah), month(tanggal_akta_nikah)
			ORDER BY year(tanggal_akta_nikah)  DESC,  month(tanggal_akta_nikah) ASC, master_mitra.nama_satker ASC";
		$query = $this->db->query($sql); 
		return $query;
	}


	function get_all_data($table){
		$query = $this->db->get($table);
		return $query->result();
	}




	function get_data_where($whereconditon, $table){
		$this->db->where($whereconditon);
		$query = $this->db->get($table);
		return $query->result();
	}

	
    function get_data_perkara_all(){
		$this->db->select('*');
		$this->db->select('convert_tanggal_indonesia(tanggal) AS tanggal_indo');
		$this->db->from('data_permohonan');
		$this->db->order_by('id', 'desc');
		return $this->db->get()->result();
	}
    function get_jenis_data_perkara(){
		$this->db->select('*');
		$this->db->from('master_jenis_data_perkara');
		$this->db->order_by('jenis_data_perkara_id', 'ASC');
		return $this->db->get()->result();
	}
    function get_instansi_data_perkara($pa_id){
		$this->db->select('*');
		$this->db->from('master_mitra');
		$this->db->where('pengadilan_id', $pa_id );
    	//$xxx = array(8,9);
		//$this->db->where_in('instansi_id', $xxx);
		$this->db->where('instansi_id', 3);
		$this->db->order_by('instansi_id ', 'ASC'); 
		$this->db->order_by('nama_satker ', 'ASC'); 
		return $this->db->get()->result();
	}
    function get_data_perkara_satker($user_id){
		$this->db->select('*');
		$this->db->select('convert_tanggal_indonesia(tanggal) AS tanggal_indo');
		$this->db->from('data_permohonan');
		$this->db->where('pa_id', $user_id );
		$this->db->where('instansi_id ',2 );
		//$this->db->where('status', $user_id );
		$this->db->order_by('id', 'DESC'); 
		return $this->db->get()->result();
	}
    function get_data_perkara_data_perkara($mitra_id){
		$this->db->select('*');
		$this->db->select('convert_tanggal_indonesia(tanggal) AS tanggal_indo');
		$this->db->from('data_permohonan');
		$this->db->where('mitra_id', $mitra_id );
		$xxx = array(0,1,2,3,4,5,6);
		$this->db->where_in('status', $xxx );
		$this->db->order_by('id', 'DESC'); 
		return $this->db->get()->result();
	}
    function get_nomor_perkara($user_id){
    	$sql="SELECT nomor_register_eksekusi  AS nomor, permohonan_eksekusi  FROM perkara_eksekusi WHERE pa_id=$user_id UNION SELECT eksekusi_nomor_perkara  AS nomor, permohonan_eksekusi  FROM perkara_eksekusi_ht WHERE pa_id=$user_id Order by permohonan_eksekusi DESC";
		$query = $this->db->query($sql);
		return $query->result();
	}
    function get_data_perkara_byid($id){
		$this->db->select('*');
		$this->db->select('convert_tanggal_indonesia(tanggal) AS tanggal_indo'); 
		$this->db->from('data_permohonan');
		$this->db->where('id', $id );
		return $this->db->get()->result();
	}
    function soft($id){
		$this->db->select('*');
		$this->db->from('data_dokumen');
		$this->db->where('data_permohonan_id', $id );
		//var_dump($this->db->get()->result());exit;
		return $this->db->get()->result();
	}
    function get_mitra_id($id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('userid', $id );
		return $this->db->get()->result();
	}
	function save_data_perkara($data){
		$this->db->insert('data_permohonan', $data);
		return true;
	}
	
	function insert_data($tableName,$data){
		$res=$this->db->insert($tableName,$data);
		return $res;
	}
	function update_data($whereconditon,$tableName,$data){
		$this->db->where($whereconditon);
		$res=$this->db->update($tableName, $data);
		return $res;
	}
	function delete_data($whereconditon,$tableName){
		$this->db->where($whereconditon);
		$res=$this->db->delete($tableName);
		return $res;
	}
	
}

