<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel_model extends CI_Model
{


	public function checklogin($table,$username,$password)
	{
		$this->db->select("*");
		$this->db->from($table);
		$this->db->where("username",$username);
		$this->db->where("password",$password);
		return $this->db->get()->result(); 
	}
	public function check_customer_login($table,$email)
	{
		$this->db->select("*");
		$this->db->from($table);
		$this->db->where("email",$email);
		return $this->db->get()->result();
	}
	public function insert_data($table,$data) //insert
	{
		if($this->db->insert($table,$data))
		{
			return true;
		}
		return false;
	}
	public function view_data($table)
	{
		$this->db->select("*");
		$this->db->from($table);
		return $this->db->get()->result();
	}
	public function get_last_record_id($table)
	{
		$this->db->select_max('id');
		$this->db->from($table);
		$result = $this->db->get()->result();
		$id = 0;
		foreach($result as $r)
		{
			$id = $r->id;
		}
		return $id;
	}
	public function get_last_record($table)
	{
		$this->db->select_max('id');
		$this->db->from($table);
		$result = $this->db->get()->result();
		foreach($result as $r)
		{
			$id = $r->id;
		}
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where(array('id'=>$id));
		return $this->db->get()->result();
	}
	function getLastInserted($table, $id) 
	{
		$this->db->select_max($id);
		$Q = $this->db->get($table);
		$row = $Q->row_array();
		return $row[$id];
 	}
	public function getinfo($table) //getinfo * 
	{
		$this->db->select('*');
		$this->db->from($table);
		return $this->db->get()->result();
	}
	public function Get_data($table,$fields,$id)
	{
		$this->db->select($fields);
		$this->db->from($table);
		$this->db->where($id);
		return $this->db->get()->result();
	}
	public function view_data_two_table($table1,$table2,$select,$relation)  //view data two table
	{
		$this->db->select($select);
		$this->db->from($table1);
		$this->db->join($table2,$relation);
		return $this->db->get()->result();
	}
	public function getinf_unread_mail($table,$unread)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($unread);
		return $this->db->get()->result();
	}
	public function getinfo_name($table,$name)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('name',$name);
		return $this->db->get()->result();
	}
	public function getinfo_email($table,$email)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('email',$email);
		return $this->db->get()->result();
	}
	public function update_info($table,$data,$id) //update
	{
		$this->db->where($id);
		if($this->db->update($table,$data))
		{
			return true;
		}
		return false;
	}
	public function update_by_user_pass($table,$username,$newpass)
	{
		$this->db->where($username);
		if($this->db->update($table,$newpass))
		{
			return true;
		}
		return false;
	}
	
	///////////////////////////////////////////////////////////////////////////////////
	
	
	/* Security Fuctions */
	
	public function randomCode($length) {
    $alphabet = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789abcdefghijklmnpqrstuvwxyz$.-#";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < $length; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
	}
	
	public function set_key_Server(){
	$domain=$_SERVER['SERVER_ADDR'];
	$domain=str_replace(".","",$domain);
	$domain ='8080';//remove when live
	$domain=base64_encode($domain);
	$code= $this->mm->randomCode(50);
	$codeKey=$code.$domain;
	$update=$this->db->query("UPDATE t_settings SET value='$codeKey' WHERE name='serverkey' LIMIT 1");
	return $code;
	}
	
	public function key_Split($str, $length) {
	$str1 = substr($str, 20) ;
	$str2 = substr($str, 15) ;
	$str3 = substr($str, 40) ;
	$str4 = substr($str, 35) ;
	$str5 = substr($str, 0, 10) ;
	$str6 = substr($str, 25, 13) ;
	$fstr =$str1.$str2.$str3.$str4.$str5.$str6;
	return substr($fstr, 7, $length);
	}
	
	public function key_Server(){
	$domain=$_SERVER['SERVER_ADDR'];
	$domain=str_replace(".","",$domain);
	$domain ='8080';//remove when live
	$domain=base64_encode($domain);
	$code=$this->mm->getSet("serverkey");
	if ($code){
	$preCode=substr($code, 0, 50);
	$preCode2=str_replace($preCode,'',$code);
	if ($preCode2==$domain) {$codeKey=$preCode;}
	else {
	//$code=$this->mm->set_key_Server();
	$codeKey=NULL;
	}} else {
	$code=$this->mm->set_key_Server();
	$codeKey=$code;
	}
	return $codeKey;
	}

	public function enc_Key(){
	$key=$this->mm->key_Server();
	$code=$this->mm->key_Split($key, 30);
	return $code;
	}
	
	public function rc4($key, $str) {
	$s = array();
	for ($i = 0; $i < 256; $i++)
	{ $s[$i] = $i; }
	$j = 0;
	for ($i = 0; $i < 256; $i++) {
	$j = ($j + $s[$i] + ord($key[$i % strlen($key)])) % 256;
	$x = $s[$i];
	$s[$i] = $s[$j];
	$s[$j] = $x; }
	$i = 0; $j = 0; $res = '';
	for ($y = 0; $y < strlen($str); $y++) {
	$i = ($i + 1) % 256;
	$j = ($j + $s[$i]) % 256;
	$x = $s[$i];
	$s[$i] = $s[$j];
	$s[$j] = $x;
	$res .= $str[$y] ^ chr($s[($s[$i] + $s[$j]) % 256]);
	}
	return $res;
	}

	public function insert_rc4_pass($username,$password){  /////use in registration
	$username =  strtolower($username);
	$key = $this->mm->enc_Key().$username;	
	//$stp = base64_encode($this->mm->rc4($key, $password));
	$stp = base64_encode($this->mm->rc4($key, $password));
	$stp=$this->mm->randomCode(59).$stp;
	return $stp;
	}

	public function read_rc4_pass($username,$db_pass){  //////use in password checking
	$username =  strtolower($username);
	$db_pass=substr($db_pass, 59) ;
	//echo $db_pass;exit;
	$pass = base64_decode($db_pass);
	
	$key = $this->mm->enc_Key().$username;
	$ori_pass = $this->mm->rc4($key, $pass);
	return $ori_pass;
	}
	
	
	
	
	
	//////////////////////////////////////////////////////////////////////////////////
	
	public function delete_info($table,$id) //delete
	{
		if($this->db->delete($table,$id))
		{
			return true;
		}
		return false;
	}
	public function get_all_info($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		return $this->db->get()->result();
	}
	public function get_all_info_by_cid($table,$id)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('clientid',$id);
		return $this->db->get()->result();
	}
	public function get_info_by_id($table,$id)
	{
		$this->db->select('pic');
		$this->db->from($table);
		$this->db->where($id);
		return $this->db->get()->result();
	}
	public function get_all_info_by_id($table,$id) //get info by id
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($id);
		return $this->db->get()->result();
	}
	public function get_all_info_by_id_desc($table,$id,$order)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($id);
		$this->db->order_by($order,"desc");
		return $this->db->get()->result();
	}
	public function getinfo_by_two_col($table,$user,$email)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('name',$user);
		$this->db->where('email',$email);
		return $this->db->get()->result();
	}
	public function getinfo_by_user_pass($table,$user,$pass)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('username',$user);
		$this->db->where('password',$pass);
		return $this->db->get()->result();
	}
	public function get_all_info_by_date($table,$startdate,$enddate)
	{
		$this->db->select('SUM(receiptamount) AS receiptamt, SUM(sendamount) AS sendamt');
		$this->db->from($table);
		$this->db->where("date between '".$startdate."' and '".$enddate."'");
		return $this->db->get()->result();
	}
	public function get_all_info_by_date1($table,$startdate,$enddate)
	{
		$this->db->select('SUM(amount) AS amount');
		$this->db->from($table);
		$this->db->where("date between '".$startdate."' and '".$enddate."'");
		return $this->db->get()->result();
	}
	public function getinfo_date($table,$startdate,$enddate)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where("date between '".$startdate."' and '".$enddate."'");
		$this->db->order_by('date','asc');
		return $this->db->get()->result();
	}
	public function InsertWithImage($table,$data)
	{
		$this->db->insert($table,$data);
		$insert_id = $this->db->insert_id();
		return $insert_id ;
	}
	public function Insert_data_getid($table,$data) //Insert_data_getid
	{
		$this->db->insert($table,$data);
		$insert_id = $this->db->insert_id();
		return $insert_id ;
	}
	public function UpdateWithImage($table, $data,$id ) //update with image
	{
		$this->db->where($id);
		if ($this->db->update($table ,$data))
 			{
 				return true ;
 			}
 			return false ;
	}
	
	
	//////isLogin/////////////////////////////////////////////////////
	public function isLogin(){
	$sid=$this->session->userdata('sid');
	$username=$this->session->userdata('username');
	$userid=$this->session->userdata('userid');
	$loged_in=$this->session->userdata('loged_in');
	///////////
	if (empty($sid) && $loged_in!=TRUE){
	$this->session->sess_destroy(); //////////////
	redirect('main/index');
	}

	
	$q=$this->db->query("SELECT * FROM t_user_online WHERE username='".$username."' AND userid='".$userid."' AND loged_in='true' LIMIT 1");
	if ($q->num_rows()==0){ redirect('main/index');}
	
	
	$this->mm->onlineUser();
	}
	/////online User//////////////////////////////////////////////// 	
	public function onlineUser(){
	$sid=$this->session->userdata('sid');
	$time=time();
	$time_check=time()-3600;  ////1 hour
	//New User
	$q=$this->db->select("count(*) as found")->from('t_user_online')->where('sid',$sid);
	$tmp=$q->get()->result();
	$found=$tmp[0]->found;
	if($found=="0"){
	redirect('main/logout');
	}else{
	$uData=array('time'=>$time);
	$this->db->where('sid',$sid);
	$this->db->update('t_user_online',$uData);
	}
	
	//Logout inactive user
	$this->db->delete('t_user_online', array('time <' => $time_check)); /////delete all user who loged in over 1 hour
	}
	
	
	public function getSet($place)
	{
		$value = $this->db->query("Select value from t_settings where name='".$place."'")->row()->value;
		return $value;
			
	}
	public function getSets($table,$reqcol ,$wherecol) //table, required column, where condition
	{
		$value = $this->db->query("Select $reqcol from $table where $wherecol")->row()->value;  //name='".$place."'
		return $value;
			
	}
	public function getPic($id)
	{
		$picname = $this->db->query("Select * from t_pic where id='".$id."'")->row()->pic;
		return $picname;
			
	}
	public function getApiInfo($place)
	{
		$value = $this->db->query("Select value from t_api where name='".$place."'")->row()->value;
		return $value;
	}
	
	//////sms system ////////
	
	public function curl_get($url, array $get = NULL, array $options = array()) 
	{  
		$defaults = array(
			CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get), 
			CURLOPT_HEADER => 0, 
			CURLOPT_RETURNTRANSFER => TRUE, 
			CURLOPT_TIMEOUT => 400 
		); 
    
		$ch = curl_init(); 
		curl_setopt_array($ch, ($options + $defaults)); 
		$result = curl_exec($ch);
		curl_close($ch); 
		return $result; 
	}
	public function startWith($haystack, $needle)
	{
		$var=!strncmp($haystack, $needle, strlen($needle));
		if ($var==1) return true;
		else return false;
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
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
	function delete_image($image_location_with_image_name) // 'img/customer/'.$picturename)
	{
		unlink($image_location_with_image_name);
		return true;
	}
	//echo $this->db->last_query();
	
}
