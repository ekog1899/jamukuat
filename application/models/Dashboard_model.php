<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_satker(){
        $this->db->select('count(*) as jml');
        $this->db->from('pengadilan_agama');
        $count_satker = $this->db->get();
        return $count_satker;
    }

    function get_perkara_eksekusi(){
        $this->db->select('count(*) as jml');
        $this->db->from('perkara_eksekusi');
        $count_perkara_eksekusi = $this->db->get();
        return $count_perkara_eksekusi;
    }
    function get_perkara_eksekusi_where($where){
        $sql="SELECT pa_id FROM perkara_eksekusi WHERE $where";
        $query = $this->db->query($sql);
        //echo $sql."<br>";
        return $query->num_rows();
    }
        function update_data($whereconditon, $tableName, $data){
        $this->db->where($whereconditon);
        $res = $this->db->update($tableName, $data); 
        return $res;
    }

    function get_perkara_eksekusi_ht(){
        $this->db->select('count(*) as jml');
        $this->db->from('perkara_eksekusi_ht');
        $count_perkara_eksekusi = $this->db->get();
        return $count_perkara_eksekusi;
    }
    function get_perkara_eksekusi_ht_where($where){
        $sql="SELECT pa_id FROM perkara_eksekusi_ht WHERE $where";
        $query = $this->db->query($sql);
        //echo $sql;
        return $query->num_rows();
    }

    function get_user(){
        $this->db->select('count(*) as jml');
        $this->db->from('users');
        $intcount_user = $this->db->get();
        return $intcount_user;
    }
 

    function get_chart(){
        $this->db->select('YEAR(permohonan_eksekusi) AS yr, COUNT(permohonan_eksekusi) AS jml');
        $this->db->from('perkara_eksekusi');
        $this->db->group_by('YEAR(permohonan_eksekusi)');
        $qchart = $this->db->get();
        return $qchart;
    }

    /*-----------------------BKD by Mas21------------------------------- */   
    function get_pns($whereconditon){
        $sql="SELECT a.id, a.kd_satker, a.perkara_id, a.nomor_perkara, a.tanggal_pendaftaran, a.jenis_perkara,
             a.jenis_pihak, a.nama, a.nip, a.unit_kerja, a.unit_kerja_lain, a.satuan_kerja, 
             a.izin_cerai, a.status_lapor, a.kirim_email, a.flag,
             b.nama AS nama_pa
             FROM perkara_pendaftaran_pns AS a 
             LEFT JOIN pengadilan_agama AS b ON a.kd_satker=b.id
             WHERE a.unit_kerja = '".$whereconditon."'";
        $query = $this->db->query($sql); 
        return $query;  
    }
    
    function proses_pns($whereconditon,$tableName,$data){
        $this->db->where($whereconditon);
        $res=$this->db->update($tableName, $data);
        return $res;
    }
 /*---------------------End BKD by Mas21---------------------------- */ 

    function get_pns_putusan($whereconditon){
        $sql="SELECT a.*, b.nama AS nama_pa
             FROM perkara_putusan_pns AS a 
             LEFT JOIN pengadilan_agama AS b ON a.kd_satker=b.id
             WHERE a.unit_kerja = '".$whereconditon."'";
        $query = $this->db->query($sql); 
        return $query;  
    }


}