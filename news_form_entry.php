<link rel="stylesheet" href="css/mystyle.css" />
<script src="js/myjs.js"></script>


<style type="text/css">
#message1{font-size:24px;color:green;}
#message2{font-size:24px;color:red;}
.input-text-style{text-align:right;}
.space{margin-top:10px;}
.em{color:#F00;}

</style>

<script>
$(document).ready(function(e) {
     function readURL(input) 
	{

		if (input.files && input.files[0]) 
		{
			var reader = new FileReader();
	
			reader.onload = function (e) 
			{
				$('#blah').attr('src', e.target.result);
			}
	
			reader.readAsDataURL(input.files[0]);
		}
	}
	
	
	$("#imgInp").change(function(){
		readURL(this);
	});
});

function validation()
{
	var subject = document.getElementById('subject').value;
	var publishyear = document.getElementById('pyear').value;
	var title = document.getElementById('title').value;
	var desc = document.getElementById('desc').value;
	document.getElementById('esubject').innerHTML="";
	document.getElementById('epyear').innerHTML="";
	document.getElementById('etitle').innerHTML="";
	document.getElementById('edesc').innerHTML="";
	var err=0;
	if(subject == ""){
		++err; document.getElementById('esubject').innerHTML="Required";
	}
	if(publishyear == ""){
		++err; document.getElementById('epyear').innerHTML="Required";
	}
	else
	{
		var currentTime = new Date()
		var cyear = currentTime.getFullYear()
		if(isNaN(publishyear))
		{
			++err; document.getElementById('epyear').innerHTML="Invalid";
		}
		else if(publishyear != cyear)
		{
			++err; document.getElementById('epyear').innerHTML="Invalid";
		}
	}
	if(title == ""){
		++err; document.getElementById('etitle').innerHTML="Required";
	}
	if(desc == ""){
		++err; document.getElementById('edesc').innerHTML="Required";
	}
	if(err==0)
	{
		return true;
	}
	return false;
}
</script>		
        
	
        
        
        <form action="<?php echo base_url();?>news_management/insert" id="register-form" method="post" onsubmit="return validation()" enctype="multipart/form-data">
			
			<h2 class="sub-title">Form</h2>
            <?php
                	if(isset($_GET['sk'])&& !empty($_GET['sk']))echo '<label class="ms mymsg fl-r">'.$_GET['sk'].'</label>';
				?>	
            <table>
            <tr>
                <td>
                    <div class="input-group">  
                        <span class="input-group-addon" style="width:110px;"><span class="input-text-style">&nbsp;&nbsp;&nbsp;Subject&nbsp;<span id="esubject" class="em"></span></span></span>
                        <textarea name="subject" id="subject" required class="form-control inputsize" placeholder="Subject" style="min-width:468px;min-height:50px;height:50px;"></textarea>
                    </div><!-- End .input-group -->
                </td>
            </tr>
            <!--======= Publish date Start =========-->
            <tr>
                <td>
                    <div class="input-group space">
                        <span class="input-group-addon" style="width:110px;"><span class="input-text-style">&nbsp;&nbsp;&nbsp;Publish Day&nbsp;<span id="epday" class="em"></span></span></span>
                        <select name="pday" id="pday"  class="form-control " style="min-width:80px">
                        <?php 
						for($i=1;$i<=31;$i++)
						{
						?>
                        	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                        <?php 
						}
						?>    
                        </select> 
                    
                        <span class="input-group-addon" style="width:110px;"><span class="input-text-style">&nbsp;&nbsp;&nbsp;Month&nbsp;<span id="epmonth" class="em"></span></span></span>
                        <select name="pmonth" id="pmonth"  class="form-control " style="min-width:130px">
                        	<option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select> 
                    
                        <span class="input-group-addon" style="width:110px;"><span class="input-text-style">&nbsp;&nbsp;&nbsp;Year&nbsp;<span id="epyear" class="em"></span></span></span>
                        <input type="text" name="pyear" id="pyear" required class="form-control "  style="min-width:80px;" >
                    </div><!-- End .input-group -->
                </td>
            </tr>
             <!--======= Publish date End =========-->
            
            <tr>
                <td>
                    <div class="input-group space">
                        <span class="input-group-addon" style="width:110px;"><span class="input-text-style">&nbsp;&nbsp;&nbsp;Title&nbsp;<span id="etitle" class="em"></span></span></span>
                        <textarea name="title" id="title" required class="form-control" placeholder="News Title" style="min-width:468px;min-height:50px;height:50px;"></textarea>
                    </div><!-- End .input-group -->
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group space">
                        <span class="input-group-addon" style="width:110px;"><span class="input-text-style">&nbsp;&nbsp;&nbsp;Description&nbsp;<span id="edesc" class="em"></span></span></span>
                        <textarea name="desc" id="desc" class="form-control" required style="min-width:468px;min-height:100px;" placeholder="News Description"></textarea>
                    </div><!-- End .input-group -->
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group space">
                        <span class="input-group-addon" style="width:110px;"><span class="input-text-style">&nbsp;&nbsp;&nbsp;Picture</span></span>
                        <input type="file" id="imgInp" name="pic" style="height:40px;">
                    </div><!-- End .input-group -->
                </td>
            </tr>
            <tr>
              <td><img id="blah" src="img/upload_img1.png"  style="border:5px solid #CCCCCC; width:390;height:225px"><br>
                <br>
                <br></td>
            </tr>
            <tr>
                <td>						
                    &nbsp;<input type="submit" name="sub" value="Save" class="btn btn-custom-2 btn-lg md-margin space" >
                </td>
            </tr>
            </table>
            <?php
					if(isset($_GET['esk'])&& !empty($_GET['esk']))echo '<label class="ems mymsg fl-r">'.$_GET['esk'].'</label>';
				?>	
		</form>
                                  
