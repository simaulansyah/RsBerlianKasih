<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function getrole()
    {
        $query = $this->db->query('SELECT * FROM user_role');
        $result = $query->result_array();
        return $result;
    }

    public function getuserlogin($user)
    {
        $hasil = $this->db->where('nama_user', $user)->limit(1)->get('user');
        if ($hasil->num_rows() > 0) {
            return $hasil->row();
        } else {
            return array();
        }

    }

    public function setUser($data, $roleid)
    {


		// $this->db->select('role');
		// $this->db->from('user_role');
		// $this->db->where("role_id", $roleid);
		// $role=$this->db->get();

		$sql = "SELECT `role` FROM `user_role` WHERE `role_id` = ?" ;
		$query = $this->db->query($sql, array($roleid))->result();
		$conv = json_decode(json_encode($query), true);
		$role = $conv[0]["role"];
		$this->db->insert('user', $data);
		
        //send email
        $this->_sendEmail('verify', 'Email verification', $role);
		//message('Congratulations! your account has been created. Please activate your account before 24 hours!', 'success', 'auth');
    }

    private function _sendEmail($type, $subject, $role)
	{
		// prepare the token
		$token = base64_encode(random_bytes(32));
		$email = $this->input->post('email');
		$user_token = [
			'token' => $token,
			'email' => $email,
			'date_created' => time()
		];
		$this->db->insert('user_token', $user_token);
		// -------------

		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'simaulansyah@gmail.com',
			'smtp_pass' =>  "205476P@ssw0rd2019",
			'smtp_port' =>  465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];
		$this->email->initialize($config);

		$this->email->from('simaulansyah@gmail.com', 'Berlian Kasih Email');
		$this->email->to($email);
		
		$this->email->subject($subject);
		$this->email->message($this->_templateEmail($user_token, $type, $role));

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
    }
    
    	// untuk template email 
	private function _templateEmail($user_token, $type, $role)
	{
		if ($type == 'verify'){
			return '
				<!DOCTYPE html>
				<html lang="en">
				<head>
					<meta charset="UTF-8">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<meta http-equiv="X-UA-Compatible" content="ie=edge">
					<title></title>
				</head>
				<body>
				Selamat Anda Berhasil Mendaftar akun di SIM RS Berlian Kasih <br>
                Anda Mendaftar Sebagai  =  '.$role.' <br>
					Untuk Aktivasi Akun Klik Link Berikut : <a href="' . base_url() . 'auth/verify?email=' . $user_token['email'] . '&token=' . urlencode($user_token['token']) . '">Activate</a>
				</body>
				</html>
			';
		}elseif ($type == 'reset_password'){
			return '
				<!DOCTYPE html>
				<html lang="en">
				<head>
					<meta charset="UTF-8">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<meta http-equiv="X-UA-Compatible" content="ie=edge">
					<title></title>
				</head>
				<body>
					Click this link to reset your password : <a href="' . base_url() . 'auth/resetPassword?email=' . $user_token['email'] . '&token=' . urlencode($user_token['token']) . '">Reset password</a>
				</body>
				</html>
			';
		}
	}


	// untuk verifikasi
	public function run_verify()
	{
		$token = $this->input->get('token');
		$email = $this->input->get('email');

		$user_token = $this->db->get_where('user_token', ['email' => $email])->row_array();
		

		// cek apakah email yg dikirim ada di database
		if ($user_token) {

			// cek user token 
			if ($user_token['token'] == $token){
				
				// jika belum di verifikasi melebihi batas waktu 24 jam 
				if (time() - $user_token['date_created'] > (60*60*24)){
					
					// hapus user dan user token 
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);
					
					//message('Account activation failed! token is expired!', 'danger', 'auth');
					return "expired";
					// jika masih sempat verifikasi / berhasil
				}else{

					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');
					
					$this->db->delete('user_token', ['email' => $email]);
					return 0;
					//message( $email . ' has been activated! please login.', 'success', 'auth');
				}
			}else{
				return "invalid token";
				//message('Account activation failed! token is invalid!', 'danger', 'auth');
			}
		} else {
			return "invalid email";
			//message('Account activation failed! email is invalid!', 'danger', 'auth');
		}
	}

}