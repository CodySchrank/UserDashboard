<?


Class Dashboard extends CI_Model {

	public function create_user($data) {
		$query = "SELECT id FROM users";
		$result = $this->db->query($query)->num_rows();
		if($result == 0) {
			$query = "INSERT INTO users (email, first_name, last_name, password, permission, created_at) VALUES (?,?,?,?,9,NOW())";
			$values = array("{$data['email']}", "{$data['first_name']}", "{$data['last_name']}", "{$data['password']}");
			return $this->db->query($query, $values);
		} else {
			$query = "SELECT * FROM users WHERE email='{$data['email']}'";
			$result = $this->db->query($query)->num_rows();
			if($result >= 1) {
				$this->session->set_flashdata('reg_errors', "User Email Already Exists");
				redirect('/register');
			} else {
				$query = "INSERT INTO users (email, first_name, last_name, password, permission, created_at) VALUES (?,?,?,?,1,NOW())";
				$values = array("{$data['email']}", "{$data['first_name']}", "{$data['last_name']}", "{$data['password']}");
				return $this->db->query($query, $values);
			}
		}
	}

	public function get_user_by_email($email) {
		$query = "SELECT * FROM users WHERE email='{$email}'";
		return $this->db->query($query)->result_array();
	}

	public function get_user_by_id($id) {
		$query = "SELECT *, NULL AS password FROM users WHERE id='{$id}'";
		return $this->db->query($query)->row_array();
	}

	public function get_all() {
		$query = "SELECT *, NULL AS password FROM users";
		return $this->db->query($query)->result_array();
	}

	public function edit_user($data) {
		$query = "UPDATE users SET email='{$data['email']}', first_name='{$data['first_name']}', 
				  last_name='{$data['last_name']}', permission={$data['permission']} 
				  WHERE id='{$data['id']}'";
		return $this->db->query($query);
	}

	public function edit_user_password($data) {
		$query = "UPDATE users SET password = '{$data['password']}'
				  WHERE id='{$data['id']}'";
		return $this->db->query($query);
	}

	public function destroy_user($id) {
		$query = "DELETE FROM users WHERE id = {$id}";
		return $this->db->query($query);
	}

}








