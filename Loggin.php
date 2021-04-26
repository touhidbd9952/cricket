<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Loggin extends CI_Controller {

    public function __construct()
	 {
        parent::__construct();

    }

    public function index() 
	{
        $this->load->view('salesperson_login');
    }
    ///////  Product Management  Start //////////////////////////////////////////////////////////////////////////////////////////////////////
	public function check_salesperson_pm() //Product Management
	{
		
			$username = $this->input->post('username');//username password
			$password = $this->input->post('password');
			$user = $this->db->query("Select * from t_salesperson where username = '".$username."' and password ='".$password."' and category='Product_Management' ")->result(); 
			
			if(count($user)>0)
			{
				redirect('loggin/check_code_pm/'.$username.'/'.$password); //sales person code check
				//redirect('loggin/adminpanel_pm/'.$code);
			}
			else{redirect('loggin/index?esk1=Wrong username or password');}
		
	}
	public function check_code_pm($username,$password)
	{
		$data= array();
		$data['username'] = $username;
		$data['password'] = $password;
		$this->load->view('salesperson_code_entry_form_pm',$data);
	}
	public function check_salesperson_code_pm()
	{
		////username password code
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$code = $this->input->post('code');
		$user = $this->db->query("Select * from t_salesperson where username = '".$username."' and password ='".$password."' and code ='".$code."' and category='Product_Management' ")->result();
		if(count($user)>0)
		{
			redirect('loggin/adminpanel_pm/'.$code);
		}
		else{redirect('loggin/index?esk1=Wrong input given');}
		
	}
	public function adminpanel_pm($code)
	{
		$data = array();
		$data['code'] = $code;
		$this->session->set_userdata($data);
		$this->load->view('masteradmin_pm',$data);	
	}
	public function logout_pm()
	{
		$this->session->unset_userdata('code');
		redirect("main/index",'refresh');
	}
	///////  Product Management  End //////////////////////////////////////////////////////////////////////////////////////////////////////
	
	///////  Sales Management  Start //////////////////////////////////////////////////////////////////////////////////////////////////////
	public function check_salesperson_sm() //Sales Management
	{
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->db->query("Select * from t_salesperson where username = '".$username."' and password ='".$password."' and category='Sales_Management' ")->result(); 
		
		if(count($user)>0)
		{
			redirect('loggin/check_code_sm/'.$username.'/'.$password); //sales person code check
			//redirect('loggin/adminpanel_pm/'.$code);
		}
		else{redirect('loggin/index?esk2=Wrong username or password');}

	}
	public function check_code_sm($username,$password)
	{
		$data= array();
		$data['username'] = $username;
		$data['password'] = $password;
		$this->load->view('salesperson_code_entry_form_sm',$data);
	}
	public function check_salesperson_code_sm()
	{
		////username password code
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$code = $this->input->post('code');
		$user = $this->db->query("Select * from t_salesperson where username = '".$username."' and password ='".$password."' and code ='".$code."' and category='Sales_Management' ")->result();
		if(count($user)>0)
		{
			redirect('loggin/adminpanel_sm/'.$code);
		}
		else{redirect('loggin/index?esk2=Wrong input given');}
		
	}
	public function adminpanel_sm($code)
	{
		$data=array();
		$data['codesm'] = $code;
		$this->session->set_userdata($data);
		$this->load->view('masteradmin_sm',$data);	
	}
	public function logout_sm()
	{
		$this->session->unset_userdata('codesm');
		redirect("main/index",'refresh');
	}
	///////  Sales Management  End //////////////////////////////////////////////////////////////////////////////////////////////////////
}
