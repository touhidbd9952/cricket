<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class match_team_management extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
 
    }
	public function index()
	{
		$data = array();
		$data['menu'] = 'team';
		$data['submenu'] ="1";
		$data['content'] = $this->load->view('match_team/match_team_form_entry',$data,true);
		$data['container'] = $this->load->view('match_team/match_team_page',$data,true);
		$this->load->view('masteradmin',$data);
	}
	
	
	public function insert()
	{
		//pic name pday pmonth pyear born_city born_country heightinfeet heightininch heightincm batting_style bolling_style role aboutplayer
		
		$teamname = trim($this->input->post('teamname'));
		
		$err=0;
		$msg="";
		
		if($err==0)
		{
			//$data['logo']= $name;
			$data['name']= $teamname;
			
			$id = 0;
			$id = $this->mm->Insert_data_getid('t_team',$data); //t_team use for match team
			if($id !=0)
			{
				$p = pathinfo($_FILES['pic']['name']);
				$imgfilename = "";
				if(count($p)>2)
				{
					$imgfilename = $id.'.jpg';
					$udata = array();
					$udata['logo']= $imgfilename;
					$updateresult = false;
					$updateresult = $this->mm->update_info('t_team',$udata,array("id" =>$id));
					if($updateresult == true){
						$this->mm->image_upload('./img/match_team/' , '15000000', '5000', '3000', $imgfilename ,'70','70','pic');
					}
				}
				redirect(base_url()."match_team_management/index?sk=Saved Successfully");
			}
			else
			{
				redirect(base_url()."match_team_management/index?esk=Database too busy");
			}
		}
		else{
			redirect(base_url()."match_team_management/index?esk=".$msg);
		}
	}
	
	
	public function view_info()
	{
		$data = array();
		$data['menu'] = 'team';
		$data['submenu'] ="2";
		$data['model'] = $this->mm->view_data('t_team');
		$data['content'] = $this->load->view('match_team/view_match_team_info',$data,true);
		$data['container'] = $this->load->view('match_team/match_team_page',$data,true);
		$this->load->view('masteradmin',$data);
	}
	
	public function edit_data()
	{
		$id = array("id" => $this->uri->segment(3));
		
		$data = array();
		$data['model'] = $this->mm->get_all_info_by_id('t_team',$id);
		$data['content'] = $this->load->view('match_team/match_team_form_edit',$data,true);
		$data['container'] = $this->load->view('match_team/match_team_page',$data,true);
		$this->load->view('masteradmin',$data);
		
	}
	public function update_team()
	{
		$tid = $this->input->post('id');
		$id = array("id" => $this->input->post('id'));
		$teamname = trim($this->input->post('teamname'));
		$err=0;
		$msg="";
		if(empty($teamname)){$msg .=++$err.'. Team name required<br>';}
			
		if($err==0)
		{
			$data = array();
			$data['name']= $teamname;
			if($this->mm->update_info('t_team_profile',$data,$id))
			{
				$p = pathinfo($_FILES['pic']['name']);
				$imgfilename ="";
				if(count($p)>2)
				{
					$imgfilename = $tid.'.jpg';
					$udata = array();
					$udata['logo']= $imgfilename;
					$updateresult = false;
					$updateresult = $this->mm->update_info('t_team',$udata,$id); //t_team use for match team
					if($updateresult == true){
						$this->mm->image_upload('./img/match_team/' , '15000000', '5000', '3000', $imgfilename ,'70','70','pic');
					}
				}	
				redirect(base_url()."match_team_management/view_info?sk=Update Successfully", "refresh");
			}
			else
			{
				redirect(base_url()."match_team_management/view_info?esk=Database too busy" , "refresh");
			}
		}
		else{
			redirect(base_url()."match_team_management/view_info?esk=".$msg);
		}
	}
	public function delete_data($id)
	{
		if($this->mm->delete_info('t_team',array("id" =>$id)))
		{
			$imgfilename = $id.".jpg";
			$imglink = './img/match_team/'.$imgfilename;
			if(file_exists($imglink))
			{
				unlink($imglink);
			} 
			$msg = "Deleted Successfully";
			redirect(base_url()."match_team_management/view_info?sk=".$msg , "refresh");
		}
		else
		{
			$emsg = "Database too busy";
			redirect(base_url()."match_team_management/view_info?esk=".$emsg , "refresh");
		}	
	}
	
	
	
	
}
