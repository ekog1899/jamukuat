<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_perkara_m extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_data_perkara_per_pa($pa_id){
		$this->db->select('kd_satker, pengadilan_agama.nama
							,year(tanggal_putusan) AS tahun
							,nama_bulan(month(tanggal_putusan)) AS namabulan 
							,month(tanggal_putusan) AS bulan
							, SUM(IF(jenis_perkara_id=362,1,0)) AS dispensasi_kawin 
							, SUM(IF(jenis_perkara_id=363,1,0)) AS wali_adhol
							, SUM(IF(jenis_perkara_id=360,1,0)) AS itsbat_nikah
							, SUM(IF(jenis_perkara_id=341,1,0)) AS izin_poligami

							');
		$this->db->join('pengadilan_agama', 'pengadilan_agama.id = perkara.kd_satker', 'left');

		// $this->db->select('year(tanggal_putusan) AS tahun
		// 					,nama_bulan(month(tanggal_putusan)) AS namabulan 
		// 					,month(tanggal_putusan) AS bulan
		// 					, SUM(IF(jenis_perkara_id=362,1,0)) AS dispensasi_kawin 
		// 					, SUM(IF(jenis_perkara_id=363,1,0)) AS wali_adhol
		// 					, SUM(IF(jenis_perkara_id=360,1,0)) AS itsbat_nikah
		// 					, SUM(IF(jenis_perkara_id=341,1,0)) AS izin_poligami

		// 					');
		$this->db->from('perkara');
		// echo "</p>".$pa_id."</p>";
		if((int)$pa_id>0){
			if((int)$pa_id != 511){
				$this->db->where('kd_satker', $pa_id );				 
			}
			$this->db->group_by('pengadilan_agama.nama'); 
			$this->db->group_by('left(tanggal_putusan,7)');
			$this->db->order_by('nama', 'ASC');			
			$this->db->order_by('year(tanggal_putusan) ', 'DESC'); 
			$this->db->order_by('month(tanggal_putusan) ', 'ASC');			
		}
		// if((int)$pa_id>0){
		// 	$this->db->where('kd_satker', $pa_id );
		// }
		// $this->db->group_by('left(tanggal_putusan,7)'); 
		// $this->db->order_by('year(tanggal_putusan) ', 'DESC'); 
		// $this->db->order_by('month(tanggal_putusan) ', 'ASC'); 
		return $this->db->get()->result();
	}
    function get_daftar_perkara_per_pa_per_jenis_perkara($pengadilan_id, $bulan, $tahun, $jenis_perkara_id){
		$this->db->select('perkara.id
			,perkara.perkara_id 
			,perkara.nomor_perkara 
			,perkara.tanggal_pendaftaran 
			,perkara.tanggal_putusan 
			,perkara.para_pihak 
			, convert_tanggal_indonesia(tanggal_putusan) AS tanggalputusan, convert_tanggal_indonesia(tanggal_pendaftaran) AS tanggalpendaftaran,
			status_putusan.nama AS putusan
			,REPLACE(pengadilan_agama.nama,"PENGADILAN AGAMA ","") AS nama_pa
							');
		$this->db->from('perkara');
		if((int)$pengadilan_id>0){
			// if((int)$pengadilan_id != 511){
				$this->db->where('kd_satker', $pengadilan_id );
			// }
			$this->db->where('year(tanggal_putusan)', $tahun );
			$this->db->where('month(tanggal_putusan)', $bulan );
			$this->db->where('perkara.jenis_perkara_id', $jenis_perkara_id );
			$this->db->join('status_putusan', 'status_putusan.id = perkara.status_putusan_id', 'left');
			$this->db->join('pengadilan_agama', 'pengadilan_agama.id = perkara.kd_satker', 'left');

			$this->db->order_by('kd_satker', 'ASC'); 
			$this->db->order_by('tanggal_pendaftaran', 'ASC'); 
			$this->db->order_by('nomor_perkara', 'ASC');
		}
		// print_r($pengadilan_id);
		return $this->db->get()->result();
		
	}
    function get_detail_perkara($id){
		$this->db->select('perkara.*
			, convert_tanggal_indonesia(tanggal_putusan) AS tanggalputusan, convert_tanggal_indonesia(tanggal_pendaftaran) AS tanggalpendaftaran,
			status_putusan.nama AS putusan
							');
		$this->db->from('perkara');
		$this->db->where('perkara.id', $id );
		$this->db->join('status_putusan', 'status_putusan.id = perkara.status_putusan_id', 'left');

		return $this->db->get()->result();
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

