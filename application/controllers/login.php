<?php

class Login extends CI_Controller {
	
	function index()
	{
		$data['main_content'] = 'login_form';
		$this->load->view('login_form', $data);		
	}
	
	//VALIDATE CUSTOMER LOGIN INFO
	function validate_credentials()
	{		
		
		//This method will have the credentials validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_name', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');


		if($this->form_validation->run() == FALSE)
		{
			//Field validation failed.  User redirected to login page
			$this->index();
		}
		else
		{
			//Go to private area
			redirect('database_controller');
		}

		
	}

	function check_database()
	{
		$user_name= $this->input->post('user_name');
		$password= md5($this->input->post('password'));
		$this->load->model('membership_model');
		$query = $this->membership_model->validate($user_name, $password);
		
		if($query) // if the user's credentials validated...
		{
			$data = array(
				'user_info' => $this->user_info($query),
				'is_logged_in' => true,
				'login_type' => 'customer'
			);
			$this->session->set_userdata($data);
			return true;
		}
		else // incorrect username or password
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}
	}
	
	
	function signup()
	{
		$data['main_content'] = 'signup_form';
		$this->load->view('includes/template', $data);
	}
	
	function create_member()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('FIRST_NAME', 'Name', 'trim');
		$this->form_validation->set_rules('LAST_NAME', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('EMAIL', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('USER_NAME', $this->input->post('USER_NAME'), 'trim|required|min_length[4]|callback_check_user');
		$this->form_validation->set_rules('PASSWORD', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('PASSWORD2', 'Password Confirmation', 'trim|required|matches[PASSWORD]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('signup_form');
		}
		
		else
		{	

			$new_customer_insert_data = array(
				'FIRST_NAME' => $this->input->post('FIRST_NAME'),
				'LAST_NAME' => $this->input->post('LAST_NAME'),
				'EMAIL' => $this->input->post('EMAIL'),			
				'USER_NAME' => $this->input->post('USER_NAME'),
				'PASSWORD' => md5($this->input->post('PASSWORD'))						
			);		
			$this->load->model('membership_model');
			
			if($query = $this->membership_model->create_member($new_customer_insert_data))
			{
				// $data['main_content'] = 'signup_successful';
				// $this->load->view('includes/template', $data);
				//redirect('site/members_area');
				$this->load->view('login_form');

			}
			else
			{
				$this->load->view('signup_form');			
			}
		}
		
	}

	function check_user()
	{
		$user_name = $this->input->post('USER_NAME');
		$this->load->model('membership_model');
		$exists = $this->membership_model->is_user_existed($user_name);

		if($exists)
		{
			$this->form_validation->set_message('check_user', 'Username <b>%s</b> is already taken. Try another one.');
			return false;
		}
		else{
			return true;
		}
	}
	
	function user_info($result){
		foreach($result as $row)
	    {
	    	return $row;
	    }
	}
}
