<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_pernikahan_m extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function provinsi(){
		$this->db->select('propinsi');
		$this->db->from('master_kua');
		$this->db->group_by('propinsi');
		$this->db->order_by('propinsi', 'ASC'); 
		return $this->db->get()->result();
	}
    function kabupaten_kota($provinsi){
		$this->db->select('kab_kota');
		$this->db->from('master_kua');
		$this->db->where('propinsi',$provinsi);
		$this->db->group_by('kab_kota');
		$this->db->order_by('kab_kota', 'ASC'); 
		return $this->db->get()->result();
	}
    function kua($kabupaten_kota){
		$this->db->select('kode_kua, nama_kua');
		$this->db->from('master_kua');
		$this->db->where('kab_kota',$kabupaten_kota);
		$this->db->order_by('nama_kua', 'ASC'); 
		return $this->db->get()->result();
	}	
}

