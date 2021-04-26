<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeads_management extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
 
    }
	public function index()
	{
		$data = array();
		$data['menu'] = 'homeadds';
		$data['content'] = $this->load->view('homeads/homeads_form_entry',$data,true);
		$data['container'] = $this->load->view('homeads/homeads_page',$data,true);
		$this->load->view('masteradmin',$data);
	}
	
	
	public function insert()
	{
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
			$data['subject ']= $subject;
			$data['title']= $title;
			$data['publishday']= $pday;
			$data['publishmonth']= $pmonth;
			$data['publishyear']= $pyear; 
			$id = 0;
			$id = $this->mm->Insert_data_getid('t_homeads',$data);
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
					$updateresult = $this->mm->update_info('t_homeads',$udata,array("id" =>$id));
					if($updateresult == true){
						$this->mm->image_upload('./img/homeads/' , '15000000', '5000', '3000', $imgfilename ,'700','500','pic');
					}
				}
				redirect(base_url()."homeads_management/index?sk=Saved Successfully");
			}
			else
			{
				redirect(base_url()."homeads_management/index?esk=Database too busy");
			}
		}
		else{
			redirect(base_url()."homeads_management/index?esk=".$msg);
		}
	}
	
	public function view_info()
	{
		$data = array();
		$data['menu'] = 'homeadds';
		$data['model'] = $this->mm->view_data('t_homeads');
		$data['content'] = $this->load->view('homeads/view_homeads_info',$data,true);
		$data['container'] = $this->load->view('homeads/homeads_page',$data,true);
		$this->load->view('masteradmin',$data);
	}
	
	public function edit_data()
	{
		$id = array("id" => $this->uri->segment(3));
		
		$data = array();
		$data['model'] = $this->mm->get_all_info_by_id('t_homeads',$id);
		$data['content'] = $this->load->view('homeads/homeads_form_edit',$data,true);
		$data['container'] = $this->load->view('homeads/homeads_page',$data,true);
		$this->load->view('masteradmin',$data);
		
	}
	public function update_homeads()
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
			if($this->mm->update_info('t_homeads',$data,$id))
			{
				$p = pathinfo($_FILES['pic']['name']);
				$imgfilename ="";
				if(count($p)>2)
				{
					$imgfilename = $tid.".jpg";
					$oldfile = $imgfilename;
					$this->mm->image_upload2('./img/homeads/' , '15000000', '5000', '3000', $imgfilename ,'700','500','pic',$oldfile);
					
					$udata = array();
					$udata['pic']= $imgfilename;
					$updateresult = false;
					$updateresult = $this->mm->update_info('t_homeads',$udata,$id);
				}	
				redirect(base_url()."homeads_management/view_info?sk=Update Successfully", "refresh");
			}
			else
			{
				redirect(base_url()."homeads_management/view_info?esk=Database too busy" , "refresh");
			}
		}
		else{
			redirect(base_url()."homeads_management/view_info?esk=".$msg);
		}
	}
	public function delete_data($id)
	{
		if($this->mm->delete_info('t_homeads',array("id" =>$id)))
		{
			$imgfilename = $id.".jpg";
			$imglink = './img/homeads/'.$imgfilename;
			if(file_exists($imglink))
			{
				unlink($imglink);
			} 
			$msg = "Deleted Successfully";
			redirect(base_url()."homeads_management/view_info?sk=".$msg , "refresh");
		}
		else
		{
			$emsg = "Database too busy";
			redirect(base_url()."homeads_management/view_info?esk=".$emsg , "refresh");
		}	
	}
	public function select_home_banner()
	{
		$id = $this->input->post("mainpicno"); 
		if($id != "")
		{
			$data = array();
			$data["main_pic"] = "";
			$this->db->update('t_homeads',$data);
			
			$udata = array();
			$udata["main_pic"]=$id; 
			$this->mm->update_info('t_homeads',$udata,array("id" =>$id));
			$updateresult = $this->mm->update_info('t_homeads',$udata,array("id" =>$id));
			$msg = "Updated";
			redirect(base_url()."homeads_management/view_info?ssk=".$msg , "refresh");
		}
		else
		{
			redirect(base_url()."homeads_management/view_info", "refresh");
		}
	}
	
	
	
}
