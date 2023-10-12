<?php
class Home_m extends CI_Model{
	
	
	
	function getData(){
	 $query = $this->db->query  ("SELECT
  `pengadilan_agama`.`id`,
  
  `pengadilan_agama`.`nama`,
  COUNT(`perkara_eksekusi`.`nomor_perkara_pn`) AS jml
FROM
  `db_sharing_eksekusi`.`pengadilan_agama`
  LEFT JOIN  `db_sharing_eksekusi`.`perkara_eksekusi`
    ON (
      `pengadilan_agama`.`id` = `perkara_eksekusi`.`pa_id`
    )
GROUP BY `pengadilan_agama`.`kode_pn`;

");
										
		
				return $query->result_array();
	 
	 
	 
	}
	
	function getData1(){
	 $this->db->select("count(*) as jumlah , pa_id as pa" );
	 $this->db->from("perkara_eksekusi");
	 $this->db->group_by("pa_id");
	 return  $this->db->get()->result_array();
	 
	 
	 
	}
	
	
	function getDetilPa($kode_satker){
	 $this->db->select("nomor_perkara_pn " );
	 $this->db->from("perkara_eksekusi");
	 $this->db->where("pa_id",$kode_satker);
	 return  $this->db->get()->result_array();
	 
	 
	 
	}


}