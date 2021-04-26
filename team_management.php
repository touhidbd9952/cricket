<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class team_management extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
 
    }
	public function index()
	{
		$data = array();
		$data['menu'] = 'team';
		$data['submenu'] ="1";
		$data['nextsubmenu'] ="1";
		$data['content'] = $this->load->view('team/team_form_personalinfo_entry',$data,true);
		$data['container'] = $this->load->view('team/team_page',$data,true);
		$this->load->view('masteradmin',$data);
	}
	
	
	public function personal_information_insert()
	{
		//pic name pday pmonth pyear born_city born_country heightinfeet heightininch heightincm batting_style bolling_style role aboutplayer
		
		$name = trim($this->input->post('name'));
		
		$born_day = $this->input->post('pday');
		$born_month = $this->input->post('pmonth');
		$born_year = trim($this->input->post('pyear'));
		$born_city = trim($this->input->post('born_city'));
		$born_country = trim($this->input->post('born_country'));
		
		$heightinfeet = trim($this->input->post('heightinfeet'));
		$heightininch = trim($this->input->post('heightininch'));
		$heightincm = trim($this->input->post('heightincm'));
		
		$batting_style = trim($this->input->post('batting_style'));
		$bolling_style = trim($this->input->post('bolling_style'));
		$role = trim($this->input->post('role'));
		$aboutplayer = trim($this->input->post('aboutplayer'));
		
		$err=0;
		$msg="";
		
		if($err==0)
		{
			$data['name']= $name;
			$data['born_day']= $born_day;
			$data['born_month']= $born_month;
			$data['born_year']= $born_year;
			$data['born_city']= $born_city;
			$data['born_country']= $born_country;
			$data['height_feet']= $heightinfeet;
			$data['height_inch']= $heightininch;
			$data['height_cm']= $heightincm;
			$data['batting_style']= $batting_style;
			$data['bolling_style']= $bolling_style;
			$data['role']= $role;
			$data['description']= $aboutplayer;
			
			$id = 0;
			$id = $this->mm->Insert_data_getid('t_team_profile',$data);
			if($id !=0)
			{
				$p = pathinfo($_FILES['pic']['name']);
				$imgfilename = "";
				if(count($p)>2)
				{
					$imgfilename = $id.'.jpg';
					$udata = array();
					$udata['pic']= $imgfilename;
					$updateresult = false;
					$updateresult = $this->mm->update_info('t_team_profile',$udata,array("id" =>$id));
					if($updateresult == true){
						$this->mm->image_upload('./img/team/' , '15000000', '5000', '3000', $imgfilename ,'230','315','pic');
					}
				}
				redirect(base_url()."team_management/index?sk=Saved Successfully");
			}
			else
			{
				redirect(base_url()."team_management/index?esk=Database too busy");
			}
		}
		else{
			redirect(base_url()."team_management/index?esk=".$msg);
		}
	}
	
	
	//International Information set
	public function international_information_entry_form()
	{
		$data = array();
		$data['menu'] = 'team';
		//$data['submenu'] ="1";
		//$data['nextsubmenu'] ="1";
		$data['content'] = $this->load->view('team/team_form_international_entry',$data,true);
		$data['container'] = $this->load->view('team/team_page',$data,true);
		$this->load->view('masteradmin',$data);
	}
	
	public function international_information_insert()
	{
		//id nationality test_debut last_test odi_debut last_odi odi_shirt_no
		$playerid = 0;
		$playerid = trim($this->input->post('playerid'));
		
		$nationality = $this->input->post('nationality');
		$test_debut = $this->input->post('test_debut');
		$last_test = trim($this->input->post('last_test'));
		$odi_debut = trim($this->input->post('odi_debut'));
		$last_odi = trim($this->input->post('last_odi'));
		
		$odi_shirt_no = trim($this->input->post('odi_shirt_no'));
		
		$err=0;
		$msg="";
		
		if($err==0)
		{
			$data['name']= $nationality;
			$data['born_day']= $test_debut;
			$data['born_month']= $last_test;
			$data['born_year']= $odi_debut;
			$data['born_city']= $last_odi;
			
			if($playerid !=0)
			{
				$updateresult = $this->mm->update_info('t_team_profile',$data,array("id" =>$playerid));
				redirect(base_url()."team_management/view_info?sk=Updated Successfully");
			}
			else
			{
				redirect(base_url()."team_management/view_info?esk=Database too busy, try later");
			}
		}
		else{
			redirect(base_url()."team_management/index?esk=".$msg);
		}
	}
	
	//Domestic Information set
	public function domestic_information_entry_form()
	{
		$data = array();
		$data['menu'] = 'team';
		//$data['submenu'] ="1";
		//$data['nextsubmenu'] ="1";
		$data['content'] = $this->load->view('team/team_form_domestic_entry',$data,true);
		$data['container'] = $this->load->view('team/team_page',$data,true);
		$this->load->view('masteradmin',$data);
	}
	public function domestic_information_insert()
	{
		//id year  team
		$playerid = 0;
		$playerid = trim($this->input->post('playerid'));
		
		$year = $this->input->post('year');
		$team = $this->input->post('team');
		
		$err=0;
		$msg="";
		
		if($err==0)
		{
			$data['years']= $year;
			$data['team']= $team;
			$data['teamplayerid']= $playerid;
			
			if($playerid !=0)
			{
				$id = 0;
				$id = $this->mm->Insert_data_getid('t_domestic_team_information',$data);
				
				if($id != 0)
				{
					redirect(base_url()."team_management/domestic_info_view?sk=Saved Successfully");
				}
				else
				{
					redirect(base_url()."team_management/domestic_info_view?esk=Database too busy, try later");
				}
			}
			else
			{
				redirect(base_url()."team_management/domestic_info_view?esk=Player id not found");
			}
		}
		else{
			redirect(base_url()."team_management/domestic_information_entry_form?esk=".$msg);
		}
	}
	
	//Career statistics Information set
	public function career_information_entry_form()
	{
		$data = array();
		$data['menu'] = 'team';
		//$data['submenu'] ="1";
		//$data['nextsubmenu'] ="1";
		$data['content'] = $this->load->view('team/team_form_career_entry',$data,true);
		$data['container'] = $this->load->view('team/team_page',$data,true);
		$this->load->view('masteradmin',$data);
	}
	public function career_information_insert()
	{
		//id //competition test odi fc la
		$playerid = 0;
		$playerid = trim($this->input->post('playerid'));
		
		$competition = $this->input->post('competition');
		$test = $this->input->post('test');
		$odi = $this->input->post('odi');
		$fc = $this->input->post('fc');
		$la = $this->input->post('la');
		
		$err=0;
		$msg="";
		
		if($err==0)
		{
			$data['competition']= $competition;
			$data['test']= $test;
			$data['odi']= $odi;
			$data['fc']= $fc;
			$data['la']= $la;
			
			if($playerid !=0)
			{
				$id = 0;
				$result ="";
				$result = $this->db->query("select * from t_career_statistics where teamplayerid='".$playerid."' and competition='".$competition."'")->result();
				if($result == "")
				{
					$id = $this->mm->Insert_data_getid('t_career_statistics',$data);
					if($id != 0)
					{
						redirect(base_url()."team_management/career_information_view?sk=Saved Successfully");
					}
					else
					{
						redirect(base_url()."team_management/career_information_view?esk=Database too busy, try later");
					}
				}
				else
				{
					redirect(base_url()."team_management/career_information_view?esk=Sorry, This Competition already exist");
				}
			}
			else
			{
				redirect(base_url()."team_management/career_information_view?esk=Player id not found");
			}
		}
		else{
			redirect(base_url()."team_management/career_information_entry_form?esk=".$msg);
		}
	}
	
	public function view_info()
	{
		$data = array();
		$data['menu'] = 'team';
		$data['submenu'] ="2";
		$data['model'] = $this->mm->view_data('t_team_profile');
		$data['content'] = $this->load->view('team/view_team_info',$data,true);
		$data['container'] = $this->load->view('team/team_page',$data,true);
		$this->load->view('masteradmin',$data);
	}
	public function view_details_info($id)
	{
		$data = array();
		$data['menu'] = 'team';
		$data['submenu'] ="2";
		$data['model'] = $this->mm->get_all_info_by_id('t_team_profile', array("id"=>$id));
		$data['content'] = $this->load->view('team/view_team_details_info',$data,true);
		$data['container'] = $this->load->view('team/team_page',$data,true);
		$this->load->view('masteradmin',$data);
	}
	
	public function edit_data()
	{
		$id = array("id" => $this->uri->segment(3));
		
		$data = array();
		$data['model'] = $this->mm->get_all_info_by_id('t_team_profile',$id);
		$data['content'] = $this->load->view('team/team_form_edit',$data,true);
		$data['container'] = $this->load->view('team/team_page',$data,true);
		$this->load->view('masteradmin',$data);
		
	}
	public function update_player_info()
	{
		$tid = $this->input->post('id');
		$id = array("id" => $this->input->post('id'));
		$subject = trim($this->input->post('subject'));
		$pday = $this->input->post('pday');
		$pmonth = $this->input->post('pmonth');
		$pyear = trim($this->input->post('pyear'));
		$title = trim($this->input->post('title'));
		$err=0;
		$msg="";
		if(empty($subject)){$msg .=++$err.'. Subject required<br>';}
		if(empty($title)){$msg .=++$err.'. Title required<br>';}
			
		if($err==0)
		{
			$data = array();
			$data['subject ']= $subject;
			$data['title']= $title;
			$data['publishday']= $pday;
			$data['publishmonth']= $pmonth;
			$data['publishyear']= $pyear; 
			if($picname != "")
			{
				$data['pic']= $picname;
			}
			if($this->mm->update_info('t_team_profile',$data,$id))
			{
				$p = pathinfo($_FILES['pic']['name']);
				$imgfilename ="";
				if(count($p)>2)
				{
					$imgfilename = $tid.".jpg";
					$oldfile = $imgfilename;
					$this->mm->image_upload2('./img/team/' , '15000000', '5000', '3000', $imgfilename ,'800','400','pic',$oldfile);
					
					$udata = array();
					$udata['pic']= $imgfilename;
					$updateresult = false;
					$updateresult = $this->mm->update_info('t_team_profile',$udata,$id);
				}	
				redirect(base_url()."team_management/view_info?sk=Update Successfully", "refresh");
			}
			else
			{
				redirect(base_url()."team_management/view_info?esk=Database too busy" , "refresh");
			}
		}
		else{
			redirect(base_url()."team_management/view_info?esk=".$msg);
		}
	}
	public function delete_data($id)
	{
		if($this->mm->delete_info('t_team_profile',array("id" =>$id)))
		{
			$imgfilename = $id.".jpg";
			$imglink = './img/team/'.$imgfilename;
			if(file_exists($imglink))
			{
				unlink($imglink);
			} 
			$msg = "Deleted Successfully";
			redirect(base_url()."team_management/view_info?sk=".$msg , "refresh");
		}
		else
		{
			$emsg = "Database too busy";
			redirect(base_url()."team_management/view_info?esk=".$emsg , "refresh");
		}	
	}
	public function select_home_banner()
	{
		$id = $this->input->post("mainpicno"); 
		if($id != "")
		{
			$data = array();
			$data["main_pic"] = "";
			$this->db->update('t_team',$data);
			
			$udata = array();
			$udata["main_pic"]=$id; 
			$this->mm->update_info('t_team',$udata,array("id" =>$id));
			$updateresult = $this->mm->update_info('t_team_profile',$udata,array("id" =>$id));
			$msg = "Updated";
			redirect(base_url()."team_management/view_info?ssk=".$msg , "refresh");
		}
		else
		{
			redirect(base_url()."team_management/view_info", "refresh");
		}
	}
	
	
	
}
