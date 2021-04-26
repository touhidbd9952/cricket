<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//date_default_timezone_set("Asia/Dhaka");
	}
	public function index()
	{
		$data = array();
		$data['homeads'] = $this->mm->view_data('t_homeads');
		$data['homeslider'] = $this->mm->view_data('t_homebanner');
		$data['homenews'] = $this->mm->view_data('t_news');
		$data["content"] = $this->load->view('home',$data,true);
		$this->load->view('master',$data);
	}
	public function home()
	{
		$data = array();
		$data['homeads'] = $this->mm->view_data('t_homeads');
		$data['homeslider'] = $this->mm->view_data('t_homebanner');
		$data['homenews'] = $this->mm->view_data('t_news');
		$data["content"] = $this->load->view('home',$data,true);
		$this->load->view('master',$data);
	}
	
	public function news()
	{
		$data = array();
		$data['news'] = $this->mm->view_data('t_news');
		$data["content"] = $this->load->view('news',$data,true);
		$this->load->view('master',$data);
	}
	
	public function news_details($id)
	{
		$data = array();
		$data['searchnewsid'] = $id;
		$data['news'] = $this->mm->view_data('t_news');
		$data["content"] = $this->load->view('news_details',$data,true);
		$this->load->view('master',$data);
	}
	
	public function teams()
	{
		$data = array();
		$data['teampalyers'] = $this->mm->view_data('t_team_profile');
		$data["content"] = $this->load->view('teams',$data,true);
		$this->load->view('master',$data);
	}
	public function profile($id)
	{
		$data = array();
		$data['searchnewsid'] = $id;
		$data['profile'] = $this->mm->get_all_info_by_id('t_team_profile', array("id"=>$id));
		$data["content"] = $this->load->view('news_details',$data,true);
		$this->load->view('master',$data);
	}
	
	public function error_404()
	{
		$data = array();
		$data["content"] = $this->load->view('404',$data,true);
		$this->load->view('master',$data);
	}
	
	


}
