<?php
    $brand = $this->mm->getSet('Company Name');
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<base href="<?php echo base_url();?>"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="css/masteradmin/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
     <!-- FONTAWESOME STYLES-->
    <link href="css/masteradmin/font-awesome.css" rel="stylesheet">
     
        <!-- CUSTOM STYLES-->
    <link href="css/masteradmin/custom.css" rel="stylesheet">
     <!-- GOOGLE FONTS-->
   <link href="css/masteradmin/css.css" rel="stylesheet" type="text/css">
   
   
 

   <!-- JQUERY SCRIPTS -->
    <script src="js/masteradmin/jquery-1.js"></script>
   <script src="js/masteradmin/myjs.js"></script>
</head>
<style>
.container{float:left;}
</style>

<style>
.input-group-addon {
    font-size: 14px;
    color: #7bae23;
    text-align: left;
}
.btn{padding: 0px 20px 0px 20px;display: block;color: #FFF;background: #7BAE23;line-height: 40px;margin-top:-20px;margin-left:10px;}
.sub-title {
    font-size: 25px;
    line-height: 1;
    text-transform: uppercase;
    margin-bottom: 30px;
    margin-top: 0;
}
h1, h2, h3, h4, h5, h6 {
    font-family: 'Oswald', Arial, sans-serif;
    line-height: 1;
    color: #444645;
    margin-top: 0;
}
</style>
<body>

	<?php
    	$isAdminLogin = $this->session->userdata('sid');
		if($isAdminLogin == "")
		{
			redirect('main/index');
		}
	?>
   
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"  href="<?php echo "#";?>"><?php if(isset($brand)&&$brand != "") {echo $brand;}else{echo 'Brand Name';} ?></a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <a href="<?php echo "admincontroller/admin_logout";?>" class="btn-danger" style="height:50px;padding:10px;text-decoration:none;">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse" aria-expanded="false" style="height: 0px;">
                <ul class="nav" id="main-menu">
					<li class="text-center">
                   	&nbsp;
					</li>
                    
                    
                  <li>
                  	<a <?php if(isset($menu)&& $menu=='homebanner') echo "class='active-menu'";?> href="<?php echo "homebanner_management/index";?>"> Home Banner</a>
                  </li>          
                   <li>
                  	<a <?php if(isset($menu)&& $menu=='homeads') echo "class='active-menu'";?> href="<?php echo "homeads_management/index";?>"> Home Ads</a>
                  </li>
                  
                  <li>
                  	<a <?php if(isset($menu)&& $menu=='team') echo "class='active-menu'";?> href="<?php echo "team_management/index";?>"> Team Player</a>
                  </li>
                  <li>
                       <a <?php if(isset($menu)&& $menu=='news') echo "class='active-menu'";?> href="<?php echo "news_management/index";?>"> News</a>
                  </li>
				  
                  <li>
                       <a <?php if(isset($menu)&& $menu=='match_team') echo "class='active-menu'";?> href="<?php echo "match_team_management/index";?>"> Match Team</a>
                  </li>
                  <li>
                       <a <?php if(isset($menu)&& $menu=='match_team_schedule') echo "class='active-menu'";?> href="<?php echo "match_team_schedule_management/index";?>"> Match Team Schedule</a>
                  </li>
                   
                 	

                
				<!---======== Settings =========----->
                <li>
                    <a href="javascript:"> Settings<span style="float:right;font-size:26px;">&#9663;</span></a>
                      <ul class="nav nav-third-level collapse">	
                        
                         <li>
                    <a <?php if(isset($menu)&& $menu=='brand') echo "class='active-menu'";?> href="<?php echo 'admincontroller/branding_form'?>"> Branding</a>
                        </li>	
                         <li>
                            <a <?php if(isset($menu)&& $menu=='link') echo "class='active-menu'";?> href="<?php echo "admincontroller/setting_sociallink";?>"> Social Link</a>
                        </li>
                        
                        <li>
                            <a <?php if(isset($menu)&& $menu=='login') echo "class='active-menu'";?>  href="<?php echo "admincontroller/change_admin";?>"> Admin Login</a>
                        </li>
                     </ul>
                </li>	

                <!---------------------------->
                 
                  
                </ul>
               <br>



            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <?php if(isset($container)) echo $container;?>          
    		</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/masteradmin/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/masteradmin/jquery.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="js/masteradmin/raphael-2.js"></script>
   
      <!-- CUSTOM SCRIPTS -->
    <script src="js/masteradmin/custom.js"></script>
    

 



</body></html>