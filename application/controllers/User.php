<?php
class User extends CI_Controller 
{
	public function __construct(){

		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('session');
		$this->load->helper(array('form','email'));
	}
	public function index(){
		$userid=$this->session->userdata('userid');//fetch single data from session
		
		if(!empty($userid)){
			redirect('User/profile');
		}
		$this->load->view('template/header');
		$this->load->view("users/login.php");
		$this->load->view('template/footer');

	}

	public function signup(){
		$userid=$this->session->userdata('userid');//fetch single data from session
		
		if(!empty($userid)){
			redirect('User/profile');
		}
		$this->load->view('template/header');
		$this->load->view("users/signup.php");
		$this->load->view('template/footer');
	}

	public function profile(){

		$userid=$this->session->userdata('userid');//fetch single data from session
		
		if(empty($userid)){
			redirect('User/page_login');
		}
		$return['data']=$this->user_model->fetch();

		$this->load->view('template/header');
		$this->load->view("users/user_profile.php",$return);
		$this->load->view('template/footer');

	}
	public function logout() {

// Removing session data

		$this->session->sess_destroy();
		redirect('User/index');
		
	}


public function page_login(){
	$userid=$this->session->userdata('userid');//fetch single data from session
		
	if(!empty($userid)){
		redirect('User/profile');
	}
	$this->load->view('template/header');
	$this->load->view("users/login.php");
	$this->load->view('template/footer');
}


public function delete_user() {
	$id=$this->input->post('id');
 	$data['new']=$this->user_model->delete_new_user($id);
 	print_r($data);
 	//redirect('User/profile');
}
   	
public function update_user($id){

	$return['data']=$this->user_model->get_data_by_id($id);
	$this->load->view('template/header');
	$this->load->view("users/update.php",$return);
	$this->load->view('template/footer');
}

public function update_user_data(){
	if(!empty($this->input->post())){
		$this->form_validation->set_rules('firstname','Firstname','required');
		$this->form_validation->set_rules('lastname','Lastname','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error',validation_errors());//as like index, value inside bracket

			redirect('User/update');
		}
		else{
			$id= $this->input->post('id');
			$data = array(
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
			);

			$res=$this->user_model->update_data_by_id($id,$data);
			if($res){
								$this->session->set_flashdata('success','updated successfully');//as like index, value inside bracket

			         	redirect('User/profile');
			}else{
				$this->session->set_flashdata('error','failed to update');//as like index, value inside bracket
			         	redirect('User/profile');
			      

			}
		}
	
}
}


public function login_user(){
	$data =$this->input->post();
	if(!empty($data)){
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		if ($this->form_validation->run() == FALSE){ 

		$this->session->set_flashdata('error',validation_errors());//as like index, value inside bracket

			redirect('User/page_login');

		}else{
			$lgncheck=$this->user_model->logincreate($data['email'],$data['password']);
			if(!empty($lgncheck)){
				$this->session->set_userdata('userid',$lgncheck[0]['id']);
				redirect('User/profile'); //controler name , function name

	        }else{
	        	$this->session->set_flashdata('error','Please Enter Valid Credentials');//as like index, value inside bracket
	         	redirect('User/page_login');
	         }

	    }
	} else{
		$this->session->set_flashdata('error','Data Not found');//as like index, value inside bracket
	         	redirect('User/page_login');
	      
	}            
}
     
                                 
public function register_user(){

	$data =$this->input->post();

	if(!empty($data)){
		$this->form_validation->set_rules('firstname','Firstname','required');
		$this->form_validation->set_rules('lastname','Lastname','required');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error',validation_errors());
			redirect('User/signup');
		}
		else{
			$check=$this->user_model->existing_check($data['email']);

			if($check==FALSE){
				$this->session->set_flashdata('error','Please Enter Valid Credentials');

			}
			else{

				$id=$this->user_model->insert_data($data);
				
				if(!empty($id)){
					$this->session->set_userdata('userid', $id);
					redirect('User/profile'); //controler name , function name
                }else{
						redirect('User/index');

                }
            }


            }  
        }
    }

    public function term(){
    	$this->load->view('template/header');
		$this->load->view("users/term");
		
    }

    public function view($val){
    	
		$return['data']=$this->user_model->get_data_by_id($val);
		
    	$this->load->view('template/header');
    	$this->load->view('users/view',$return);
    	
		

    }




   	
}








