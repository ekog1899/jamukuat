<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bpn_m extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function get_bpn_all(){
		$this->db->select('*');
		$this->db->select('convert_tanggal_indonesia(tanggal) AS tanggal_indo');
		$this->db->from('data_permohonan');
		$this->db->order_by('id', 'desc');
		return $this->db->get()->result();
	}
    function get_jenis_bpn(){
		$this->db->select('*');
		$this->db->from('master_jenis_bpn');
		$this->db->order_by('jenis_bpn_id', 'ASC');
		return $this->db->get()->result();
	}
    function get_instansi_bpn($pa_id){
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
    function get_bpn_satker($user_id){
		$this->db->select('*');
		$this->db->select('convert_tanggal_indonesia(tanggal) AS tanggal_indo');
		$this->db->from('data_permohonan');
		$this->db->where('pa_id', $user_id );
		$this->db->where('instansi_id ',1 );
		//$this->db->where('status', $user_id );
		$this->db->order_by('id', 'DESC'); 
		return $this->db->get()->result();
	}
    function get_bpn_bpn($mitra_id){
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
    function get_bpn_byid($id){
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
	function save_bpn($data){
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

