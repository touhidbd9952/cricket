<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_management extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
 
    }
	public function index()
	{
		$data = array();
		$data['menu'] = 'news';
		$data['content'] = $this->load->view('news/news_form_entry',$data,true);
		$data['container'] = $this->load->view('news/news_page',$data,true);
		$this->load->view('masteradmin',$data);
	}
	
	
	public function insert()
	{
		$subject = trim($this->input->post('subject'));
		$pday = $this->input->post('pday');
		$pmonth = $this->input->post('pmonth');
		$pyear = trim($this->input->post('pyear'));
		
		$title = trim($this->input->post('title'));
		$desc = trim($this->input->post('desc'));
		$err=0;
		$msg="";
		if(empty($title)){$msg .=++$err.'. Title required<br>';}
		if(empty($desc)){$msg .=++$err.'. Description required<br>';}
		
		
		if($err==0)
		{
			$data['subject ']= $subject;
			$data['title']= $title;
			$data['desc']= $desc;
			$data['publishday']= $pday;
			$data['publishmonth']= $pmonth;
			$data['publishyear']= $pyear; 
			$id = 0;
			$id = $this->mm->Insert_data_getid('t_news',$data);
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
					$updateresult = $this->mm->update_info('t_news',$udata,array("id" =>$id));
					if($updateresult == true){
						$this->mm->image_upload('./img/news/' , '15000000', '5000', '3000', $imgfilename ,'250','200','pic');
					}
				}
				redirect(base_url()."news_management/index?sk=Saved Successfully");
			}
			else
			{
				redirect(base_url()."news_management/index?esk=Database too busy");
			}
		}
		else{
			redirect(base_url()."news_management/index?esk=".$msg);
		}
	}
	
	public function view_info()
	{
		$data = array();
		$data['menu'] = 'news';
		$data['model'] = $this->mm->view_data('t_news');
		$data['content'] = $this->load->view('news/view_news_info',$data,true);
		$data['container'] = $this->load->view('news/news_page',$data,true);
		$this->load->view('masteradmin',$data);
	}
	
	public function edit_data()
	{
		$id = array("id" => $this->uri->segment(3));
		
		$data = array();
		$data['news'] = $this->mm->get_all_info_by_id('t_news',$id);
		$data['content'] = $this->load->view('news/news_form_edit',$data,true);
		$data['container'] = $this->load->view('news/news_page',$data,true);
		$this->load->view('masteradmin',$data);
		
	}
	public function update_category()
	{
		$tid = $this->input->post('id');
		$id = array("id" => $this->input->post('id'));
		$subject = trim($this->input->post('subject'));
		$pday = $this->input->post('pday');
		$pmonth = $this->input->post('pmonth');
		$pyear = trim($this->input->post('pyear'));
		$title = trim($this->input->post('title'));
		$desc = trim($this->input->post('desc'));
		$err=0;
		$msg="";
		if(empty($title)){$msg .=++$err.'. Title required<br>';}
		if(empty($desc)){$msg .=++$err.'. Description required<br>';}
			
		if($err==0)
		{
			$data = array();
			$data['subject ']= $subject;
			$data['title']= $title;
			$data['desc']= $desc;
			$data['publishday']= $pday;
			$data['publishmonth']= $pmonth;
			$data['publishyear']= $pyear; 
			if($picname != "")
			{
				$data['pic']= $picname;
			}
			if($this->mm->update_info('t_news',$data,$id))
			{
				$p = pathinfo($_FILES['pic']['name']);
				$imgfilename ="";
				if(count($p)>2)
				{
					$imgfilename = $tid.".jpg";
					$oldfile = $imgfilename;
					$this->mm->image_upload2('./img/news/' , '15000000', '5000', '3000', $imgfilename ,'250','200','pic',$oldfile);
					
					$udata = array();
					$udata['pic']= $imgfilename;
					$updateresult = false;
					$updateresult = $this->mm->update_info('t_news',$udata,$id);
				}	
				redirect(base_url()."news_management/view_info?sk=Update Successfully", "refresh");
			}
			else
			{
				redirect(base_url()."news_management/view_info?esk=Database too busy" , "refresh");
			}
		}
		else{
			redirect(base_url()."news_management/view_info?esk=".$msg);
		}
	}
	public function delete_data($id)
	{
		if($this->mm->delete_info('t_news',array("id" =>$id)))
		{
			$imgfilename = $id.".jpg";
			$imglink = './img/news/'.$imgfilename;
			if(file_exists($imglink))
			{
				unlink($imglink);
			} 
			$msg = "Deleted Successfully";
			redirect(base_url()."news_management/view_info?sk=".$msg , "refresh");
		}
		else
		{
			$emsg = "Database too busy";
			redirect(base_url()."news_management/view_info?esk=".$emsg , "refresh");
		}	
	}
	
	
	
}
