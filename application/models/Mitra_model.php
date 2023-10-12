<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mitra_model extends CI_Model
{

    public $table = 'master_mitra';
    public $id = 'mitra_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
		$deID=decrypt_url($id);
        $this->db->where($this->id, $deID);
        return $this->db->get($this->table)->row();
    }

    function get_by_id2($id)
    {
		$deID=base64_decode($id);
        $this->db->where($this->id, $deID);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL, $fpengadilan_id= NULL, $fgroup= NULL,$finstansi=null,$group_id,$instansi_id,$pengadilan_id,$mitra_id) {
	
        $this->db->select(' master_mitra.mitra_id,master_mitra.instansi_id,master_mitra.group_id,master_mitra.kode_satker,
        master_mitra.nama_satker, nama, nama_instansi,alamat_satker,kota_kabupaten_satker,wilayah_kerja,nama_group,
        email_satker,telepon_satker,fax_satker,wa_satker,master_mitra.aktif');

echo !empty($fpengadilan_id) ? $this->db->where('master_mitra.pengadilan_id', $fpengadilan_id) :''; 
echo !empty($fgroup) ? $this->db->where('master_mitra.group_id', $fgroup) :''; 
echo !empty($finstansi) ? $this->db->where('master_mitra.instansi_id', $finstansi) :''; 

$this->db->order_by($this->id, $this->order);
$this->db->group_start();
$this->db->like('mitra_id', $q);
$this->db->or_like('nama', $q);
$this->db->or_like('nama_instansi', $q);
$this->db->or_like('nama_group', $q);
$this->db->or_like('kode_satker', $q);
$this->db->or_like('nama_satker', $q);
$this->db->or_like('alamat_satker', $q);
$this->db->or_like('kota_kabupaten_satker', $q);
$this->db->or_like('wilayah_kerja', $q);
$this->db->or_like('email_satker', $q);
$this->db->or_like('telepon_satker', $q);
$this->db->or_like('fax_satker', $q);
$this->db->or_like('wa_satker', $q);
$this->db->or_like('master_mitra.aktif', $q);
$this->db->group_end();
$this->db->join('pengadilan_agama', 'pengadilan_agama.id = master_mitra.pengadilan_id', 'left');

$this->db->join('master_kategori_instansi', 'master_kategori_instansi.instansi_id = master_mitra.instansi_id', 'left');
$this->db->join('master_group', 'master_group.group_id = master_mitra.group_id', 'left');
if($group_id==1) {

}
elseif($group_id==2) {
if($instansi_id==1){
$this->db->where('master_mitra.group_id', $group_id);
} 
else{
$this->db->where('master_mitra.group_id', $group_id);
$this->db->where('master_mitra.instansi_id', $instansi_id);
$this->db->where('master_mitra.pengadilan_id', $pengadilan_id);
$this->db->where('master_mitra.mitra_id', $mitra_id);
}

}
elseif($group_id==3){
if($instansi_id == 1){
$this->db->where('master_mitra.group_id >=', $group_id);
$this->db->where('master_mitra.instansi_id >=', $instansi_id);
}
else {
	
$this->db->where('master_mitra.group_id >=', $group_id);
$this->db->where('master_mitra.instansi_id', $instansi_id);
}

}
elseif($group_id==4){
if($instansi_id == 1){
$this->db->where('master_mitra.group_id >=', $group_id);
$this->db->where('master_mitra.instansi_id >=', $instansi_id);
$this->db->where('master_mitra.pengadilan_id', $pengadilan_id);

}
else {
$this->db->where('master_mitra.group_id >=', $group_id);
$this->db->where('master_mitra.instansi_id =', $instansi_id);
$this->db->where('master_mitra.pengadilan_id', $pengadilan_id);

}

}
elseif($group_id==5){

$this->db->where('master_mitra.group_id >=', $group_id);
$this->db->where('master_mitra.instansi_id ', $instansi_id);
$this->db->where('master_mitra.pengadilan_id', $pengadilan_id);
$this->db->where('master_mitra.mitra_id', $mitra_id);


}
elseif($group_id==6){
$this->db->where('master_mitra.group_id >=', $group_id);
$this->db->where('master_mitra.instansi_id ', $instansi_id);
$this->db->where('master_mitra.pengadilan_id', $pengadilan_id);
$this->db->where('master_mitra.mitra_id', $mitra_id);

}
else{
$this->db->where('master_mitra.group_id >=', $group_id);
$this->db->where('master_mitra.instansi_id', $instansi_id);
$this->db->where('master_mitra.pengadilan_id', $pengadilan_id);

}

	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL, $fpengadilan_id= NULL, $fgroup= NULL,$finstansi=null,$group_id,$instansi_id,$pengadilan_id,$mitra_id) {


        $this->db->select(' master_mitra.mitra_id,master_mitra.instansi_id,master_mitra.group_id,master_mitra.kode_satker,
                            master_mitra.nama_satker, nama, nama_instansi,alamat_satker,kota_kabupaten_satker,wilayah_kerja,nama_group,
                            email_satker,telepon_satker,fax_satker,wa_satker,master_mitra.aktif');

	echo !empty($fpengadilan_id) ? $this->db->where('master_mitra.pengadilan_id', $fpengadilan_id) :''; 
	echo !empty($fgroup) ? $this->db->where('master_mitra.group_id', $fgroup) :''; 
	echo !empty($finstansi) ? $this->db->where('master_mitra.instansi_id', $finstansi) :''; 

        $this->db->order_by($this->id, $this->order);
        $this->db->group_start();
        $this->db->like('mitra_id', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('nama_instansi', $q);
        $this->db->or_like('nama_group', $q);
	$this->db->or_like('kode_satker', $q);
	$this->db->or_like('nama_satker', $q);
	$this->db->or_like('alamat_satker', $q);
	$this->db->or_like('kota_kabupaten_satker', $q);
	$this->db->or_like('wilayah_kerja', $q);
	$this->db->or_like('email_satker', $q);
	$this->db->or_like('telepon_satker', $q);
	$this->db->or_like('fax_satker', $q);
	$this->db->or_like('wa_satker', $q);
	$this->db->or_like('master_mitra.aktif', $q);
    $this->db->group_end();
    $this->db->join('pengadilan_agama', 'pengadilan_agama.id = master_mitra.pengadilan_id', 'left');
	
	$this->db->join('master_kategori_instansi', 'master_kategori_instansi.instansi_id = master_mitra.instansi_id', 'left');
	$this->db->join('master_group', 'master_group.group_id = master_mitra.group_id', 'left');
    if($group_id==1) {
		
	}
	elseif($group_id==2) {
		if($instansi_id==1){
		$this->db->where('master_mitra.group_id', $group_id);
		} 
		else{
			$this->db->where('master_mitra.group_id', $group_id);
			$this->db->where('master_mitra.instansi_id', $instansi_id);
			$this->db->where('master_mitra.pengadilan_id', $pengadilan_id);
			$this->db->where('master_mitra.mitra_id', $mitra_id);
		}
		
	}
	elseif($group_id==3){
		if($instansi_id == 1){
		$this->db->where('master_mitra.group_id >=', $group_id);
		$this->db->where('master_mitra.instansi_id >=', $instansi_id);
		}
		else {
			$this->db->where('master_mitra.group_id >=', $group_id);
		$this->db->where('master_mitra.instansi_id ', $instansi_id);
			
		}
		
	}
	elseif($group_id==4){
		if($instansi_id == 1){
		$this->db->where('master_mitra.group_id >=', $group_id);
		$this->db->where('master_mitra.instansi_id >=', $instansi_id);
		$this->db->where('master_mitra.pengadilan_id', $pengadilan_id);
	
		}
		else {
		$this->db->where('master_mitra.group_id >=', $group_id);
		$this->db->where('master_mitra.instansi_id =', $instansi_id);
		$this->db->where('master_mitra.pengadilan_id', $pengadilan_id);
		
		}
		
	}
	elseif($group_id==5){
	
		$this->db->where('master_mitra.group_id >=', $group_id);
		$this->db->where('master_mitra.instansi_id ', $instansi_id);
		$this->db->where('master_mitra.pengadilan_id', $pengadilan_id);
		$this->db->where('master_mitra.mitra_id', $mitra_id);
		
		
	}
	elseif($group_id==6){
		$this->db->where('master_mitra.group_id >=', $group_id);
		$this->db->where('master_mitra.instansi_id ', $instansi_id);
		$this->db->where('master_mitra.pengadilan_id', $pengadilan_id);
		$this->db->where('master_mitra.mitra_id', $mitra_id);
		
	}
	else{
		$this->db->where('master_mitra.group_id >=', $group_id);
		$this->db->where('master_mitra.instansi_id =', $instansi_id);
		$this->db->where('master_mitra.pengadilan_id', $pengadilan_id);
		
	}



	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
		$deID=decrypt_url($id);
        $this->db->where($this->id, $deID);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

// get total mitra where
function gettotalwhere($pengadilan,$group,$instansi,$mitra,$aktif) {
	$this->db->select('mitra_id');
	
	if($group==1){
		
	}
	elseif($group==2){ 
		$this->db->where('group_id >=', $group);
	}
	elseif($group==3){
		if($instansi==1){
		$this->db->where('group_id >=', $group);
		$this->db->where('instansi_id >=', $instansi);
		}
		else{
		$this->db->where('group_id >=', $group);
		$this->db->where('instansi_id ', $instansi);
		}
		
	}
	elseif($group==4){
		if($instansi==1){
		$this->db->where('group_id >=', $group);
		$this->db->where('instansi_id >=', $instansi);
		$this->db->where('pengadilan_id ', $pengadilan);
		}
		else{
		$this->db->where('group_id >=', $group);
		$this->db->where('instansi_id ', $instansi);
		$this->db->where('pengadilan_id ', $pengadilan);
		}
		
	}
	elseif($group==5){
		$this->db->where('group_id ', $group);
		$this->db->where('instansi_id ', $instansi);
		$this->db->where('pengadilan_id ', $pengadilan);
		//$this->db->where('mitra_id ', $mitra);
		
		
	}
	else{
		
	
	}
	//echo !empty($pengadilan) ? $this->db->where('pengadilan_id', $pengadilan) :''; 
	//echo !empty($group) ? $this->db->where('group_id >=', $group) :''; 
	//echo !empty($instansi) ? $this->db->where('instansi_id >=', $instansi) :''; 
	
	$this->db->where('aktif', $aktif); 
	$this->db->from($this->table);
    return $this->db->count_all_results();
    }




}

/* End of file Master_mitra_model.php */
/* Location: ./application/models/Master_mitra_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-03-14 05:49:55 */
/* http://harviacode.com */