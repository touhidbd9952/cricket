<style type="text/css">
.menuCategory{width:300px;50px;margin-top:50px;}
.menuCategory ul{list-style-type:none;margin:0px;padding:0px;}
.menuCategory ul li{float:left;display:inline;}
.menuCategory ul li a{line-height:50px;text-decoration:none;padding:0px 10px 0px 10px;display:block;color:#FFF;background:#7BAE23;}
.menuCategory ul li a:hover{color:#FFF; background:#BDE47C;}
</style>


<section id="content">
        	
        	<div class="container">
        		<div class="row">
        			<div class="col-md-12">
						<header class="content-title">
							<h1 class="title">News</h1>
							<div class="menuCategory">
                            	<ul>
                                	<li><a href="<?php echo base_url();?>news_management/index">News Entry</a></li>
                                    <li><a href="<?php echo base_url();?>news_management/view_info">View All News</a></li>
                                </ul>
                            </div>
						</header><br /><br /><br /><br />
        				<div class="xs-margin"></div><!-- space -->
                        
        				<div class="row">
        					
								<div class="col-md-6 col-sm-6 col-xs-12">
                                	<!--- content -->
                                	<div>
									<?php if(isset($content)) echo $content;?>
                                    </div>
                                      
                            
        						</div><!-- End .col-md-6 -->
        					
        				</div><!-- End .row -->
						
						
        				
                        
                        
        			</div><!-- End .col-md-12 -->
        		</div><!-- End .row -->
			</div><!-- End .container -->
        
        </section>