<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pns_m extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function get_pns_all(){
		$this->db->select('perkara_pendaftaran_pns.*');
		$this->db->select('master_mitra.nama_satker');
		$this->db->select('convert_tanggal_indonesia(tanggal_pendaftaran) AS tanggal_daftar');
		$this->db->from('perkara_pendaftaran_pns');
		$this->db->join('master_mitra', 'master_mitra.mitra_id = perkara_pendaftaran_pns.unit_kerja', 'left');
		$this->db->order_by('tanggal_pendaftaran', 'DESC');
		return $this->db->get()->result();
	}
	function get_master_unit_kerja($pa_id){
		$sql="SELECT * FROM `master_mitra`
		WHERE group_id='4' AND (instansi_id='3' OR instansi_id='7')";
		return $this->db->query($sql)->result();
	}
	/*function get_master_unit_kerja2($pa_id){
		$sql="SELECT * FROM `master_mitra`
		WHERE pengadilan_id='$pa_id'";
		return $this->db->query($sql)->result();
	}*/
    function get_pns_satker($pa_id){
		$this->db->select('perkara_pendaftaran_pns.*');
		$this->db->select('master_mitra.nama_satker');
		$this->db->select('convert_tanggal_indonesia(tanggal_pendaftaran) AS tanggal_daftar');
		$this->db->from('perkara_pendaftaran_pns');
		$this->db->join('master_mitra', 'master_mitra.mitra_id = perkara_pendaftaran_pns.unit_kerja', 'left');

		$this->db->where('kd_satker', $pa_id );

		$this->db->order_by('id', 'desc');
		return $this->db->get()->result();
	}
	function get_pns_polda(){
		$this->db->select('perkara_pendaftaran_pns.*');
		$this->db->select('master_mitra.nama_satker');
		$this->db->select('convert_tanggal_indonesia(tanggal_pendaftaran) AS tanggal_daftar');
		$this->db->from('perkara_pendaftaran_pns');
		$this->db->join('master_mitra', 'master_mitra.mitra_id = perkara_pendaftaran_pns.unit_kerja', 'left');

		$this->db->where('`master_mitra`.`instansi_id` = 3');

		$this->db->order_by('id', 'desc');
		return $this->db->get()->result();
	}
	function get_pns_mitra($id){
		$this->db->select('perkara_pendaftaran_pns.*');
		$this->db->select('master_mitra.nama_satker');
		$this->db->select('convert_tanggal_indonesia(tanggal_pendaftaran) AS tanggal_daftar');
		$this->db->from('perkara_pendaftaran_pns');
		$this->db->join('master_mitra', 'master_mitra.mitra_id = perkara_pendaftaran_pns.unit_kerja', 'left');

		$this->db->where('unit_kerja', $id );

		$this->db->order_by('id', 'desc');
		return $this->db->get()->result();
	}
    function get_pns_byid($id){
		$this->db->select('perkara_pendaftaran_pns.*');
		$this->db->select('master_mitra.nama_satker');
		$this->db->select('convert_tanggal_indonesia(tanggal_pendaftaran) AS tanggal_indo');
		$this->db->from('perkara_pendaftaran_pns');
		$this->db->join('master_mitra', 'master_mitra.mitra_id = perkara_pendaftaran_pns.unit_kerja', 'left');

		$this->db->where('id', $id );
		return $this->db->get()->result();
	}
	function save_pns($data){
		$this->db->insert('perkara_pendaftaran_pns', $data);
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
	/*-----------------------PNS POLRES by Mas21------------------------------- */   
    function get_pns_mitraid($whereconditon){
        $sql="SELECT *, convert_tanggal_indonesia(tanggal_pendaftaran) AS tanggal_daftar,
             a.nama AS nama_pihak, a.id as idnya, b.nama AS nama_pa
             FROM perkara_pendaftaran_pns AS a 
             LEFT JOIN pengadilan_agama AS b ON a.kd_satker=b.id
             WHERE a.unit_kerja = '".$whereconditon."'";
        $query = $this->db->query($sql); 
        return $query->result();  
    }
    
    function proses_pns_polres($whereconditon,$tableName,$data){
        $this->db->where($whereconditon);
        $res=$this->db->update($tableName, $data);
        return $res;
    }

    function get_pns_putusan($whereconditon){
        $sql="SELECT a.*, b.nama AS nama_pa
             FROM perkara_putusan_pns AS a 
             LEFT JOIN pengadilan_agama AS b ON a.kd_satker=b.id
             join perkara_pendaftaran_pns as c on a.kd_satker=c.kd_satker and a.perkara_id=c.perkara_id
             WHERE c.unit_kerja = '".$whereconditon."'";
        $query = $this->db->query($sql); 
        return $query;  
    }
 /*---------------------End PNS POLRES by Mas21---------------------------- */
	//////////////////////////////ngisor tambahanono dhewe

}

