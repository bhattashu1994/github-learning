<?php
class User_model extends CI_model{
	function __construct()

	{

		parent::__construct();


	}
	public function logincreate($email,$password){
		
	//$result=$this->db->query('select * from user where email = "$email" and password = "$password" ');
		$this->db->select('*');
		$this->db->where("email",$email);
		$this->db->where("password",$password);
		$result=$this->db->get("user");
		if($result->num_rows()>0){
			return $result->result_array();
		}else{
			return false;
		}
		
	}
	public function existing_check($email){

	// select * from user where email = $email
		$result=$this->db->query('select * from user where email = "$email"');
		if($result->num_rows()>0){
			return false;
		}else{
			return true;
		}


	}
	public function insert_data($data){

		$id= $this->db->insert('user',$data);
		return $id;

	}

	//function delete_student_id($id){
//$this->db->where('student_id', $id);
//$this->db->delete('user');
//}


	public function fetch(){
		$query = $this->db->query("SELECT * FROM user;");
		if($query->num_rows()>0){
			return $query->result_array();
		}
		else{
			return false;
		}

	}

	public function get_data_by_id($id){
		$query = $this->db->query("SELECT * FROM user where id='$id'");
		if($query->num_rows()>0){
			return $query->result_array();
		}
		else{
			return false;
		}

	}
	public function update_data_by_id($id,$data){
		$this->db->where('id', $id);
		$res=$this->db->update('user', $data);

		if($res){
			return true;
		}
		else{
			return false;
		}
	}

	public function delete_new_user($val){
	 $query = $this->db->query("delete from user where id='$val'");

	}

    public function view_new_user($val){
    	//$query=$this->db->query("select * from user where id=$val");
    	$query=$this->db->query("select * from user where id=$val")->row()->id;

    	return $query;
    }

}


