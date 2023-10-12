<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Dokumen_m extends CI_Model{
	function __construct(){
		parent::__construct(); 
	}
	function get_data($select, $table){
		$query = $this->db->get($table);
		return $query->result();
	}
	function get_master_variabel_data(){
		$this->db->select("master_variabel.*,master_variabel_model.keterangan");
		$this->db->join('master_variabel_model','master_variabel_model.var_model = master_variabel.var_model','left');
		$this->db->order_by('master_variabel.var_nomor','ASC');
		return $this->db->get('master_variabel')->result();
	}
	function get_all_data($table){
		$query = $this->db->get($table);
		return $query->result();
	}

	function insert_data($tableName, $data){
		$res = $this->db->insert($tableName, $data);
		return $res;
	}

	function update_data($whereconditon, $tableName, $data){
		$this->db->where($whereconditon);
		$res = $this->db->update($tableName, $data); 
		return $res;
	}
	
	function delete_data($whereconditon, $tableName){
		$this->db ->where($whereconditon); 
		$res = $this->db->delete($tableName);
		return $res;
	}

	function get_data_where($whereconditon, $table){
		$this->db->where($whereconditon);
		$query = $this->db->get($table);
		return $query->result();
	}

	function get_data_where2($whereconditon, $table){
		$this->db->where($whereconditon);
		$query = $this->db->get($table);
		return $query;
	}
	
	function get_data_where3($pa_id){
		$sql="SELECT *
				FROM users WHERE pengadilan_id = '".$pa_id."' AND `group` <> '1'";
		$query = $this->db->query($sql); 
		return $query->result();
	}
	function get_data_where4($pa_id){
		$sql="SELECT *
				FROM users WHERE pengadilan_id = '".$pa_id."' AND `group` <> '1'";
		$query = $this->db->query($sql); 
		return $query;
	}

	function get_data_where5(){
		$sql="SELECT *FROM users a WHERE a.group = '1'";
		$query = $this->db->query($sql); 
		return $query;
	}

	function get_data_key_kua($id){
		$sql="SELECT *, b.id as ids
				FROM master_mitra a
				JOIN master_mitra_kua b on a.mitra_id=b.mitra_id
				WHERE a.mitra_id = '".$id."'";
		$query = $this->db->query($sql); 
		return $query;
	}

	function get_all_pa() {

$this->db->select('pengadilan_agama.id,

pengadilan_agama.nama,
COUNT(perkara_eksekusi.nomor_perkara_pn) AS jml' );

$this->db->join('perkara_eksekusi','pengadilan_agama.id = perkara_eksekusi.pa_id','left');

$this->db->order_by('pengadilan_agama.nama','Asc');



$this->db->group_by('pengadilan_agama.kode_pn');
return $this->db->get('pengadilan_agama')->result();


}

function get_all_pa_filter($tahun) {

$this->db->select('pengadilan_agama.id,

pengadilan_agama.nama,
COUNT(perkara_eksekusi.nomor_perkara_pn) AS jml' );

$this->db->join('perkara_eksekusi','pengadilan_agama.id = perkara_eksekusi.pa_id','left');

$this->db->order_by('pengadilan_agama.nama','Asc');
$this->db->where('year(permohonan_eksekusi)',$tahun);



$this->db->group_by('pengadilan_agama.kode_pn');
return $this->db->get('pengadilan_agama')->result();


}

function tahun_eks()
{
$this->db->select('YEAR(permohonan_eksekusi) AS tahun ' );
$this->db->group_by("tahun");
$this->db->order_by("tahun", 'DESC');
return $this->db->get('perkara_eksekusi')->result();

}

function daftarperkara_list($satker, $tahun)
{
$this->db->select('perkara_eksekusi.perkara_id as idPkr, nomor_perkara_pn AS nomorPkr, nomor_register_eksekusi AS nomorRekEks, permohonan_eksekusi AS tglPermohonan , nama' );

$this->db->join('pengadilan_agama','perkara_eksekusi.pa_id=pengadilan_agama.id','left');

$this->db->order_by('permohonan_eksekusi','Asc');
if ($tahun==0){


}else {
$this->db->where('year(permohonan_eksekusi)',$tahun);
}
$this->db->where('pa_id',$satker);
return $this->db->get('perkara_eksekusi')->result();

}

function daftarperkara_detil($satker, $idPkr)
{
$this->db->select('*' );


$this->db->where('pa_id',$satker);
$this->db->where('perkara_id',$idPkr);
return $this->db->get('perkara_eksekusi')->result();

}

function daftarperkara_pihak($satker, $idPkr)
{
$this->db->select('*' );


$this->db->where('pa_id',$satker);
$this->db->where('perkara_id',$idPkr);
return $this->db->get('perkara_eksekusi_detil')->result();

}
function vpengadilan($satker){
$this->db->select('*' );


$this->db->where('id',$satker);

return $this->db->get('pengadilan_agama')->row_array();

}

	function pilih_data($table, $kolom, $where){
		$q = $this ->db ->query("SELECT $kolom  AS DATA FROM  $table WHERE $where LIMIT 1 "); 
		foreach ($q->result_array() as $d){
		}
		return $d;
	}
	function pilih_data_sql($sql){
		$q = $this ->db ->query($sql); 
		foreach ($q->result_array() as $d){
		}
		return $d;
	}
	function jalankan_data_sql($sql){
		$q = $this ->db ->query($sql); 
	}

function simpan_aanmaning($data)
{

return $this->db->insert('perkara_eksekusi_aanmaning',$data);

}

function get_aanmaning($satker, $idPkr){
$this->db->select('*');
$this->db->from('perkara_eksekusi_aanmaning');
$this->db->where('pa_id',$satker);
$this->db->where('perkara_id',$idPkr);
return $this->db->get()->result();
}
function akhir_id(){
	$id=1;
	$query = $this->db->query("SELECT (ifnull(max(id),0)) +1 AS last_id FROM template_dokumen"); 
	foreach ($query->result() as $row){
		$id= $row->last_id;
	}
	return $id;
}
}

