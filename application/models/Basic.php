<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Basic extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	function connecting_test($servername,$username,$password,$dbname){
		try{
			$conn = new mysqli($servername, $username, $password);
				// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			return "Koneksi Berhasil";
		}
		catch (Exception $e){
			return false;
			log_message('error', $e);
		}
	}
	public function processLogin($userName=NULL,$password){
		$whereCondition = $array = array('username' =>$userName,'password'=>$password);
		$this->db->where($whereCondition);
		$this->db->from('users');
		$query = $this->db->get();
		return $query;
	}

	public function squrity(){
		$is_login = $this->session->userdata('is_loggin');
		if(!$is_login){
				// $this->session->sess_destroy();
			$this->session->set_flashdata('msg', '3');
			redirect('login');
		}
	}
	public function hanya_admin(){
		$is_login = $this->session->userdata('is_loggin');
		if(!$is_login){
				// $this->session->sess_destroy();
			$this->session->set_flashdata('msg', '3');
			redirect('login');
		}
		if(base64_decode($this->session->userdata('group'))>1){
			redirect('dashboard');
		}
	}

	function get_data($table){
		try{
			$query = $this->db->get($table); 
			return $query;
		}catch (Exception $e){
			return false;
				//log_message('error', $e);
		}		
	}

	function get_data_pa($tgl,$dari,$sampai){
		$sql="
		SELECT *, a.id as ids, CASE 
		WHEN b.bebanperkara >2500 THEN '1'
		WHEN b.bebanperkara >1000 AND b.bebanperkara <=2500 THEN '2'
		ELSE '3'
		END AS kategori FROM pengadilan_agama a 
		JOIN kinerja_pa b ON b.`pengadilan_agama_id`=a.`id`
		WHERE DATE(tanggal_penilaian) = '".$tgl."' and (b.bebanperkara >='".$dari."' and b.bebanperkara <'".$sampai."') 
		and b.keterangan='sukses' ORDER BY kategori ASC,b.`total_nilai` DESC
		";
		$query = $this->db->query($sql); 
		return $query;	
	}	

	function get_data_pa_gagal($tgl){
		$sql="
		SELECT *, a.id as ids, CASE 
		WHEN b.bebanperkara >2500 THEN '1'
		WHEN b.bebanperkara >1000 AND b.bebanperkara <=2500 THEN '2'
		ELSE '3'
		END AS kategori FROM pengadilan_agama a 
		JOIN kinerja_pa b ON b.`pengadilan_agama_id`=a.`id`
		WHERE DATE(tanggal_penilaian) = '".$tgl."' and b.bebanperkara ='0' ORDER BY kategori ASC,b.`total_nilai` DESC
		";
		$query = $this->db->query($sql); 
		return $query;	
	}	    

	function get_data_last(){
		$sql="SELECT DATE(a.`tanggal_penilaian`) AS tanggal_penilaian FROM kinerja_pa a
		ORDER BY a.`tanggal_penilaian` DESC LIMIT 1
		";
		$query = $this->db->query($sql); 
		return $query;	
	}	    

	function get_data_where($whereconditon,$table){
		$this->db->where($whereconditon);
		$query = $this->db->get($table); 
		return $query;
	}
	
	function get_data_where2($whereconditon){
		$sql="SELECT *, a.pengadilan_id as pa_id
				FROM users as a
				LEFT JOIN master_mitra as b on a.mitra_id=b.mitra_id
				WHERE a.username='".$whereconditon."'";
		$query = $this->db->query($sql); 
		return $query;	
	}	   
	
	public function insert_data($tableName,$data){
		$res=$this->db->insert($tableName,$data);
		return $res;
	}
	public function update_data($whereconditon,$tableName,$data){
		$this->db->where($whereconditon);
		$res=$this->db->update($tableName, $data);
		return $res;
	}
	public function delete_data($whereconditon,$tableName){
		$this->db->where($whereconditon);
		$res=$this->db->delete($tableName);
		return $res;
	}
	public function get_config(){
		$q=$this->db->query("SELECT * FROM tbl_config where hidden = '0'");
		$data=array();
		foreach ($q->result_array() as $d){
			$kd = $d['kd'];
			$data[$kd] = $d['value'];
		}
		return $data;
	}
	public function max_id($table,$kolom){
		$this->db->select_max($kolom);
		$query = $this->db->get($table);
		if ($query->num_rows() > 0){
			return $query->row();
		}else{
			return 0;
		}		
	}

	function template_model(){
		try{
			$sql = "    ";
			$query=$this->db->query($sql);
			return $query;
		}catch (Exception $e){
			return false;
			log_message('error', $e);
		}
	}


	function updateAll($table, $data, $kolom, $id){
		$this->db->where($kolom,$id);
		$this->db->update($table,$data);
	}

	function get_hakim_pta($id=NULL) {
		try {
			if ($id!=null) {
				$query = $this->db->query(
					"select * from hakim_pta a
					WHERE a.id = $id");
			}else{
				$query = $this->db->query(
					"select a.id as id, a.nama_gelar as nama, a.nama_gelar as namas from hakim_pta a where aktif='Y'");
			}
			return $query;
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function get_pp_pta($id=NULL) {
		try {
			if ($id!=null) {
				$query = $this->db->query(
					"select * from panitera_pt a
					WHERE a.id = $id");
			}else{
				$query = $this->db->query(
					"select a.id as id, a.nama_gelar as nama, a.nama_gelar as namas from panitera_pt a where aktif='Y'");
			}
			return $query;
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function hak_akses_hakim(){
		$sql="
		SELECT 
		hakim_pta.id
		,hakim_pta.nama_gelar

		,GROUP_CONCAT(REPLACE(pengadilan_agama.nama,'PENGADILAN AGAMA ','PA. ') ORDER BY  pengadilan_agama.nama ASC SEPARATOR '<br>') AS nama_pa
		FROM hakim_pta
		left join pembagian_satker on pembagian_satker.hakim_pta_id= hakim_pta.id
		left join pengadilan_agama on pengadilan_agama.id=pembagian_satker.pengadilan_id
		WHERE 
		hakim_pta.aktif='Y'
		GROUP BY hakim_pta.id
		ORDER BY hakim_pta.nama_gelar ASC
		";
				//echo $sql;exit;
		$query = $this->db->query($sql); 
		return $query;		
	}	    
	function get_data_pa_akses_hakim($id){
		$sql="
		SELECT pembagian_satker.id AS pembagian_id
		, pengadilan_agama.nama
		, pengadilan_agama.id

		from pembagian_satker 
		left join pengadilan_agama on pengadilan_agama.id = pembagian_satker.pengadilan_id

		WHERE 
		pembagian_satker.hakim_pta_id=$id
		";
				//echo $sql;exit;
		$query = $this->db->query($sql); 
		return $query->result();	
	}	    

	function list_users($id=NULL) {
		try {
			if ($id!=null) {
				$query = $this->db->query(
					"select * from users a
					WHERE a.id = $id");
			}else{
				$query = $this->db->query(
					"select * from users a join ref_levelgroups b on a.group=b.id_groups");
			}
			return $query;
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}
}
