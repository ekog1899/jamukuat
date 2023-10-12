<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_eksekusi_ht_m extends CI_Model{

      function __construct(){
        parent::__construct();
    }
 
  
    function get_all_pa() {
        
		 $this->db->select('pengadilan_agama.`id`,
  
  pengadilan_agama.nama,
  COUNT(`perkara_eksekusi`.`nomor_perkara_pn`) AS jml' );

		$this->db->join('perkara_eksekusi','`pengadilan_agama`.`id` = `perkara_eksekusi`.`pa_id`','left');
		
		$this->db->order_by('pengadilan_agama.nama','Asc');
		

	   
	   $this->db->group_by('pengadilan_agama.kode_pn');
	     return $this->db->get('pengadilan_agama')->result();
	
	
	}
	
    function get_all_pa_filter($tahun) {
        
		 $this->db->select('pengadilan_agama.`id`,
  
  pengadilan_agama.nama,
  COUNT(`perkara_eksekusi`.`nomor_perkara_pn`) AS jml' );

		$this->db->join('perkara_eksekusi','`pengadilan_agama`.`id` = `perkara_eksekusi`.`pa_id`','left');
		
		$this->db->order_by('pengadilan_agama.nama','Asc');
		$this->db->where('year(permohonan_eksekusi)',$tahun);
		

	   
	   $this->db->group_by('pengadilan_agama.kode_pn');
	     return $this->db->get('pengadilan_agama')->result();
	
	
	}
    function data_perkara_ht() {
        
		 $this->db->select('pengadilan_agama.`id`,pengadilan_agama.nama,COUNT(`perkara_eksekusi_ht`.`ht_id`) AS jml' );

		$this->db->select('SUM(IF(perkara_eksekusi_ht.status_eksekusi_text  = "Selesai" OR perkara_eksekusi_ht.status_eksekusi_text  = "Pencabutan Permohonan Eksekusi"  , 1,0)) AS selesai');
		$this->db->select('CASE WHEN COUNT(perkara_eksekusi_ht.pa_id)>0 THEN  SUM(IF(perkara_eksekusi_ht.status_eksekusi_text  = "" OR  perkara_eksekusi_ht.status_eksekusi_text IS NULL  , 1,0)) ELSE 0 END AS dalam_proses');
		$this->db->join('perkara_eksekusi_ht','`pengadilan_agama`.`id` = `perkara_eksekusi_ht`.`pa_id`','left');
		
		$this->db->order_by('pengadilan_agama.nama','Asc');
		

	   
	   $this->db->group_by('pengadilan_agama.kode_pn');
	     return $this->db->get('pengadilan_agama')->result();
	
	
	}
	
	function tahun_eks()
    {
        $this->db->select('YEAR(permohonan_eksekusi) AS tahun ' );
		$this->db->group_by("tahun");
		$this->db->order_by("tahun", 'DESC');
        return $this->db->get('perkara_eksekusi_ht')->result();
		
    }
	
	function daftarperkara_list($satker)
    {
        $this->db->select('ht_id,eksekusi_nomor_perkara, convert_tanggal_indonesia(permohonan_eksekusi) AS tanggal_permohonan_eksekusinya,jenis_ht_text,status_eksekusi_text' );

		$this->db->order_by('ht_id','Asc');
		 
		$this->db->where('pa_id`',base64_decode($satker));
		return $this->db->get('perkara_eksekusi_ht')->result();
		
    }
	
	function daftarperkara_detil($satker, $ht_id)
    {
		// print_r($satker.'  '.$ht_id);
        $this->db->select('*, convert_tanggal_indonesia(permohonan_eksekusi) AS tanggale, convert_tanggal_indonesia(tgl_sertifikat) AS tgl_sertifikate' );

		
		$this->db->where('pa_id`',base64_decode($satker));
		$this->db->where('ht_id`',$ht_id);
		return $this->db->get('perkara_eksekusi_ht')->result();
		
    }
	
	function daftarperkara_pihak($satker, $ht_id,$status_pihak_id)
    {
        $this->db->select('status_pihak_text, pihak_nama, pihak_id' );

		
		$this->db->where('pa_id`',base64_decode($satker));
		$this->db->where('ht_id`',$ht_id);
		$this->db->where('status_pihak_id`',$status_pihak_id);
		return $this->db->get('perkara_eksekusi_detil_ht')->result();
		
    }
	function vpengadilan($satker)
    {
        $this->db->select('nama' );

		
		$this->db->where('id',$satker);

		return $this->db->get('pengadilan_agama')->row_array();
		
    }
	
	function simpan_aanmaning($data)
    {

       return $this->db->insert('perkara_eksekusi_aanmaning',$data);
		
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
	
}

