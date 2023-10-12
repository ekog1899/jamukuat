<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
		$this->load->model('basic');
		
    }

    public function index(){    
		 $infolog= infoLogin();
	
		$user_id= $infolog['userid'];
		if (empty($user_id)) {
           
			$data['title'] = 'Login Page';
	//	toast('warning','&nbsp; Silahkan Login untuk masuk sistem !');
        $this->load->view('auth/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('auth/auth_footer');
			
			
		 // $this->load->view('frontend/auth/layout_login');
		 }
		 else{

			toast('success','&nbsp; Anda Sudah Login !');
			 
		  redirect('dashboard');
		 }
        
		
    }

	public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        //$this->form_validation->set_rules('captcha', 'captcha', 'trim|required');
		
		
		
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
			$this->load->view('auth/auth_header');
			$this->load->view('auth/forgot-password');
			$this->load->view('auth/auth_footer');
			  toast('warning','&nbsp; silahkan isi semua kolom! ');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('users', ['email' => $email, 'block' => 0])->row_array();
			 $cpt    = $this->input->post("captcha", TRUE);
			$rescpt = $this->input->post("rescpt", TRUE);
			if ($cpt != base64_decode($rescpt)) {
				
			   toast('error','&nbsp; Kode keamanan beda !');
				redirect(site_url('login/forgotPassword'));
			}

            if ($user) {
                $token = base64_encode(openssl_random_pseudo_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'created' => time()
                ];

                $this->db->insert('sys_token', $user_token);
             
				_sendEmail($token,'forgot');
               
				// toast('success','&nbsp; Silahkan cek email anda di inbox / di spam !');
				 $this->load->view('auth/auth_header');
				 $this->load->view('auth/forgot-password');
				 $this->load->view('auth/auth_footer');
            } else {
               // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
                 toast('warning','&nbsp; email diblokir /  tidak terdaftar! ');
				 $this->load->view('auth/auth_header');
				 $this->load->view('auth/forgot-password');
				 $this->load->view('auth/auth_footer');
            }
        }
    }




	public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
			toast('error','&nbsp; token expired/ Invalid !');
            redirect('login');
        }

        $this->form_validation->set_rules('password1', ' ', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', ' ', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
			
            $data['title'] = 'Change Password';
			$data['valid']='is-invalid';
			toast('error','&nbsp; Password tidak boleh kosong & password harus sama ');
            $this->load->view('auth/auth_header');
			$this->load->view('auth/changepass',$data);
			$this->load->view('auth/auth_footer');
          
        } else {
            $password = base64_encode($this->input->post('password1'));
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('users');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('sys_token', ['email' => $email]);

           // $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
            toast('success','&nbsp; Password telah diubah ! ');
			redirect('login');
        }
    }





	public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('sys_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
               
				toast('error','&nbsp; Reset Password Gagal ! Tokek salah ! ');
                redirect('login');
            }
        } else {
           
		   toast('error','&nbsp; email tidak terdaftar! ');
            redirect('login');
        }
    }


	public function signin(){
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			$cpt    = $this->input->post("captcha", TRUE);
      		  $rescpt = $this->input->post("rescpt", TRUE);
		
		
       		 if ($cpt != base64_decode($rescpt)) {
			
           toast('error','&nbsp; coba hitung lagi ya (^_^)');
            redirect(site_url('login'));
        }

			if ($this->form_validation->run() == FALSE) {
				
				toast('warning','&nbsp; silahkan isi username dan password !');
					redirect('login');

			}
			else{
			$username= trim($this->input->post('username'));
			$password= trim($this->input->post('password'));
			//$usernmaein=$username;
			
			//$q = $this->basic->get_data_where2($where); //$this->basic->get_data_where($where,'users');
  			$q = $this->db->get_where('users', ['username' => $username]);
			
				$h = $q->row_array();
				if(empty($h)){
					toast('warning','&nbsp; username tidak terdaftar !');
					redirect('login');			
				}
				else{
					$kata_sandi =  base64_decode($h['password']);
					if($kata_sandi==$password && $password<>''){
						$query = $q->result();
						if ($query[0]->block ==1 ){
							toast('warning','&nbsp; akun diblokir !');
							redirect('login');

						}
						else{
						$user = array(
						'id_user' => base64_encode($query[0]->userid),
						'fullname' => base64_encode($query[0]->fullname),
						'username' => base64_encode($query[0]->username),
					//	'nip' => $query[0]->nip,
						'email' => base64_encode($query[0]->email),
						'group_id' => base64_encode($query[0]->group_id),
						'mitra_id' => base64_encode($query[0]->mitra_id),
						'pengadilan_id' => base64_encode($query[0]->pengadilan_id),
						'instansi_id' => base64_encode($query[0]->instansi_id),
						// 'session_id'	=> md5(uniqid($sessid, TRUE)),
						// 'ip_address'	=> $this->input->ip_address(),
						// 'user_agent'	=> substr($this->input->user_agent(), 0, 120),
						'last_activity'	=> time(),
						'is_loggin' => true
						);
					}
						$currentdate= date('Y-m-d H:i:s');	
						$this->session->set_userdata($user);
						
						$this->db->set('last_login', $currentdate);
						$this->db->where('userid', $query[0]->userid);
						$this->db->update('users');
						
						$datastring='login pada tanggal '.$currentdate;
						insertLog('login',$query[0]->userid,$datastring);
						
						if($kd_satker == '0'){
							toast('success','&nbsp; login berhasil');
							redirect('dashboard');
						}
						else{
							toast('success','&nbsp; login berhasil');
							redirect('dashboard');
						}
					}
					else{
						toast('error','&nbsp; password tidak sesuai !');
						redirect('login');
					}
				}	
			}
		}

	public function logout(){
	$this->session->sess_destroy();
	toast('success','&nbsp; Logout berhasil');
		redirect('login');
		
		
	}

	
  
	
	
}