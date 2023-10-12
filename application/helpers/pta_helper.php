<?php

function infoLogin(){
    $ci = get_instance();
	
	$infolog['userid']  		= base64_decode($ci->session->userdata('id_user'));
	$infolog['fullname']  		= base64_decode($ci->session->userdata('fullname'));
	$infolog['email']  			= base64_decode($ci->session->userdata('email'));
	$infolog['username'] 		= base64_decode($ci->session->userdata('username'));
	$infolog['group_id']  			= base64_decode($ci->session->userdata('group_id'));
	$infolog['instansi_id']  	= base64_decode($ci->session->userdata('instansi_id'));	
	$infolog['pengadilan_id']  			= base64_decode($ci->session->userdata('pengadilan_id'));	
	$infolog['mitra_id']  		= base64_decode($ci->session->userdata('mitra_id'));

   return $infolog;
}


function _sendwa($no_hp,$pesan){

$data = array("nohp" => $nohp, "pesan"=>$pesan);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://sindoro.pta-semarang.go.id/rimsan/?acckey=Y0urk3y4cc3525y573M',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $data,
));

$response = curl_exec($curl);

curl_close($curl);


  if($response['status'] == "kirim berhasil"){
   $status=1;
 }else{
   $status=0;
 }
 $tgl=date('Y-m-d H:i:s');

 $this->db->query("INSERT INTO log_wa(no, pesan,status, tgl) VALUES ('$no_hp','$pesan','$status', '$tgl')");

return $response;
}

