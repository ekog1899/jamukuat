<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_eksekusi_m extends CI_Model{
    function __construct(){
        parent::__construct();
    }
  
    function get_all_pa() {        
		$this->db->select('pengadilan_agama.`id`, pengadilan_agama.nama, COUNT(perkara_eksekusi.nomor_perkara_pn) AS jml');
		$this->db->select('SUM(IF(perkara_eksekusi.status_eksekusi_text  = "Selesai" OR perkara_eksekusi.status_eksekusi_text  = "Pencabutan Permohonan Eksekusi"  , 1,0)) AS selesai');
		$this->db->select('CASE WHEN COUNT(perkara_eksekusi.nomor_perkara_pn)>0 THEN  SUM(IF(perkara_eksekusi.status_eksekusi_text  = "" OR  perkara_eksekusi.status_eksekusi_text IS NULL  , 1,0)) ELSE 0 END AS dalam_proses');
		$this->db->join('perkara_eksekusi','`pengadilan_agama`.`id` = `perkara_eksekusi`.`pa_id`','left');
		$this->db->order_by('pengadilan_agama.nama','Asc');
		$this->db->group_by('pengadilan_agama.kode_pn');
	    return $this->db->get('pengadilan_agama')->result();
	}
	
    function get_all_pa_filter($tahun) {        
		$this->db->select('pengadilan_agama.`id`, pengadilan_agama.nama, COUNT(`perkara_eksekusi`.`nomor_perkara_pn`) AS jml' );
		$this->db->select('SUM(IF(perkara_eksekusi.status_eksekusi_text  = "Selesai" OR perkara_eksekusi.status_eksekusi_text  = "Pencabutan Permohonan Eksekusi"  , 1,0)) AS selesai');
		$this->db->select('CASE WHEN COUNT(perkara_eksekusi.nomor_perkara_pn)>0 THEN  SUM(IF(perkara_eksekusi.status_eksekusi_text  = "" OR  perkara_eksekusi.status_eksekusi_text IS NULL  , 1,0)) ELSE 0 END AS dalam_proses');
		$this->db->join('perkara_eksekusi','`pengadilan_agama`.`id` = `perkara_eksekusi`.`pa_id`','left');		
		$this->db->order_by('pengadilan_agama.nama','Asc');
		$this->db->where('year(permohonan_eksekusi)',$tahun);	   
	   	$this->db->group_by('pengadilan_agama.kode_pn');
	    return $this->db->get('pengadilan_agama')->result();	
	}
	
	function tahun_eks(){
        $this->db->select('YEAR(permohonan_eksekusi) AS tahun ' );
		$this->db->group_by("tahun");
		$this->db->order_by("tahun", 'DESC');
        return $this->db->get('perkara_eksekusi')->result();		
    }
	
	function daftarperkara_list($satker, $tahun){
        $this->db->select('perkara_eksekusi.perkara_id as idPkr, nomor_perkara_pn AS nomorPkr, nomor_register_eksekusi AS nomorRekEks, permohonan_eksekusi AS tglPermohonan , nama, status_eksekusi_text' );
		$this->db->join('pengadilan_agama','perkara_eksekusi.`pa_id`=pengadilan_agama.`id`','left');		
		$this->db->order_by('permohonan_eksekusi','Asc');
		
		if ($tahun==0){			
		}else {
			$this->db->where('year(permohonan_eksekusi)',$tahun);
		}
		$this->db->where('pa_id`',$satker);
		return $this->db->get('perkara_eksekusi')->result();
    }
	
	function daftarperkara_detil($satker, $idPkr){
        $this->db->select('*' );		
		$this->db->where('pa_id`',$satker);
		$this->db->where('perkara_id`',$idPkr);
		return $this->db->get('perkara_eksekusi')->result();		
    }
	
	function daftarperkara_pihak($satker, $idPkr){
        $this->db->select('*' );		
		$this->db->where('pa_id`',$satker);
		$this->db->where('perkara_id`',$idPkr);
		return $this->db->get('perkara_eksekusi_detil')->result();		
    }
	function vpengadilan($satker){
        $this->db->select('*' );		
		$this->db->where('id',$satker);
		return $this->db->get('pengadilan_agama')->row_array();		
    }
	
	function simpan_aanmaning($data){
       return $this->db->insert('perkara_eksekusi_aanmaning',$data);		
    }	
	
	function simpan_aansidang($data){
       return $this->db->insert('perkara_eksekusi_aanmaning_sidang',$data);		
    }

	function get_sidangaanmaning($satker, $idPkr){
		$this->db->select('*');
		$this->db->from('perkara_eksekusi_aanmaning_sidang');
		$this->db->where('pa_id`',$satker);
		$this->db->where('perkara_id`',$idPkr);
		$this->db->order_by('id`', 'dsc');
		return $this->db->get()->result();
	}

	function get_aanmaning($satker, $idPkr){
		$this->db->select('*');
		$this->db->from('perkara_eksekusi_aanmaning');
		$this->db->where('pa_id`',$satker);
		$this->db->where('perkara_id`',$idPkr);
		return $this->db->get()->result();
	}
	//iki tambahan 2023
	function get_mitra($id, $pengadilan_id){
		$this->db->select('mitra_id, nama_satker, email_satker, wa_satker');
		$this->db->from('master_mitra');
		$this->db->where('instansi_id',$id);
		$this->db->where('pengadilan_id',$pengadilan_id);
		
		$this->db->order_by('nama_satker', 'asc');
		return $this->db->get()->result();
	}
	//iki tambahan 2023

	function update_aanmaning($satker, $idPkr, $data){
		$this->db->where('pa_id', $satker);
		$this->db->where('perkara_id', $idPkr );
		return $this->db->update('perkara_eksekusi_aanmaning',$data);
	}
	
	function save_tunda_aanmaning($data){
		$this->db->insert('perkara_eksekusi_aanmaning_sidang', $data);
		return true;
	}
}

