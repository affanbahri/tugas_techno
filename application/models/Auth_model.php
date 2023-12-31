<?php

class Auth_model extends CI_Model
{
	private $_table = "tb_user";
	const SESSION_KEY = 'id_user';

	public function rules()
	{
		return [
			[
				'field' => 'username',
				'label' => 'Username or Email',
				'rules' => 'required'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|max_length[255]'
			]
		];
	}

	public function login($username, $password)
	{
		$this->db->where('username', $username)->or_where('fullname', $username);
		$query = $this->db->get('tb_user');
		$user = $query->row();

		// cek apakah user sudah terdaftar?
		if (!$user) {
			return FALSE;
		}

		// cek apakah passwordnya benar?
		if (!password_verify($password, $user->password)) {
			return FALSE;
		}
        if($user->is_active=='Tidak Aktif'){
            return FALSE;
        }

		// bikin session
		$this->session->set_userdata([self::SESSION_KEY => $user->id_user]);
		// $this->_update_last_login($user->id);

		return $this->session->has_userdata(self::SESSION_KEY);
	}

	public function current_user()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}

		$user_id = $this->session->userdata(self::SESSION_KEY);
		$query = $this->db->get_where($this->_table, ['id_user' => $user_id]);
		return $query->row();
	}

	public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}

	private function _update_last_login($id)
	{
		$data = [
			'last_login' => date("Y-m-d H:i:s"),
		];

		return $this->db->update($this->_table, $data, ['id' => $id]);
	}
    public function registerUser($data) {
        $this->db->insert('tb_user', $data);
        return $this->db->insert_id();
    }
    public function fullname(){
        $user_id = $this->session->userdata('id_user');
        $query = $this->db->select('fullname as nama')->where('id_user', $user_id)->get('tb_user');
        return $query->row_array();
    }
}