//----ubed email
 function _sendEmail($token, $type)
    {
			$ci = get_instance();
	$ci->load->library('Mailer');
    
		if ($type == 'forgot') {
			$isi='Click this link to reset your password : <a href="' . base_url() . 'login/resetpassword?email=' . $ci->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>';
			$sendmail = array(
			  'email_penerima'=>$ci->input->post('email'),
			  'subjek'=>'Reset Password',
			  'content'=>$isi
			  //'attachment'=>$attachment
			);
			
			
		}
		 else if ($type == 'sendinfo') {
			 
			 
			$users= $ci->db->query("SELECT userid,users.pengadilan_id,password,fullname,handphone,username,users.group_id,users.email, master_group.nama_group, master_mitra.nama_satker, pengadilan_agama.nama  FROM   `users` 
					 LEFT JOIN `master_group` ON `users`.`group_id` = `master_group`.`group_id`
					left join master_mitra on users.mitra_id=master_mitra.mitra_id										
					LEFT JOIN `pengadilan_agama`ON `users`.`pengadilan_id` = `pengadilan_agama`.`id`
					where users.userid='$token'")->row_array();
			$users2['users']=$users;
			//$cekemail=$users['email'];
			  $sendmail = array(
			  'email_penerima'=>$users['email'],
			  'subjek'=>'login Information',
			  'content'=>$ci->load->view('email/infoakun',$users2,true)
			  //'attachment'=>$attachment
			);
			//  $send = $ci->mailer->send($sendmail);
			//  var_dump($sendmail);
			
			
           // $ci->email->message($mesg);
				}
 $send = $ci->mailer->send($sendmail);
    
    }
//----ubed email

//set menu aktif ubed
function _setsesiMenu($menu)
    {
	$ci = get_instance();
	$ci->session->set_userdata($menu);
	$ok=$ci->session->userdata('menu');
	return;
	}
function _unsetsesiMenu()
    {
	$ci = get_instance();
	$ci->session->unset_userdata('menu');
	$ci->session->unset_userdata('submenu');
	return;
	}
//set menu aktif ubed	

//set input double	ubed

function uniq($table,$field,$input,$cek,$filter){
    $ci = get_instance();
	//var_dump($filter);
	if($input == $cek ) {
		 $is_unique =  '';
		} else {
		   
		     $is_unique =  '|is_unique['.$table.'.'.$field.']';
		}
		$unikaja=$ci->form_validation->set_rules(''.$field.'', ' ', ''.$filter.''.$is_unique, ['is_unique' => ' sudah terdaftar.' ]);
		
   return $unikaja;
}
//set input double	ubed

function cmb_dinamis($name, $table,$where, $field, $pk, $selected,  $filter) {
    $ci = get_instance();

		$cmb = "<select name='$name' id='$name' class='basic form-control'  >";
		$cmb .="<option value=''>- pilih -</option>"; //jika tidak menggunakan select2 $type dikosongi
		//$data = $ci->db->get_where($table,array($pk=>1))->result();
		 $data = $ci->db->query("SELECT * FROM $table WHERE $pk IN ($where)  $filter;")->result();
		foreach ($data as $d) {
        $cmb .="<option value='" . $d->$pk . "'";
        $cmb .= $selected == $d->$pk ? " selected='selected'" : '';
        $cmb .=">" . strtoupper($d->$field) . "</option>";
    }
    $cmb .="</select>";

	
    return $cmb;
}

function select2_dinamis($name,$table,$field,$pk,$selected,$button){
    $ci = get_instance();
	//$selected2= explode(',', $selected);
		$select2 = "<select name='$name' id='$name' class='basic form-control' multiple>";
	   // $select2 = "<select name='$name' id='".$type."' class='js-states form-control' multiple >";
		//$select2 .="<option value=''>- pilih -</option>";
    $data = $ci->db->get($table)->result();
	
    foreach ($data as $row){
       $select2 .="<option value='" . $row->$pk . "'";
	   if ($button == 'Update'){ 
	   foreach ($selected as $ray){
		   
        $select2 .= $ray == $row->$pk ? " selected='selected'" : '';
	   }
	   }
	   else {
		   if (!empty($selected)){
			   
			   $select2 .= $selected == $row->$pk ? " selected='selected'" : '';
			   
		   }else {
		   }
	   }
        $select2 .=">" . strtoupper($row->$field) . "</option>";
    }
    $select2 .='</select>';
    return $select2;

}



function valGroup($group_id, $instansi_id,$pengadilan_id,$mitra_id) {
if($group_id==1 && $instansi_id==1){
			
			$valG['sendgroup_id'] ='select group_id from master_group';
			$valG['sendmitra'] ='select mitra_id from master_mitra';
			$valG['sendinstansi']='select instansi_id from master_kategori_instansi';
			$valG['sendpengadilan'] ='select id from pengadilan_agama';
			
		}
		elseif($group_id==2 && $instansi_id==1){
			
			$valG['sendgroup_id']='select group_id from master_group where group_id >='.$group_id.'';
			$valG['sendmitra']='select mitra_id from master_mitra';
			$valG['sendinstansi']='select instansi_id from master_kategori_instansi';
			$valG['sendpengadilan']='select id from pengadilan_agama';
			
		}
		elseif($group_id==3){
			$valG['sendgroup_id']='select group_id from master_group where group_id >='.$group_id.'';
			$valG['sendmitra']='select mitra_id from master_mitra where pengadilan_id='.$pengadilan_id.' ';
			$valG['sendinstansi']=$instansi_id;
			//$valG['sendpengadilan']='select id from pengadilan_agama where id='.$pengadilan_id.'';
			$valG['sendpengadilan'] ='select id from pengadilan_agama';
		}
		elseif($group_id==4  && $instansi_id==1 ){
			$valG['sendinstansi']='select instansi_id from master_kategori_instansi';
			$valG['sendgroup_id']='select group_id from master_group where group_id >='.$group_id.'';
			$valG['sendmitra']='select mitra_id from master_mitra where pengadilan_id='.$pengadilan_id.'  and group_id >='.$group_id.'';
			$valG['sendpengadilan']='select id from pengadilan_agama where id='.$pengadilan_id.'';
		}
		else{
			$valG['sendgroup_id']='select group_id from master_group where group_id >='.$group_id.'';
			$valG['sendinstansi']=$instansi_id;
			//$valG['sendmitra']='select mitra_id from master_mitra where pengadilan_id='.$pengadilan_id.' and instansi_id='.$instansi_id.' and group_id >='.$group_id.'';
			$valG['sendmitra']='select mitra_id from master_mitra where mitra_id='.$mitra_id.'';
			$valG['sendpengadilan']='select id from pengadilan_agama where id='.$pengadilan_id.'';
		}
		return $valG;
}

function valMenu()
{
    $ci = get_instance();
	$group_id		= base64_decode($ci->session->userdata('group_id'));
	$instansi_id 	= base64_decode($ci->session->userdata('instansi_id'));	
	  if (!$ci->session->userdata('is_loggin')) {
		toast('error','&nbsp; maaf anda belum login !');
        redirect('login');
    } else {
		$menu = $ci->uri->segment(1);
		$ci->db->select('*');
        $ci->db->from('menu_pta');
        $ci->db->where('is_active', 1);
        $ci->db->where('view', 1);
        $ci->db->where('url',$menu);
       if($group_id !=1){
		   
		  $ci->db->where("FIND_IN_SET(".$instansi_id.", instansi_id)");
		  $ci->db->where("FIND_IN_SET(".$group_id.", group_id)");
		//  $ci->db->like ('instansi_id',"'".$instansi_id."'");
		//  $ci->db->like ('group_id',"'".$group_id."'");
		 }
		  $userAccess = $ci->db->get()->result();

	if (empty($userAccess) ) {
		toast('error','&nbsp; maaf, hak akses dibatasi !');
        redirect('dashboard');
        }
//var_dump($userAccess);

    }
}
function view_arr($table,$field,$pk,$selected){
    $ci = get_instance();

	//$selected2= explode(',', $selected);
	$arr="";
	$data = $ci->db->query("SELECT $field FROM $table WHERE FIND_IN_SET($pk,'$selected') ")->result_array();

			  foreach ($data as $e) :
	$arr .=$e[$field]."<br> " ;
	 endforeach;
			   

   return $arr;
}

function toast($a,$b){
	$ci = get_instance();
	$array_toast = array('a'=>$a,'b'=>$b);
	$ci->session->set_flashdata('toastmsg',$array_toast);
	
}

function GenerateCode() {
    $possible = '123456789';
    $operator = '+x-';
    //$admin    = ['U', 'N', 'C'];
    $a        = substr($possible, mt_rand(0, strlen($possible) - 1), 1);
    $b        = substr($possible, mt_rand(0, strlen($possible) - 1), 1);
    $opr      = substr($operator, mt_rand(0, strlen($operator) - 1), 1);
    if ($opr == '+') {
        $res = $a + $b;
    } else if ($opr == 'x') {
        $res = $a * $b;
    } else {
        $res = $a - $b;
    }
   // $code['adm']  = $admin[mt_rand(0, strlen($operator) - 1)];
    $code['res']  = base64_encode($res);
    $code['text'] = $a . ' ' . $opr . ' ' . $b . ' =';
    return $code;
}

//log 24-02-2023 ubed
function insertLog($catLog,$userID,$contenLog){
    $ci = get_instance();
	$dateLog= time();

	$SQL="INSERT INTO data_log (dateLog,catLog,userID,contentLog) values ('$dateLog','$catLog','$userID','$contenLog')";
           $y=$ci->db->query($SQL);

	//$ci->session->set_userdata($menu);
	//$ok=$ci->session->userdata('menu');
	return;
}
