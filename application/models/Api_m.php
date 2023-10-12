<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_m extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	function get_data_where($whereconditon,$table){
		$this->db->where($whereconditon);
		$query = $this->db->get($table); 
		return $query;
	}

	function get_data($table){
		$query = $this->db->get($table); 
		return $query;
	}

	function monitoring_data_pns($dari,$sampai){
		$sql="SELECT a.id, a.nama, COUNT(b.`nomor_perkara`) AS data_pns, 
		SUM(CASE WHEN b.unit_kerja IS NOT NULL THEN 1 ELSE 0 END) AS data_pns_dikirim,
		IF(COUNT(b.`nomor_perkara`)=0, 0, SUM(CASE WHEN b.unit_kerja IS NULL THEN 1 ELSE 0 END))  AS data_pns_blm_dikirim,
				SUM(CASE WHEN b.unit_kerja IS NOT NULL THEN 1 ELSE 0 END)/COUNT(b.`nomor_perkara`)*100 AS prosentase
				FROM pengadilan_agama  a
				LEFT JOIN perkara_pendaftaran_pns b ON b.`kd_satker`=a.`id` AND b.tanggal_pendaftaran>='".$dari."' AND b.tanggal_pendaftaran<='".$sampai."'
				WHERE a.id<>'511'
				GROUP BY a.`nama` 
				ORDER BY IF(SUM(CASE WHEN b.unit_kerja IS NOT NULL THEN 1 ELSE 0 END)=0,0,SUM(CASE WHEN b.unit_kerja IS NOT NULL THEN 1 ELSE 0 END)/COUNT(b.`nomor_perkara`)*100)   DESC
				, COUNT(b.`nomor_perkara`) ASC";
		$query = $this->db->query($sql); 
		return $query;	
	}

	function monitoring_pns2($kd_satker,$dari,$sampai){
		$sql="select a.*, c.tanggal_putusan, c.amar_putusan from perkara_pendaftaran_pns a 
				join pengadilan_agama b on a.kd_satker=b.id
				LEFT JOIN perkara_putusan_pns as c on a.kd_satker=c.kd_satker and a.perkara_id=c.perkara_id
				where a.kd_satker=$kd_satker and a.tanggal_pendaftaran>='".$dari."'
				and a.tanggal_pendaftaran<='".$sampai."'";
		
		$query = $this->db->query($sql); 
		return $query;	
	}

	function monitoring_pns_dikirim_mitra($kd_satker,$dari,$sampai){
		$sql="select a.*, c.tanggal_putusan, c.amar_putusan, bb.nama_satker from perkara_pendaftaran_pns a 
				join pengadilan_agama b on a.kd_satker=b.id
				left JOIN master_mitra bb ON a.`unit_kerja`=bb.`mitra_id`
				LEFT JOIN perkara_putusan_pns as c on a.kd_satker=c.kd_satker and a.perkara_id=c.perkara_id
				where a.kd_satker=$kd_satker and a.tanggal_pendaftaran>='".$dari."'
				and a.tanggal_pendaftaran<='".$sampai."' and (a.unit_kerja IS NOT NULL OR a.unit_kerja=0)";
		
		$query = $this->db->query($sql); 
		return $query;	
	}

	function monitoring_pns_blm_dikirim_mitra($kd_satker,$dari,$sampai){
		$sql="select a.*, c.tanggal_putusan, c.amar_putusan from perkara_pendaftaran_pns a 
				join pengadilan_agama b on a.kd_satker=b.id
				LEFT JOIN perkara_putusan_pns as c on a.kd_satker=c.kd_satker and a.perkara_id=c.perkara_id
				where a.kd_satker=$kd_satker and a.tanggal_pendaftaran>='".$dari."'
				and a.tanggal_pendaftaran<='".$sampai."' and (a.unit_kerja IS NULL)";
		
		$query = $this->db->query($sql); 
		return $query;	
	}

	function cek_update($pa_id){
		
		$sql="
		SELECT * FROM pengadilan_agama c where c.id=$pa_id and c.update_02_2023 is not null

		";

		$query = $this->db->query($sql); 
		return $query;	
	}


	function get_data_daftar(){
		$sql="
		SELECT a.*, b.`nama_satker`, b.`email_satker`, c.`nama` as nama_pa, a.id as ids FROM perkara_pendaftaran_pns a 
		JOIN master_mitra b ON a.`unit_kerja`=b.`mitra_id`
		JOIN pengadilan_agama c ON a.`kd_satker`=c.`id`
		WHERE a.`kirim_email`=0
		";
		$query = $this->db->query($sql); 
		return $query;	
	}

	public function update_data($whereconditon,$tableName,$data){
		$this->db->where($whereconditon);
		$res=$this->db->update($tableName, $data);
		return $res;
	}




	function get_capil2($mitra_id){

		$get_kode_wil=$this->get_data_where(array('mitra_id'=>$mitra_id),'master_mitra_kodewilayah')->row_array();
		$kode_wil=$get_kode_wil['kode_wilayah'];
		$sql="
		SELECT * FROM
		( SELECT '1' AS jenis_pihak,a.`nama_pihak1` AS nama, a.`nik_pihak1` AS nik, a.`alamat_pihak1` AS alamat, a.`pekerjaan_pihak1` AS pekerjaan, a.`tempatlahir_pihak1` AS tempat_lahir, a.`tanggallahir_pihak1` AS tanggal_lahir,
		a.`nomor_perkara`,a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids
		FROM perkara_akta_cerai a 
		WHERE a.`nik_pihak1` LIKE '".$kode_wil."%'

		UNION ALL
		SELECT '2' AS jenis_pihak, a.`nama_pihak2` AS nama, a.`nik_pihak2` AS nik, a.`alamat_pihak2` AS alamat, a.`pekerjaan_pihak2` AS pekerjaan, a.`tempatlahir_pihak2` AS tempat_lahir, a.`tanggallahir_pihak2` AS tanggal_lahir,
		a.`nomor_perkara`,  a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids 
		FROM perkara_akta_cerai a 
		WHERE a.`nik_pihak2` LIKE '".$kode_wil."%')
		AS dum
		ORDER BY ids DESC
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function get_capil(){

		//$get_kode_wil=$this->get_data_where(array('mitra_id'=>$mitra_id),'master_mitra_kodewilayah')->row_array();
		//$kode_wil=$get_kode_wil['kode_wilayah'];
		$sql="
		SELECT * FROM
		( SELECT '1' AS jenis_pihak,a.`nama_pihak1` AS nama, a.`nik_pihak1` AS nik, a.`alamat_pihak1` AS alamat, a.`pekerjaan_pihak1` AS pekerjaan, a.`tempatlahir_pihak1` AS tempat_lahir, a.`tanggallahir_pihak1` AS tanggal_lahir,
		a.`nomor_perkara`,a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids, a.status_pihak1 as status_pihak, capil_pihak1 as capil, id
		FROM perkara_akta_cerai a 
		where capil_pihak1 is null

		UNION ALL
		SELECT '2' AS jenis_pihak, a.`nama_pihak2` AS nama, a.`nik_pihak2` AS nik, a.`alamat_pihak2` AS alamat, a.`pekerjaan_pihak2` AS pekerjaan, a.`tempatlahir_pihak2` AS tempat_lahir, a.`tanggallahir_pihak2` AS tanggal_lahir,
		a.`nomor_perkara`,  a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids , a.status_pihak2 as status_pihak, capil_pihak2 as capil,id
		FROM perkara_akta_cerai a 
		where capil_pihak2 is null)
		AS dum
		ORDER BY ids DESC
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	

	function get_capil_ditangani($mitra_id){
		
		$sql="
		SELECT * FROM
		( SELECT '1' AS jenis_pihak,a.`nama_pihak1` AS nama, a.`nik_pihak1` AS nik, a.`alamat_pihak1` AS alamat, a.`pekerjaan_pihak1` AS pekerjaan, a.`tempatlahir_pihak1` AS tempat_lahir, a.`tanggallahir_pihak1` AS tanggal_lahir,
		a.`nomor_perkara`,a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids, a.status_pihak1 as status_pihak, capil_pihak1 as capil,tanggal_permohonan_pihak1 as tanggal_permohonan, tanggal_pengambilan_pihak1 as tanggal_pengambilan, id
		FROM perkara_akta_cerai a 
		where capil_pihak1='".$mitra_id."'

		UNION ALL
		SELECT '2' AS jenis_pihak, a.`nama_pihak2` AS nama, a.`nik_pihak2` AS nik, a.`alamat_pihak2` AS alamat, a.`pekerjaan_pihak2` AS pekerjaan, a.`tempatlahir_pihak2` AS tempat_lahir, a.`tanggallahir_pihak2` AS tanggal_lahir,
		a.`nomor_perkara`,  a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids , a.status_pihak2 as status_pihak, capil_pihak2 as capil,tanggal_permohonan_pihak2 as tanggal_permohonan, tanggal_pengambilan_pihak2 as tanggal_pengambilan, id
		FROM perkara_akta_cerai a 
		where capil_pihak2='".$mitra_id."')
		AS dum
		ORDER BY ids DESC
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function monitoring_ac(){
		
		$sql="
		SELECT c.`nama`, COUNT(b.`id`) AS jum FROM pengadilan_agama c
		LEFT JOIN  perkara_akta_cerai b ON b.`kd_satker`=c.`id`
		GROUP BY c.`nama`
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function monitoring_perkara(){
		
		$sql="
		SELECT c.`nama`, COUNT(b.`id`) AS jum FROM pengadilan_agama c
		LEFT JOIN  perkara_akta_cerai b ON b.`kd_satker`=c.`id`
		GROUP BY c.`nama`
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function detail_monitoring_ac($kd_satker){
		
		$sql="
		SELECT * FROM perkara_akta_cerai b where b.kd_satker=$kd_satker
		";

		$query = $this->db->query($sql); 
		return $query;	
	}
	function monitoring_ac_pa($pa_id){
		
		$sql="
		SELECT COUNT(b.`id`) AS jum FROM perkara_akta_cerai b
		where b.kd_satker=$pa_id
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function monitoring_perkara_pa($pa_id){
		
		$sql="
		SELECT COUNT(b.`id`) AS jum FROM perkara b
		where b.kd_satker=$pa_id
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function get_jenis_perkara($pa_id){
		
		$sql="
		SELECT a.jenis_perkara_text FROM perkara a
		WHERE a.kd_satker=$pa_id
		GROUP BY a.jenis_perkara_text
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function detail_monitoring_perkara($pa_id,$jenis_perkara){
		
		$sql="
		SELECT * FROM perkara b
		where b.kd_satker=$pa_id $jenis_perkara
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function get_feedback_pns($whereconditon){
        $sql="SELECT a.id, a.kd_satker, a.perkara_id, a.nomor_perkara, a.tanggal_pendaftaran, a.jenis_perkara,
             a.jenis_pihak, a.nama, a.nip, a.unit_kerja, a.unit_kerja_lain, a.satuan_kerja, 
             a.izin_cerai, a.status_lapor, a.kirim_email, a.flag, b.nama_satker
             FROM perkara_pendaftaran_pns AS a 
             JOIN master_mitra AS b ON a.unit_kerja=b.mitra_id
             WHERE a.kd_satker = '".$whereconditon."'";
        $query = $this->db->query($sql); 
        return $query;  
    }

	function monitoring_bkd_pa($pa_id){
		
		$sql="
		SELECT COUNT(a.`id`) AS jum FROM perkara_pendaftaran_pns a
		WHERE a.`status_lapor`=1 and a.kd_satker=$pa_id
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function detail_monitoring_bkd_pa($pa_id){
		
		$sql="
		SELECT * FROM perkara_pendaftaran_pns a
		LEFT JOIN  master_mitra b ON a.`unit_kerja`=b.mitra_id
		WHERE a.`status_lapor`=1 and a.kd_satker=$pa_id
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function monitoring_pns_pendaftaran($pa_id){
		
		$sql="
		
		SELECT count(a.id) as jum from perkara_pendaftaran_pns a 
		where a.kd_satker=$pa_id
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function detail_monitoring_pns_pendaftaran($pa_id){
		
		$sql="
		
		SELECT * from perkara_pendaftaran_pns a 
		LEFT JOIN  master_mitra b ON a.`unit_kerja`=b.mitra_id
		where a.kd_satker=$pa_id
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function detail_monitoring_pns_putusan($pa_id){
		
		$sql="
		
		SELECT * from perkara_putusan_pns a 
		LEFT JOIN  master_mitra b ON a.`unit_kerja`=b.mitra_id
		where a.kd_satker=$pa_id
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function monitoring_pns_putusan($pa_id){
		
		$sql="
		
		SELECT count(a.id) as jum from perkara_putusan_pns a 
		where a.kd_satker=$pa_id
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function kirim_data_pa($pa_id){
		
		$sql="
		SELECT c.nama, (SELECT tanggal_kirim FROM log_kirim b WHERE b.kd_satker=c.id ORDER BY tanggal_kirim DESC LIMIT 1 ) AS tgl FROM pengadilan_agama c where c.id=$pa_id

		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function update_data_02_2023($pa_id){
		
		$sql="
		SELECT update_02_2023 FROM pengadilan_agama c where c.id=$pa_id

		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function monitoring_capil_pa($pa_id){
		
		$sql="
		SELECT COUNT(id) AS jum FROM
		( SELECT '1' AS jenis_pihak,a.`nama_pihak1` AS nama, a.`nik_pihak1` AS nik, a.`alamat_pihak1` AS alamat, a.`pekerjaan_pihak1` AS pekerjaan, a.`tempatlahir_pihak1` AS tempat_lahir, a.`tanggallahir_pihak1` AS tanggal_lahir,
		a.`nomor_perkara`,a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids, a.status_pihak1 AS status_pihak, capil_pihak1 AS capil, id
		FROM perkara_akta_cerai a 
		WHERE capil_pihak1 IS NOT NULL AND a.`kd_satker`=$pa_id

		UNION ALL
		SELECT '2' AS jenis_pihak, a.`nama_pihak2` AS nama, a.`nik_pihak2` AS nik, a.`alamat_pihak2` AS alamat, a.`pekerjaan_pihak2` AS pekerjaan, a.`tempatlahir_pihak2` AS tempat_lahir, a.`tanggallahir_pihak2` AS tanggal_lahir,
		a.`nomor_perkara`,  a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids , a.status_pihak2 AS status_pihak, capil_pihak2 AS capil,id
		FROM perkara_akta_cerai a 
		WHERE capil_pihak2 IS NOT NULL AND a.`kd_satker`=$pa_id)
		AS dum
		ORDER BY id DESC
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function detail_monitoring_capil($pa_id){
		
		$sql="
		SELECT '1' AS jenis_pihak,a.`nama_pihak1` AS nama, a.`nik_pihak1` AS nik, a.`alamat_pihak1` AS alamat, a.`pekerjaan_pihak1` AS pekerjaan, a.`tempatlahir_pihak1` AS tempat_lahir, a.`tanggallahir_pihak1` AS tanggal_lahir,
		a.`nomor_perkara`,a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids, a.status_pihak1 AS status_pihak, capil_pihak1 AS capil, id,nama_satker,tanggal_permohonan_pihak1 as tanggal_permohonan_pihak, tanggal_pengambilan_pihak1 as tanggal_pengambilan_pihak
		FROM perkara_akta_cerai a 
		join master_mitra b on a.capil_pihak1=b.mitra_id
		WHERE capil_pihak1 IS NOT NULL AND a.`kd_satker`=$pa_id

		UNION ALL
		SELECT '2' AS jenis_pihak, a.`nama_pihak2` AS nama, a.`nik_pihak2` AS nik, a.`alamat_pihak2` AS alamat, a.`pekerjaan_pihak2` AS pekerjaan, a.`tempatlahir_pihak2` AS tempat_lahir, a.`tanggallahir_pihak2` AS tanggal_lahir,
		a.`nomor_perkara`,  a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids , a.status_pihak2 AS status_pihak, capil_pihak2 AS capil,id,nama_satker,tanggal_permohonan_pihak2 as tanggal_permohonan_pihak, tanggal_pengambilan_pihak2 as tanggal_pengambilan_pihak
		FROM perkara_akta_cerai a 
		join master_mitra b on a.capil_pihak2=b.mitra_id
		WHERE capil_pihak2 IS NOT NULL AND a.`kd_satker`=$pa_id
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function monitoring_bkd(){
		
		$sql="
		SELECT b.`nama_satker`, COUNT(a.`id`) AS jum FROM perkara_pendaftaran_pns a
		LEFT JOIN  master_mitra b ON a.`unit_kerja`=b.mitra_id
		WHERE a.`status_lapor`=1
		GROUP BY nama_satker
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function monitoring_pns(){
		
		$sql="
		SELECT nama_satker, count(id) as jum FROM
		( SELECT a.`id`, nama_satker
		FROM perkara_pendaftaran_pns a 
		LEFT JOIN master_mitra b ON a.`unit_kerja`=b.mitra_id
		

		UNION ALL
		SELECT a.`id`, nama_satker from perkara_putusan_pns a 
		LEFT JOIN master_mitra b ON a.`unit_kerja`=b.mitra_id
		)
		AS dum
		group by nama_satker
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function kirim_data(){
		
		$sql="
		SELECT c.nama, (SELECT tanggal_kirim FROM log_kirim b WHERE b.kd_satker=c.id ORDER BY tanggal_kirim DESC LIMIT 1 ) AS tgl FROM pengadilan_agama c

		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function monitoring_capil(){
		
		$sql="
		SELECT nama_satker, COUNT(jenis_pihak) AS jum FROM
		( SELECT '1' AS jenis_pihak,a.`nama_pihak1` AS nama, a.`nik_pihak1` AS nik, a.`alamat_pihak1` AS alamat, a.`pekerjaan_pihak1` AS pekerjaan, a.`tempatlahir_pihak1` AS tempat_lahir, a.`tanggallahir_pihak1` AS tanggal_lahir,
		a.`nomor_perkara`,a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids, a.status_pihak1 AS status_pihak, capil_pihak1 AS capil, id, b.`nama_satker`
		FROM perkara_akta_cerai a 
		JOIN master_mitra b ON a.capil_pihak1=b.mitra_id
		

		UNION ALL
		SELECT '2' AS jenis_pihak, a.`nama_pihak2` AS nama, a.`nik_pihak2` AS nik, a.`alamat_pihak2` AS alamat, a.`pekerjaan_pihak2` AS pekerjaan, a.`tempatlahir_pihak2` AS tempat_lahir, a.`tanggallahir_pihak2` AS tanggal_lahir,
		a.`nomor_perkara`,  a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids , a.status_pihak2 AS status_pihak, capil_pihak2 AS capil,id, b.`nama_satker`
		FROM perkara_akta_cerai a 
		JOIN master_mitra b ON a.capil_pihak2=b.mitra_id
		)
		AS dum
		GROUP BY nama_satker
		";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function get_capil_pihak($cari){
		
		//$sql="SELECT * from perkara_akta_cerai a where a.nama_pihak1='".$cari."' OR a.nama_pihak2='".$cari."' OR a.nik_pihak1='".$cari."' OR a.nik_pihak2='".$cari."'";

		$sql="SELECT * FROM
		( SELECT '1' AS jenis_pihak,a.`nama_pihak1` AS nama, a.`nik_pihak1` AS nik, a.`alamat_pihak1` AS alamat, a.`pekerjaan_pihak1` AS pekerjaan, a.`tempatlahir_pihak1` AS tempat_lahir, a.`tanggallahir_pihak1` AS tanggal_lahir,
		a.`nomor_perkara`,a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids, a.status_pihak1 as status_pihak, capil_pihak1 as capil,tanggal_permohonan_pihak1 as tanggal_permohonan, tanggal_pengambilan_pihak1 as tanggal_pengambilan, id
		FROM perkara_akta_cerai a 
		where a.nama_pihak1='".$cari."' OR a.nik_pihak1='".$cari."' AND a.capil_pihak1 IS NULL

		UNION ALL
		SELECT '2' AS jenis_pihak, a.`nama_pihak2` AS nama, a.`nik_pihak2` AS nik, a.`alamat_pihak2` AS alamat, a.`pekerjaan_pihak2` AS pekerjaan, a.`tempatlahir_pihak2` AS tempat_lahir, a.`tanggallahir_pihak2` AS tanggal_lahir,
		a.`nomor_perkara`,  a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids , a.status_pihak2 as status_pihak, capil_pihak2 as capil,tanggal_permohonan_pihak2 as tanggal_permohonan, tanggal_pengambilan_pihak2 as tanggal_pengambilan, id
		FROM perkara_akta_cerai a 
		where a.nama_pihak2='".$cari."' OR a.nik_pihak2='".$cari."' AND a.capil_pihak2 IS NULL)
		AS dum
		ORDER BY ids DESC";

		$query = $this->db->query($sql); 
		return $query;	
	}


	function get_feedback_capil($pa_id){
		
		//$sql="SELECT * from perkara_akta_cerai a where a.nama_pihak1='".$cari."' OR a.nama_pihak2='".$cari."' OR a.nik_pihak1='".$cari."' OR a.nik_pihak2='".$cari."'";

		$sql="SELECT * FROM
		( SELECT '1' AS jenis_pihak,a.`nama_pihak1` AS nama, a.`nik_pihak1` AS nik, a.`alamat_pihak1` AS alamat, a.`pekerjaan_pihak1` AS pekerjaan, a.`tempatlahir_pihak1` AS tempat_lahir, a.`tanggallahir_pihak1` AS tanggal_lahir,
		a.`nomor_perkara`,a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids, a.status_pihak1 as status_pihak, capil_pihak1 as capil,tanggal_permohonan_pihak1 as tanggal_permohonan, tanggal_pengambilan_pihak1 as tanggal_pengambilan, id, b.nama_satker
		FROM perkara_akta_cerai a 
		join master_mitra b on a.capil_pihak1=b.mitra_id
		where a.kd_satker='".$pa_id."'

		UNION ALL
		SELECT '2' AS jenis_pihak, a.`nama_pihak2` AS nama, a.`nik_pihak2` AS nik, a.`alamat_pihak2` AS alamat, a.`pekerjaan_pihak2` AS pekerjaan, a.`tempatlahir_pihak2` AS tempat_lahir, a.`tanggallahir_pihak2` AS tanggal_lahir,
		a.`nomor_perkara`,  a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids , a.status_pihak2 as status_pihak, capil_pihak2 as capil,tanggal_permohonan_pihak2 as tanggal_permohonan, tanggal_pengambilan_pihak2 as tanggal_pengambilan, id, b.nama_satker
		FROM perkara_akta_cerai a 
		join master_mitra b on a.capil_pihak2=b.mitra_id
		where a.kd_satker='".$pa_id."')
		AS dum
		ORDER BY ids DESC";

		$query = $this->db->query($sql); 
		return $query;	
	}

	function get_feedback_capil2(){
		
		//$sql="SELECT * from perkara_akta_cerai a where a.nama_pihak1='".$cari."' OR a.nama_pihak2='".$cari."' OR a.nik_pihak1='".$cari."' OR a.nik_pihak2='".$cari."'";

		$sql="SELECT * FROM
		( SELECT '1' AS jenis_pihak,a.`nama_pihak1` AS nama, a.`nik_pihak1` AS nik, a.`alamat_pihak1` AS alamat, a.`pekerjaan_pihak1` AS pekerjaan, a.`tempatlahir_pihak1` AS tempat_lahir, a.`tanggallahir_pihak1` AS tanggal_lahir,
		a.`nomor_perkara`,a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids, a.status_pihak1 as status_pihak, capil_pihak1 as capil,tanggal_permohonan_pihak1 as tanggal_permohonan, tanggal_pengambilan_pihak1 as tanggal_pengambilan, id, b.nama_satker
		FROM perkara_akta_cerai a 
		join master_mitra b on a.capil_pihak1=b.mitra_id
		

		UNION ALL
		SELECT '2' AS jenis_pihak, a.`nama_pihak2` AS nama, a.`nik_pihak2` AS nik, a.`alamat_pihak2` AS alamat, a.`pekerjaan_pihak2` AS pekerjaan, a.`tempatlahir_pihak2` AS tempat_lahir, a.`tanggallahir_pihak2` AS tanggal_lahir,
		a.`nomor_perkara`,  a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids , a.status_pihak2 as status_pihak, capil_pihak2 as capil,tanggal_permohonan_pihak2 as tanggal_permohonan, tanggal_pengambilan_pihak2 as tanggal_pengambilan, id, b.nama_satker
		FROM perkara_akta_cerai a 
		join master_mitra b on a.capil_pihak2=b.mitra_id
		)
		AS dum
		ORDER BY ids DESC";

		$query = $this->db->query($sql); 
		return $query;	
	}


	function get_kua($mitra_id,$pa_id){

		$get_key=$this->get_data_where(array('mitra_id'=>$mitra_id),'master_mitra_kua');
		$where="";
		$no=1;
		if($get_key->num_rows()>0){

				foreach ($get_key->result_array() as $key) {
				$aa= strtolower($key['key']);

				if($aa=='ampel' OR $aa=='batur' OR $aa=='bawang' OR $aa=='bojong' OR $aa=='bulu' OR $aa=='gabus' OR $aa=='gajah' OR $aa=='gondang' OR $aa=='grabag' OR $aa=='jati' OR $aa=='gesi' OR $aa=='kaliori' OR $aa=='karanganyar' OR $aa=='karang anyar' OR $aa=='karang tengah' OR $aa=='karangtengah' OR $aa=='kedu' OR $aa=='kedung' OR $aa=='kedungbanteng' OR $aa=='kedung banteng' OR $aa=='kradenan' OR $aa=='kramat' OR $aa=='mijen' OR $aa=='miri' OR $aa=='ngawen' OR $aa=='pakis' OR $aa=='pati' OR $aa=='purwodadi' OR $aa=='rembang' OR $aa=='salam' OR $aa=='sale' OR $aa=='sambi' OR $aa=='selo' OR  $aa=='sidoharjo' OR  $aa=='sido harjo' OR $aa=='jaken' OR $aa=='sukoharjo' OR $aa=='sumber' OR $aa=='susukan' OR $aa=='taman' OR $aa=='tambak' OR $aa=='tirto' OR $aa=='batang' OR $aa=='batangan'){
					$where=" WHERE a.`kua_tempat_nikah` LIKE '".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%' AND kd_satker=".$pa_id." "; 

				}

				else{
				if($no==1){
					$where=" WHERE 
					a.`kua_tempat_nikah` LIKE '".$aa."%' 
					OR a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%'";
				}else{
					$where1=" OR a.`kua_tempat_nikah` LIKE '".$aa."%' 
					OR a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%'";
				}
				
				$where=$where.$where1; 
				$no++;
				}
			}
			$sql="SELECT a.*, b.nama as nama_pa, a.id as ids
		FROM perkara_akta_cerai a
		join pengadilan_agama b on a.kd_satker=b.id";

		$query=$sql.$where;


		}else{

				$query="SELECT a.*, b.nama as nama_pa, a.id as ids
		FROM perkara_akta_cerai a
		join pengadilan_agama b on a.kd_satker=b.id 
		LIMIT 0";


		}

		$query1 = $this->db->query($query); 
		return $query1;
		
		
		//return $query;	
	}


	function get_rekap_kua($tahun,$mitra_id,$pa_id){

		$get_key=$this->get_data_where(array('mitra_id'=>$mitra_id),'master_mitra_kua');
		$where="";
		$no=1;
		if($get_key->num_rows()>0){

				foreach ($get_key->result_array() as $key) {
				$aa= strtolower($key['key']);

				if($aa=='ampel' OR $aa=='batur' OR $aa=='bawang' OR $aa=='bojong' OR $aa=='bulu' OR $aa=='gabus' OR $aa=='gajah' OR $aa=='gondang' OR $aa=='grabag' OR $aa=='jati' OR $aa=='gesi' OR $aa=='kaliori' OR $aa=='karanganyar' OR $aa=='karang anyar' OR $aa=='karang tengah' OR $aa=='karangtengah' OR $aa=='kedu' OR $aa=='kedung' OR $aa=='kedungbanteng' OR $aa=='kedung banteng' OR $aa=='kradenan' OR $aa=='kramat' OR $aa=='mijen' OR $aa=='miri' OR $aa=='ngawen' OR $aa=='pakis' OR $aa=='pati' OR $aa=='purwodadi' OR $aa=='rembang' OR $aa=='salam' OR $aa=='sale' OR $aa=='sambi' OR $aa=='selo' OR  $aa=='sidoharjo' OR  $aa=='sido harjo' OR $aa=='jaken' OR $aa=='sukoharjo' OR $aa=='sumber' OR $aa=='susukan' OR $aa=='taman' OR $aa=='tambak' OR $aa=='tirto' OR $aa=='batang' OR $aa=='batangan'){
					$where=" WHERE (a.`kua_tempat_nikah` LIKE '".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%' AND kd_satker=".$pa_id." 

					"; 


				}

				else{
				if($no==1){
					$where=" WHERE 
					(a.`kua_tempat_nikah` LIKE '".$aa."%' 
					OR a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%'
					";
				}else{
					$where1=" OR a.`kua_tempat_nikah` LIKE '".$aa."%' 
					OR a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%'
					";
				}
				
				$where=$where.$where1; 
				$no++;
				}
			}
			$sql="SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a";

		$akhir=" AND YEAR(a.`tanggal_akta_cerai`)='".$tahun."'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC";

		$query=$sql.$where.')'.$akhir;


		}else{

				$query="SELECT a.*, b.nama as nama_pa, a.id as ids
		FROM perkara_akta_cerai a
		join pengadilan_agama b on a.kd_satker=b.id 
		LIMIT 0";


		}

		$query1 = $this->db->query($query); 
		return $query1;
			
		//return $query;	
	}

	function get_kua_rekap_detail($tahun,$bulan,$mitra_id,$pa_id){

		$get_key=$this->get_data_where(array('mitra_id'=>$mitra_id),'master_mitra_kua');
		$where="";
		$no=1;
		if($get_key->num_rows()>0){

				foreach ($get_key->result_array() as $key) {
				$aa= strtolower($key['key']);

				if($aa=='ampel' OR $aa=='batur' OR $aa=='bawang' OR $aa=='bojong' OR $aa=='bulu' OR $aa=='gabus' OR $aa=='gajah' OR $aa=='gondang' OR $aa=='grabag' OR $aa=='jati' OR $aa=='gesi' OR $aa=='kaliori' OR $aa=='karanganyar' OR $aa=='karang anyar' OR $aa=='karang tengah' OR $aa=='karangtengah' OR $aa=='kedu' OR $aa=='kedung' OR $aa=='kedungbanteng' OR $aa=='kedung banteng' OR $aa=='kradenan' OR $aa=='kramat' OR $aa=='mijen' OR $aa=='miri' OR $aa=='ngawen' OR $aa=='pakis' OR $aa=='pati' OR $aa=='purwodadi' OR $aa=='rembang' OR $aa=='salam' OR $aa=='sale' OR $aa=='sambi' OR $aa=='selo' OR  $aa=='sidoharjo' OR  $aa=='sido harjo' OR $aa=='jaken' OR $aa=='sukoharjo' OR $aa=='sumber' OR $aa=='susukan' OR $aa=='taman' OR $aa=='tambak' OR $aa=='tirto' OR $aa=='batang' OR $aa=='batangan'){
					$where=" WHERE (a.`kua_tempat_nikah` LIKE '".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%' AND kd_satker=".$pa_id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%' AND kd_satker=".$pa_id." 
					"; 

				}

				else{
				if($no==1){
					$where=" WHERE 
					(a.`kua_tempat_nikah` LIKE '".$aa."%' 
					OR a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%' ";
				}else{
					$where1=" OR a.`kua_tempat_nikah` LIKE '".$aa."%' 
					OR a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%'";
				}
				
				$where=$where.$where1; 
				$no++;
				}
			}

			$akhir=" AND YEAR(a.`tanggal_akta_cerai`)='".$tahun."'
			AND MONTH(a.`tanggal_akta_cerai`)='".$bulan."'";
			$sql="SELECT a.*, b.nama as nama_pa, a.id as ids
		FROM perkara_akta_cerai a
		join pengadilan_agama b on a.kd_satker=b.id";

		$query=$sql.$where.')'.$akhir;


		}else{

				$query="SELECT a.*, b.nama as nama_pa, a.id as ids
		FROM perkara_akta_cerai a
		join pengadilan_agama b on a.kd_satker=b.id 
		LIMIT 0";


		}

		$query1 = $this->db->query($query); 
		return $query1;
		
		
		//return $query;	
	}

	//EDITED BY MAS21
	function get_kua_new($mitra_id,$pa_id,$dari,$sampai){

		$get_key=$this->get_data_where(array('mitra_id'=>$mitra_id),'master_mitra_kua');
		$where="";
		$no=1;
		if($get_key->num_rows()>0){

				foreach ($get_key->result_array() as $key) {
				$aa= strtolower($key['key']);

				if($aa=='ampel' OR $aa=='batur' OR $aa=='bawang' OR $aa=='bojong' OR $aa=='bulu' OR $aa=='gabus' OR $aa=='gajah' OR $aa=='gondang' OR $aa=='grabag' OR $aa=='jati' OR $aa=='gesi' OR $aa=='kaliori' OR $aa=='karanganyar' OR $aa=='karang anyar' OR $aa=='karang tengah' OR $aa=='karangtengah' OR $aa=='kedu' OR $aa=='kedung' OR $aa=='kedungbanteng' OR $aa=='kedung banteng' OR $aa=='kradenan' OR $aa=='kramat' OR $aa=='mijen' OR $aa=='miri' OR $aa=='ngawen' OR $aa=='pakis' OR $aa=='pati' OR $aa=='purwodadi' OR $aa=='rembang' OR $aa=='salam' OR $aa=='sale' OR $aa=='sambi' OR $aa=='selo' OR  $aa=='sidoharjo' OR  $aa=='sido harjo' OR $aa=='jaken' OR $aa=='sukoharjo' OR $aa=='sumber' OR $aa=='susukan' OR $aa=='taman' OR $aa=='tambak' OR $aa=='tirto' OR $aa=='batang' OR $aa=='batangan'){
					$where=" WHERE a.`kua_tempat_nikah` LIKE '".$aa."%' AND kd_satker=".$pa_id." AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' AND kd_satker=".$pa_id." AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%' AND kd_satker=".$pa_id." AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%' AND kd_satker=".$pa_id." AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%' AND kd_satker=".$pa_id." AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%' AND kd_satker=".$pa_id." AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan ".$aa."%' AND kd_satker=".$pa_id." AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%' AND kd_satker=".$pa_id." AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%' AND kd_satker=".$pa_id." AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%' AND kd_satker=".$pa_id." AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."' "; 

				}

				else{
				if($no==1){
					$where=" WHERE 
					a.`kua_tempat_nikah` LIKE '".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan ".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'";
				}else{
					$where1=" OR a.`kua_tempat_nikah` LIKE '".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan ".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%' AND a.tanggal_akta_cerai>='".$dari."' AND a.tanggal_akta_cerai<='".$sampai."'";
				}
				
				$where=$where.$where1; 
				$no++;
				}
			}
		$sql="SELECT a.*, b.nama as nama_pa, a.id as ids, convert_tanggal_indonesia(a.tgl_kutipan_akta_nikah) as tgl_akta_nikah, convert_tanggal_indonesia(a.tgl_nikah) as nikah, convert_tanggal_indonesia(a.tanggal_putusan) as tgl_putus, convert_tanggal_indonesia(a.tanggal_akta_cerai) as tgl_ac
		FROM perkara_akta_cerai a
		join pengadilan_agama b on a.kd_satker=b.id";

		$query=$sql.$where;


		}else{

				$query="SELECT a.*, b.nama as nama_pa, a.id as ids, convert_tanggal_indonesia(a.tgl_kutipan_akta_nikah) as tgl_akta_nikah, convert_tanggal_indonesia(a.tgl_nikah) as nikah, convert_tanggal_indonesia(a.tanggal_putusan) as tgl_putus, convert_tanggal_indonesia(a.tanggal_akta_cerai) as tgl_ac
		FROM perkara_akta_cerai a
		join pengadilan_agama b on a.kd_satker=b.id 
		LIMIT 0";


		}

		$query1 = $this->db->query($query); 
		return $query1->result();
		
		
		//return $query;	
	}

	function get_kuadata_byid($mitra_id,$pa_id,$id){

		$get_key=$this->get_data_where(array('mitra_id'=>$mitra_id),'master_mitra_kua');
		$where="";
		$no=1;
		if($get_key->num_rows()>0){

				foreach ($get_key->result_array() as $key) {
				$aa= strtolower($key['key']);

				if($aa=='ampel' OR $aa=='batur' OR $aa=='bawang' OR $aa=='bojong' OR $aa=='bulu' OR $aa=='gabus' OR $aa=='gajah' OR $aa=='gondang' OR $aa=='grabag' OR $aa=='jati' OR $aa=='gesi' OR $aa=='kaliori' OR $aa=='karanganyar' OR $aa=='karang anyar' OR $aa=='karang tengah' OR $aa=='karangtengah' OR $aa=='kedu' OR $aa=='kedung' OR $aa=='kedungbanteng' OR $aa=='kedung banteng' OR $aa=='kradenan' OR $aa=='kramat' OR $aa=='mijen' OR $aa=='miri' OR $aa=='ngawen' OR $aa=='pakis' OR $aa=='pati' OR $aa=='purwodadi' OR $aa=='rembang' OR $aa=='salam' OR $aa=='sale' OR $aa=='sambi' OR $aa=='selo' OR  $aa=='sidoharjo' OR  $aa=='sido harjo' OR $aa=='jaken' OR $aa=='sukoharjo' OR $aa=='sumber' OR $aa=='susukan' OR $aa=='taman' OR $aa=='tambak' OR $aa=='tirto' OR $aa=='batang' OR $aa=='batangan'){
					$where=" WHERE a.`kua_tempat_nikah` LIKE '".$aa."%' AND kd_satker=".$pa_id." AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' AND kd_satker=".$pa_id." AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%' AND kd_satker=".$pa_id." AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%' AND kd_satker=".$pa_id." AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%' AND kd_satker=".$pa_id." AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%' AND kd_satker=".$pa_id." AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan ".$aa."%' AND kd_satker=".$pa_id." AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%' AND kd_satker=".$pa_id." AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%' AND kd_satker=".$pa_id." AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%' AND kd_satker=".$pa_id." AND a.id=".$id." "; 

				}

				else{
				if($no==1){
					$where=" WHERE 
					a.`kua_tempat_nikah` LIKE '".$aa."%' AND a.id=".$id." 
					OR a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%' AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%' AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%' AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%' AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan ".$aa."%' AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%' AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%' AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%' AND a.id=".$id." ";
				}else{
					$where1=" OR a.`kua_tempat_nikah` LIKE '".$aa."%' AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%' AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%' AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%' AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%' AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan ".$aa."%' AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%' AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%' AND a.id=".$id."
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%' AND a.id=".$id." ";
				}
				
				$where=$where.$where1; 
				$no++;
				}
			}
		$sql="SELECT a.*, b.nama as nama_pa, a.id as ids, convert_tanggal_indonesia(a.tgl_kutipan_akta_nikah) as tgl_akta_nikah, convert_tanggal_indonesia(a.tgl_nikah) as nikah, convert_tanggal_indonesia(a.tanggal_putusan) as tgl_putus, convert_tanggal_indonesia(a.tanggal_akta_cerai) as tgl_ac,convert_tanggal_indonesia(a.tanggallahir_pihak1) as tgl_lahir_pihak1, convert_tanggal_indonesia(a.tanggallahir_pihak2) as tgl_lahir_pihak2, convert_tanggal_indonesia(a.tgl_ikrar_talak) as tgl_ikrartalak,convert_tanggal_indonesia(a.tgl_ikrar_talak) as tgl_ikrartalak,
			convert_tanggal_indonesia(a.tanggal_bht) as tgl_bht
		FROM perkara_akta_cerai a
		join pengadilan_agama b on a.kd_satker=b.id";

		$query=$sql.$where;

		}else{

				$query="SELECT a.*, b.nama as nama_pa, a.id as ids
		FROM perkara_akta_cerai a
		join pengadilan_agama b on a.kd_satker=b.id 
		LIMIT 0";

		}

		$query1 = $this->db->query($query); 
		return $query1->result();
			
	}

	//END EDITED BY MAS21



	// function get_kua($mitra_id,$pa_id){

	// 	$get_key=$this->get_data_where(array('mitra_id'=>$mitra_id),'master_mitra_kua');
	// 	$where="";
	// 	$no=1;
	// 	foreach ($get_key->result_array() as $key) {
	// 		$aa= $key['key'];
	// 		if($no==1){
	// 			$where=" WHERE a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' AND kd_satker=".$pa_id."
	// 			OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%' AND kd_satker=".$pa_id."
	// 			OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%' AND kd_satker=".$pa_id."
	// 			OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%' AND kd_satker=".$pa_id."
	// 			OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%' AND kd_satker=".$pa_id."
	// 			OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan ".$aa."%' AND kd_satker=".$pa_id."
	// 			OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%' AND kd_satker=".$pa_id."
	// 			OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%' AND kd_satker=".$pa_id."
	// 			OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%' AND kd_satker=".$pa_id." "; 
	// 		}else{
	// 			$where1=" OR a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' AND kd_satker=".$pa_id."
	// 			OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%' AND kd_satker=".$pa_id."
	// 			OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%' AND kd_satker=".$pa_id."
	// 			OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%' AND kd_satker=".$pa_id."
	// 			OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%' AND kd_satker=".$pa_id."
	// 			OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan ".$aa."%' AND kd_satker=".$pa_id."
	// 			OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%' AND kd_satker=".$pa_id."
	// 			OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%' AND kd_satker=".$pa_id."
	// 			OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%' AND kd_satker=".$pa_id." ";
	// 		}
			
	// 		//$where=$where.''.$where1; //baru ganti dadi ora guno
	// 		$no++;
	// 	}
	// 	$sql="SELECT a.*, b.nama as nama_pa, a.id as ids
	// 	FROM perkara_akta_cerai a
	// 	join pengadilan_agama b on a.kd_satker=b.id";

	// 	$query=$sql.$where;

	// 	$query1 = $this->db->query($query); 
	// 	return $query1;
	// 	//return $query;	
	// }

	/* function get_kemenag($pa_id,$mitra_id){

		$get_kua=$this->get_data_where(array('mitra_id'=>$mitra_id, 'group_id'=>4),'master_mitra');

		$where="";
		$no=1;
		foreach ($get_kua->result_array() as $row) {
			
			$get_key=$this->get_data_where(array('pengadilan_id'=>$row['pengadilan_id']),'master_mitra_kua');

			foreach ($get_key->result_array() as $key) {
				$aa= $key['key'];
				if($no==1){
					$where=" WHERE a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%' ";
				}else{
					$where1=" OR a.`kua_tempat_nikah` LIKE '%kua ".$aa."%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ".$aa."%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ".$aa."%' ";
				}
				
				$where=$where.''.$where1;
				$no++;
			}

			//$where=$where.''.$where1;

		}


		$sql="SELECT a.*, b.nama as nama_pa, a.id as ids
		FROM perkara_akta_cerai a
		join pengadilan_agama b on a.kd_satker=b.id";

		$query=$sql.$where;

		$query1 = $this->db->query($query); 
		return $query1;
		//return $query;	
	} */

	function get_kemenag($mitra_id){
		try{
		$get_mitra=$this->get_data_where(array('mitra_id'=>$mitra_id),'master_mitra');
		$where="";
		$no=1;
		foreach ($get_mitra->result_array() as $key){
			$aa=$key['wilayah_kerja'];
			if($no==1){
				$where = " WHERE a.`kua_tempat_nikah` LIKE '%".$aa."%' ";
			}

		$sql="SELECT a.*, b.nama as nama_pa, a.id as ids
		FROM perkara_akta_cerai a
		join pengadilan_agama b on a.kd_satker=b.id";

		$query=$sql.$where;

		$query1 = $this->db->query($query); 
		return $query1;
		//return $query;	
		}

		}catch (Exception $e){
			return false;
		}

	}

	function get_kemenag_kua($mitra_id,$pengadilan_id){
		try{
		$get_mitra=$this->get_data_where(array('mitra_id'=>$mitra_id),'master_mitra');
		$where="";
		$no=1;
		foreach ($get_mitra->result_array() as $key){
			$aa=$key['wilayah_kerja'];
			if($no==1){
				$where = " WHERE a.`kua_tempat_nikah` LIKE '%".$aa."%' ";
			}

		$sql="SELECT * FROM master_mitra a
				WHERE a.`pengadilan_id`='504' AND a.`instansi_id`='2' AND a.`group_id`='5'";

		$query=$sql.$where;

		$query1 = $this->db->query($query); 
		return $query1;
		//return $query;	
		}

		}catch (Exception $e){
			return false;
		}

	}

	function updateAll($table, $data, $kolom, $id){
		$this->db->where($kolom,$id);
		$this->db->update($table,$data);
	}

	public function cek_lapor_bkd($kd_satker){
		$sql="
		SELECT * FROM perkara_pendaftaran_pns a 
		WHERE a.`kd_satker`='".$kd_satker."' and (a.flag=0 OR a.flag IS NULL OR a.flag='') and a.status_lapor=1
		";

		$query = $this->db->query($sql); 

		foreach ($query->result_array() as $key) {

			$data['flag']='1';
			$this->updateAll('perkara_pendaftaran_pns',$data,'id',$key['id']); 

		}


		return $query;	

	}

	 public function capil_total()
    {
        try{
            $limit = '';
            if(isset($_POST['length'])){
                if($_POST['length'] != -1)
                    $limit = "LIMIT ".$_POST['start'].",".$_POST['length'];
            };


            $keyword = '';
            if(!empty($_POST['search']['value'])){
               $keyword = "where (nama LIKE '%".$_POST['search']['value']."%' OR nik LIKE '%".$_POST['search']['value']."%' OR alamat LIKE '%".$_POST['search']['value']."%' OR pekerjaan LIKE '%".$_POST['search']['value']."%' OR nomor_akta_cerai LIKE '%".$_POST['search']['value']."%' OR nomor_perkara LIKE '%".$_POST['search']['value']."%')";
            }

                if(isset($_POST['order'])) // here order processing
                {
                    $index = $_POST['order']['0']['column'];
                    $field = $_POST["columns"][$index]["name"];

                    $columnIndex = $_POST['order'][0]['column']; // Column index
                    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
                    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc

                    $order = 'ORDER BY '.$columnName.' '.$_POST['order'][0]['dir'];
                } 
                else
                {
                    $order = 'ORDER BY ids DESC';
                }

                $sql="
                SELECT * FROM
		( SELECT '1' AS jenis_pihak,a.`nama_pihak1` AS nama, a.`nik_pihak1` AS nik, a.`alamat_pihak1` AS alamat, a.`pekerjaan_pihak1` AS pekerjaan, a.`tempatlahir_pihak1` AS tempat_lahir, a.`tanggallahir_pihak1` AS tanggal_lahir,
		a.`nomor_perkara`,a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids, a.status_pihak1 as status_pihak, capil_pihak1 as capil, id
		FROM perkara_akta_cerai a 
		where capil_pihak1 is null 
		UNION ALL
		SELECT '2' AS jenis_pihak, a.`nama_pihak2` AS nama, a.`nik_pihak2` AS nik, a.`alamat_pihak2` AS alamat, a.`pekerjaan_pihak2` AS pekerjaan, a.`tempatlahir_pihak2` AS tempat_lahir, a.`tanggallahir_pihak2` AS tanggal_lahir,
		a.`nomor_perkara`,  a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids , a.status_pihak2 as status_pihak, capil_pihak2 as capil,id
		FROM perkara_akta_cerai a 
		where capil_pihak2 is null  )
		AS dum
		".$keyword."
		".$order." $limit
		 ";

                $query = $this->db->query($sql);
                return $query;
            }
            catch(Exception $e){
            }
        }

        public function capil_countfiltered()
        {
            try{

                $keyword = '';
                if(!empty($_POST['search']['value'])){
                    $keyword = "where (nama LIKE '%".$_POST['search']['value']."%' OR nik LIKE '%".$_POST['search']['value']."%' OR alamat LIKE '%".$_POST['search']['value']."%' OR pekerjaan LIKE '%".$_POST['search']['value']."%' OR nomor_akta_cerai LIKE '%".$_POST['search']['value']."%' OR nomor_perkara LIKE '%".$_POST['search']['value']."%')";
                }

                $sql = "SELECT count(*) as total FROM
		( SELECT '1' AS jenis_pihak,a.`nama_pihak1` AS nama, a.`nik_pihak1` AS nik, a.`alamat_pihak1` AS alamat, a.`pekerjaan_pihak1` AS pekerjaan, a.`tempatlahir_pihak1` AS tempat_lahir, a.`tanggallahir_pihak1` AS tanggal_lahir,
		a.`nomor_perkara`,a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids, a.status_pihak1 as status_pihak, capil_pihak1 as capil, id
		FROM perkara_akta_cerai a 
		where capil_pihak1 is null 

		UNION ALL
		SELECT '2' AS jenis_pihak, a.`nama_pihak2` AS nama, a.`nik_pihak2` AS nik, a.`alamat_pihak2` AS alamat, a.`pekerjaan_pihak2` AS pekerjaan, a.`tempatlahir_pihak2` AS tempat_lahir, a.`tanggallahir_pihak2` AS tanggal_lahir,
		a.`nomor_perkara`,  a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids , a.status_pihak2 as status_pihak, capil_pihak2 as capil,id
		FROM perkara_akta_cerai a 
		where capil_pihak2 is null)
		AS dum ".$keyword." ";
                $query = $this->db->query($sql);
                return $query->row_array();
            }
            catch(Exception $e){
            }
        }



        public function capil_countall()
        {
            try{
                $sql = "SELECT count(*) as total FROM
		( SELECT '1' AS jenis_pihak,a.`nama_pihak1` AS nama, a.`nik_pihak1` AS nik, a.`alamat_pihak1` AS alamat, a.`pekerjaan_pihak1` AS pekerjaan, a.`tempatlahir_pihak1` AS tempat_lahir, a.`tanggallahir_pihak1` AS tanggal_lahir,
		a.`nomor_perkara`,a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids, a.status_pihak1 as status_pihak, capil_pihak1 as capil, id
		FROM perkara_akta_cerai a 
		where capil_pihak1 is null

		UNION ALL
		SELECT '2' AS jenis_pihak, a.`nama_pihak2` AS nama, a.`nik_pihak2` AS nik, a.`alamat_pihak2` AS alamat, a.`pekerjaan_pihak2` AS pekerjaan, a.`tempatlahir_pihak2` AS tempat_lahir, a.`tanggallahir_pihak2` AS tanggal_lahir,
		a.`nomor_perkara`,  a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids , a.status_pihak2 as status_pihak, capil_pihak2 as capil,id
		FROM perkara_akta_cerai a 
		where capil_pihak2 is null )
		AS dum";
                $query = $this->db->query($sql);
                return $query->row_array();
            }
            catch(Exception $e){
            }
        }


}
