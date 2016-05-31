<?php

class Emp_login extends CI_Controller {
	
	function index()
	{
		//===========MAIN EMPLOYEE LOGIN PROMPT
		$data['main_content'] = 'emp_login_form';
		$this->load->view('emp_login_form', $data);		
	}
	
	//VALIDATE EMPLOYEE LOGIN INFO
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
			redirect('emp_site/members_area');
		}

		
	}

	function check_database()
	{
		
		$this->load->model('emp_membership_model');
		$query = $this->emp_membership_model->validate();
		
		if($query) // if the user's credentials validated...
		{
			$data = array(
				'user_info' => $this->user_info($query),
				'emp_is_logged_in' => true,
				'login_type' => 'employee'
			);

			$this->session->set_userdata($data);
			//redirect('emp_site/members_area');
			return true;
		}
		else // incorrect username or password
		{
			//$this->index();
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}
	}

	function user_info($result){
		foreach($result as $row)
	    {
	    	return $row;
	    }
	}

	//************SIGN UP*****************
	function signup()
	{
		$this->load->model('emp_membership_model');
        $outlets_list = $this->emp_membership_model->get_outlets();
        if($outlets_list->num_rows())
        {
            foreach($outlets_list->result() as $row )
            {
                $datas[$row->OUTLET_ID] = $row->OUTLET_NAME;
            }
        }

		$data['main_content'] = 'emp_signup_form';
		$data['outlet_list'] = $datas;
		$this->load->view('emp_signup_form', $data);
	}
	
	function create_member()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('FIRST_NAME', 'Name', 'trim');
		$this->form_validation->set_rules('LAST_NAME', 'Last Name', 'trim|required');
		//$this->form_validation->set_rules('OUTLET_ID', 'Outlet ID', 'trim|required|callback_check_outlet');
		$this->form_validation->set_rules('EMAIL', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('USER_NAME', $this->input->post('USER_NAME'), 'trim|required|min_length[4]|callback_check_user');
		$this->form_validation->set_rules('PASSWORD', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('PASSWORD2', 'Password Confirmation', 'trim|required|matches[PASSWORD]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->model('emp_membership_model');
	        $outlets_list = $this->emp_membership_model->get_outlets();
	        if($outlets_list->num_rows())
	        {
	            foreach($outlets_list->result() as $row )
	            {
	                $datas[$row->OUTLET_ID] = $row->OUTLET_NAME;
	            }
	        }
	        $data['outlet_list'] = $datas;
			$this->load->view('emp_signup_form',$data);
		}
		else
		{			
			$this->load->model('emp_membership_model');
			
			if($query = $this->emp_membership_model->create_member())
			{
				//$data['main_content'] = 'emp_signup_successful';
				redirect('emp_login');
			}
			else
			{
				$this->load->view('emp_signup_form');			
			}
		}
	}

	function check_user()
	{
		$this->load->model('emp_membership_model');
		$exists = $this->emp_membership_model->is_user_existed();

		if($exists)
		{
			$this->form_validation->set_message('check_user', 'Username <b>%s</b> is already taken. Try another one.');
			return false;
		}
		else{
			return true;
		}
	}


	function check_outlet()
	{
		$this->load->model('emp_membership_model');
		$presents = $this->emp_membership_model->is_outlet_present();

		if($presents)
		{
			return true;
		}
		else{
			$this->form_validation->set_message('check_outlet', 'Outlet <b>%s</b> is not valid. Try another one.');
			return false;
		}
	}

	
}
