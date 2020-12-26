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

    public function setUser($data, $role)
    {
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
                Anda Mendaftar Sebagai ='.$role.' <br>
					Click this link to activate your account : <a href="' . base_url() . 'auth/verify?email=' . $user_token['email'] . '&token=' . urlencode($user_token['token']) . '">Activate</a>
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

}