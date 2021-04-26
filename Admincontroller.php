<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincontroller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Dhaka");
		//$this->mm->isLogin();  ///////// Call isLogin() for all function ////////////////////
	}
	public function index()
	{
		$this->admin_login();
		//$this->load->view('masteradmin');
	}
	public function admin_login()
	{
		$data = array();
		$data['content'] = $this->load->view('admin_login_form');
	}
	public function check_admin_login()
	{
		if($_POST)
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$adminpass = $this->db->query("Select * from t_admin where username = '".$username."' ")->row()->password; 
			$adminpass = $this->mm->read_rc4_pass($username,$adminpass);
			
			if((string)$adminpass == (string)$password)
			{
				$ses = array();
				$usernamepass = $username.$adminpass;
				$ses['sid'] = md5(base64_encode($usernamepass));
				$ses['username'] = trim($username);
				$ses['userid'] = '1';
				$ses['time'] = time();
				$ses['login_time'] = date('Y-m-d h:i:s');
				$ses['ip'] = $_SERVER['REMOTE_ADDR'];
				$ses['loged_in'] = 'true';
				$this->mm->delete_info('t_user_online',array('username'=>$username));
				$this->mm->insert_data('t_user_online',$ses);
			
				$this->session->set_userdata($ses);
				redirect('admincontroller/adminpanel');
			}
			else{redirect('admincontroller/index?esk=Wrong username or password');}
		}
		else
		{
			redirect('main/index');
		}
	}
	public function adminpanel()
	{
		$sid = $this->session->userdata('sid');
		$siddb = $this->db->query("Select sid from t_user_online where sid='".$sid."'")->row()->sid;
		if((string)$siddb == (string)$sid)
		{
			$this->load->view('masteradmin');
		}		
	}
	public function admin_logout()
	{
		$this->session->unset_userdata('sid');
		$this->session->sess_destroy();
		redirect('main/index');
	}

	function homebanner_form()
	{
		$data = array();
		$data['menu'] = 'homebanner';
		$data['content'] = $this->load->view('homebanner/homebanner_form_entry',$data,true);
		$data['container'] = $this->load->view('homebanner/homebanner_page',$data,true);
		$this->load->view('masteradmin',$data);
	}
	
	function image_upload ($destinationFolder , $maxSize , $maxWidth , $maxHeight , $fileName,$image1_width,$image1_height,$pic) 
	{
 		$config = array ();
		$config['upload_path'] = $destinationFolder ; 
		$config['allowed_types'] = 'gif|jpg|png|jpeg' ; 
		$config['max_size'] = $maxSize ; 
		$config['max_width'] = $maxWidth ;  
		$config['max_height'] = $maxHeight ; 
		$config['file_name'] = $fileName ; 

 		$this->upload->initialize($config ); 
 		$this->upload->do_upload($pic); 
		
		//Image Thumbnail
		
		$config = array();
		$config['source_image'] = $destinationFolder.$fileName;
		$config['new_image'] = $destinationFolder;
		$config['admintain_ratio'] = FALSE;
		if($image1_width == "" || $image1_height == "")
		{
			$image2_width = 300;
			$image2_height = 300;
		}
		$config['width'] = $image1_width;
		$config['height'] = $image1_height;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		
		$this->image_lib->clear(); 
		
 	}
	function image_upload2 ($destinationFolder , $maxSize , $maxWidth , $maxHeight , $fileName,$image1_width,$image1_height,$pic,$oldfile) 
	{
		//delete orginal file
		$oldfile = $destinationFolder.$oldfile;
		if(file_exists($oldfile))
		{
			unlink($oldfile);
		} 
		//new file
 		$config = array ();
		$config['upload_path'] = $destinationFolder ; 
		$config['allowed_types'] = 'gif|jpg|png|jpeg' ; 
		$config['max_size'] = $maxSize ; 
		$config['max_width'] = $maxWidth ;  
		$config['max_height'] = $maxHeight ; 
		$config['file_name'] = $fileName ; 

 		$this->upload->initialize($config ); 
 		$this->upload->do_upload($pic); 
		
		//Image Thumbnail
		
		$config = array();
		$config['source_image'] = $destinationFolder.$fileName;
		$config['new_image'] = $destinationFolder;
		$config['admintain_ratio'] = FALSE;
		if($image1_width == "" || $image1_height == "")
		{
			$image2_width = 300;
			$image2_height = 300;
		}
		$config['width'] = $image1_width;
		$config['height'] = $image1_height;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		
		$this->image_lib->clear(); 
		
		
 	}
	
	/////////first delete old file/////////////////////
	function image_upload3 ($destinationFolder , $maxSize , $maxWidth , $maxHeight , $fileName,$image1_width,$image1_height,$pic,$oldfile) 
	{
		//first delete old file
		$oldfile = $destinationFolder.$oldfile;
		if(file_exists($oldfile))
		{
			unlink($oldfile);
		}
		
 		$config = array ();
		$config['upload_path'] = $destinationFolder ; 
		$config['allowed_types'] = 'gif|jpg|png|jpeg' ; 
		$config['max_size'] = $maxSize ; 
		$config['max_width'] = $maxWidth ;  
		$config['max_height'] = $maxHeight ; 
		$config['file_name'] = $fileName ; 

 		$this->upload->initialize($config ); 
 		$this->upload->do_upload($pic); 
		
		//Image Thumbnail
		
		$config = array();
		$config['source_image'] = $destinationFolder.$fileName;
		$config['new_image'] = $destinationFolder;
		$config['admintain_ratio'] = FALSE;
		if($image1_width == "" || $image1_height == "")
		{
			$image2_width = 300;
			$image2_height = 300;
		}
		$config['width'] = $image1_width;
		$config['height'] = $image1_height;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		
		$this->image_lib->clear();  
 	}
	public function branding_form()
	{
		$data = array();
		$data['menu'] = 'branding';
		$data['container'] = $this->load->view('setting_branding_form',$data,true);
		$this->load->view('masteradmin',$data);
	}
	public function update_branding()
	{
		$companyName = $this->input->post('companyName');
		$aboutCompanywork = $this->input->post('aboutCompanywork');
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$loginLink = $this->input->post('loginLink');
		$registerLink = $this->input->post('registerLink');
		$emailuslink = $this->input->post('emailuslink');
		$footerCopyrighttext = $this->input->post('footerCopyrighttext');
		if(!empty($companyName)){$data = array();$data['value'] = trim($companyName);
			$this->mm->update_info('t_settings',$data,array('name'=>'Company Name'));}	
		if(!empty($aboutCompanywork)){$data = array();$data['value'] = trim($aboutCompanywork);
			$this->mm->update_info('t_settings',$data,array('name'=>'About Company work'));}
		if(!empty($address)){$data = array();$data['value'] = trim($address);
			$this->mm->update_info('t_settings',$data,array('name'=>'Address'));}
		if(!empty($phone)){$data = array();$data['value'] = trim($phone);
			$this->mm->update_info('t_settings',$data,array('name'=>'phone'));}
			
		if(!empty($email)){$data = array();$data['value'] = trim($email);
			$this->mm->update_info('t_settings',$data,array('name'=>'servermail'));}
		if(!empty($loginLink)){$data = array();$data['value'] = trim($loginLink);
			$this->mm->update_info('t_settings',$data,array('name'=>'Login Link'));}	
		if(!empty($registerLink)){$data = array();$data['value'] = trim($registerLink);
			$this->mm->update_info('t_settings',$data,array('name'=>'Register Link'));}
		if(!empty($emailuslink)){$data = array();$data['value'] = trim($emailuslink);
			$this->mm->update_info('t_settings',$data,array('name'=>'E-mail us link'));}
		if(!empty($footerCopyrighttext)){$data = array();$data['value'] = trim($footerCopyrighttext);
			$this->mm->update_info('t_settings',$data,array('name'=>'Footer Copyright text'));}
		redirect("admincontroller/branding_form?sk=Updated");
	}
	public function setting_sociallink()
	{
		$data = array();
		$data['menu'] = 'link';
		$data['container'] = $this->load->view('setting_link_form',$data,true);
		$this->load->view('masteradmin',$data);
	}
	public function update_sociallink()
	{
		$facebook = $this->input->post('facebook');
		$googleplus = $this->input->post('googleplus');
		$twitter = $this->input->post('twitter');
		$forum = $this->input->post('forum');
		
		if(!empty($facebook)){$data = array();$data['value'] = trim($facebook);
			$this->mm->update_info('t_settings',$data,array('name'=>'facebook'));}	
		if(!empty($googleplus)){$data = array();$data['value'] = trim($googleplus);
			$this->mm->update_info('t_settings',$data,array('name'=>'google plus'));}	
		if(!empty($twitter)){$data = array();$data['value'] = trim($twitter);
			$this->mm->update_info('t_settings',$data,array('name'=>'twitter'));}	
		if(!empty($forum)){$data = array();$data['value'] = trim($forum);
			$this->mm->update_info('t_settings',$data,array('name'=>'forum'));}
		redirect("admincontroller/setting_sociallink?sk=Updated");
	}
	public function change_admin()
	{
		$data = array();
		$data['menu'] = 'login';
		$data['container'] = $this->load->view('admin_login_info',$data,true);
		$this->load->view('masteradmin',$data);
	}
	public function change_admin_logininfo()
	{
		if($_POST)
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$err = 0;
			$msg = "";
			if($username == ""){$msg .=++$err.". UserName Required<br>";}
			if($password == ""){$msg .=++$err.". Password Required<br>";}
			if($err == 0)
			{
				$query = $this->db->query("Select * from t_admin")->result();
				$data = array();
				$data['username'] = trim($username);
				$data['password'] = $this->mm->insert_rc4_pass($username,$password);
				
				if(count($query)>0)
				{
					if($this->mm->update_info('t_admin',$data,array('id'=>1))){
						redirect('admincontroller/change_admin?sk=Updated Successfully');	
					}
					else{redirect('admincontroller/change_admin?esk=Error!!! Try later');}
				}
				else
				{	
					$insertid = $this->mm->insert_data('t_admin',$data);
					if($insertid != ""){redirect('admincontroller/change_admin?sk=Saved Successfully');}
					else{redirect('admincontroller/change_admin?esk=Error!!! Try later');}
				}
			}
			else{redirect('admincontroller/change_admin?esk='.$msg);}
		}
		else{redirect('main/index');}
	}
	
	////////////// Product Section Start //////////////////////////////////////////////////////////////////
	
	public function product_category()
	{
		$data = array();
		$data['menu'] = 'category';
		$data['allcategory'] = $this->db->query("select * from t_productcategory")->result();
		$data['content'] = $this->load->view('product_category_form',$data,true);
		$this->load->view('masteradmin',$data);
	}
	
	////////////// Product Section End //////////////////////////////////////////////////////////////////
	public function order_request()
	{
		$data = array();
		$data['menu'] = 'orderreq';
		$data['allorderreq'] = $this->db->query("select * from  t_purchase where paymentstatus = 'Pending' and orderstatus !='Conform' and orderstatus !='Cencel' order by id desc")->result();
		//print_r($data['allorderreq']);exit;
		$data['container'] = $this->load->view('order_request_show',$data,true);
		$this->load->view('masteradmin',$data);
	}
	public function single_order_request_show($orderno)
	{
		$data = array();
		$data['menu'] = 'orderreq';
		$data['singleorderreq'] = $this->db->query("select * from  t_purchase where orderid = '".$orderno."'")->result();
		$data['orderno'] = $orderno;
		//print_r($data['allorderreq']);exit;
		$data['container'] = $this->load->view('single_order_request_show',$data,true);
		$this->load->view('masteradmin',$data);
	}
	public function confirm_salesperson_purchase_order()
	{
		$orderno = $this->input->post('orderno'); 
		$salesperson = $this->input->post('salesperson'); 
		$purchaseinfo = $this->db->query("select * from  t_purchase where orderid = '".$orderno."'")->result(); 
		$details = "";
		$customeremail = "";
		foreach($purchaseinfo as $pur)
		{
			$details = json_decode($pur->details);
			$customeremail =$this->db->query("select email from  t_customer where id = '".$pur->customerid."'")->row()->email; 
		}
		//puduct update
		foreach($details as $d)
		{
			$productid = $d->productid;
			$qty = $d->qty;
			$productstock = $this->db->query("select stock from product where id='".$productid."'")->row()->stock;
			if(($productstock - $qty) >= 0)
			{
				$productstock = $productstock - $qty;
			}
			
			$data = array();
			$data['stock'] = $productstock;
			$this->mm->update_info('product',$data,array('id'=>$productid));
		}
		//purchase update
		//invoice create
		$totalinvoice = $this->db->query("select count(invoiceno) as totalinvoice from t_purchase where invoiceno != '' ")->row()->totalinvoice;
		if($totalinvoice > 0)
		{
			$totalinvoice = $totalinvoice + 1;
		}
		else
		{
			$totalinvoice = 1;
		}
		
		$data = array();
		$data['orderstatus'] = "Conform";
		$data['salespersonid'] = $salesperson;
		$data['invoiceno'] = $totalinvoice;
		if($this->mm->update_info('t_purchase',$data,array('orderid'=>$orderno)))
		{
			//mail need to sent
			$companyname = $this->mm->getSet('Company Name');
			$companyemail = $this->mm->getSet('servermail');
			$from = $companyname.'<$companyemail>';
			$to = $customeremail;
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'To: ' .$to. "\r\n";
			$headers .= 'From: ' .$from. "\r\n";
			$subject = 'Order Confirmation | Ref No for Order: '.  $orderno;
			
			$sess = array();
			$sess['orderno'] = $orderno;
			$this->session->set_userdata($sess);
			$message =  'We are happy to inform you that our online store $companyname has an order whose recipients details match yours. \r\nThe order could be received in any Local Store of $companyname \r\n\n 
Open the <a href="'.base_url().'main/show_customer_order/'.$orderno.'">link</a> to seen full information about your order.\r\n\n Our blissingsto you on a Thanksgiving Day!\r\n$companyname ';

			mail($to,$subject,$message,$headers);
			redirect('admincontroller/single_order_sales_report/'.$orderno);
		}
	}
	
	public function single_order_sales_report($orderno)
	{
		$data = array();
		$data['menu'] = 'orderreq';
		$data['singleorderreq'] = $this->db->query("select * from  t_purchase where orderid = '".$orderno."'")->result();
		$data['orderno'] = $orderno;
		//print_r($data['allorderreq']);exit;
		$data['container'] = $this->load->view('single_order_sales_report',$data,true);
		$this->load->view('masteradmin',$data);
	}
	public function order_confirm_show()
	{
		//select all paid order for print and show in a page
		$data = array();
		$data['menu'] = 'orderreqreport';
		$data['allorderreq'] = $this->db->query("select * from  t_purchase where orderstatus = 'Conform'")->result();
		$data['container'] = $this->load->view('order_confirm_show',$data,true);
		$this->load->view('masteradmin',$data);
	}
	public function single_order_sales_paid_report($orderno)
	{
		$data = array();
		$data['menu'] = 'orderreqreport';
		$data['singleorderreq'] = $this->db->query("select * from  t_purchase where orderid = '".$orderno."'")->result();
		$data['orderno'] = $orderno;
		$data['container'] = $this->load->view('single_order_sales_paid_report',$data,true);
		$this->load->view('masteradmin',$data);
	}
	public function cencelorder($orderno,$customerid,$salespersonid)//cencel order before confirm
	{
		//purchase table
		$data = array();
		$data['orderstatus'] = "Cencel";
		$data['salespersonid'] = $salespersonid;
		if($this->mm->update_info('t_purchase',$data,array('orderid'=>$orderno)))
		{
			//customer
			$ordercencelstatus = $this->db->query("select ordercencelstatus from  t_customer where id = '".$customerid."'")->row()->ordercencelstatus;
			$data = array();
			$data['ordercencelstatus'] = $ordercencelstatus + 1;
			$this->mm->update_info('t_customer',$data,array('id'=>$customerid));
			redirect("admincontroller/order_request?sk=Order Cencel");
		}
		else{
		redirect("admincontroller/order_request?esk=Order Cencel Problem, Try later");}
	}
	public function order_complete_form()
	{
		$data = array();
		$data['menu'] = 'ordercomplete';
		$data['container'] = $this->load->view('single_order_sales_complete',$data,true);
		$this->load->view('masteradmin',$data);
	}
	public function confirm_order_complete()
	{
		$orderno = $this->input->post("orno");
		$salespersonid = $this->input->post("spid"); 
		$order = $this->db->query("select * from  t_purchase where orderid = '".$orderno."'")->result();
		if(count($order)==1)
		{
			$data = array();
			$data['paymentstatus'] = 'Paid';
			$data['orderstatus'] = 'Complete';
			$data['salespersonid'] = $salespersonid;
			$this->mm->update_info('t_purchase',$data,array('orderid'=>$orderno));
			redirect("admincontroller/order_complete_form?sk=Order Completed");
		}
		else{
		redirect("admincontroller/order_complete_form?sk=Order Not Completed");}
	}
	
	public function checkmailmessage()
	{
		$data = array();
		$data['container'] = $this->load->view('product_sales_confirm_message','',true);
		$this->load->view('masteradmin',$data);
	}
	public function confirm_order_cencel($orderno,$customerid,$salespersonid)//cencel order after confirm
	{
		//purchase table info
		$order = $this->db->query("select * from  t_purchase where orderid = '".$orderno."'")->result();
		$details = "";
		foreach($order as $o)
		{
			$details = json_decode($o->details);
		}
		$quartproductid = "";
		$quartproductqty = 0;
		foreach($details as $de)
		{
			$quartproductid = $de->productid;
			$quartproductqty = $de->qty; 
			$stock = 0;
			$stock = $this->db->query("select stock  from  product where id = '".$quartproductid."'")->row()->stock;
			$stock = $stock + $quartproductqty;
			$data = array();
			$data['stock'] = $stock;
			//update product table to increase product stock
			$this->mm->update_info('product',$data,array('id'=>$quartproductid));
		}
		//purchase table
		$data = array();
		$data['orderstatus'] = "Cencel";
		$data['salespersonid'] = $salespersonid;
		if($this->mm->update_info('t_purchase',$data,array('orderid'=>$orderno)))
		{
			//customer table
			$ordercencelstatus = $this->db->query("select ordercencelstatus from  t_customer where id = '".$customerid."'")->row()->ordercencelstatus;
			$data = array();
			$data['ordercencelstatus'] = $ordercencelstatus + 1;
			$this->mm->update_info('t_customer',$data,array('id'=>$customerid));
			redirect("admincontroller/order_confirm_show?sk=Order Cencel");
		}
		else{
		redirect("admincontroller/order_confirm_show?esk=Order Cencel Problem, Try later");}
	}
	public function news_form()
	{
		$data = array();
		$data['menu'] = 'news';
		$data['container'] = $this->load->view('single_order_sales_complete',$data,true);
		$this->load->view('masteradmin',$data);
	}
	
	
}//close controller
