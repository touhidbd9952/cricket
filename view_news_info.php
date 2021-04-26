<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css" />
<script type="text/javascript" src="js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>

<link rel="stylesheet" href="css/mystyle.css" />
<script src="js/myjs.js"></script>
<style type="text/css">
table {
	border-collapse: collapse;
}
.tableHeader {
	font-size: 24px;
	color: #000;
	padding: 5px 0px;
}
.tdStyle {
	text-align: center;
}
.btnStyle {
	padding: 0px 20px;
}
#message1 {
	color: green;
	font-size: 24px;
}
#message2 {
	color: red;
	font-size: 24px;
}
</style>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>
function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>
<?php
	if(isset($_GET['sk'])&& !empty($_GET['sk']))echo '<label class="ms mymsg fl-r">'.$_GET['sk'].'</label>';
	if(isset($_GET['esk'])&& !empty($_GET['esk']))echo '<label class="ems mymsg fl-r">'.$_GET['esk'].'</label>';
?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h2 class="tableHeader">All News</h2>
      <table id="example"  class="table table-bordered table-striped table-hover table-responsive">
        <thead>
          <tr>
            <th>SL</th>
            <th>Subject</th>
            <th>Title</th>
            <th>Description</th>
            <th>Publish</th>
            <th>Pic</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php 
					if(isset($model))
					{
						$serial = 0;
					foreach($model as $d)
					{
						$publishday =0;
						if(strlen($d->publishday)==1){$publishday = "0".$d->publishday;}else{$publishday =$d->publishday;}
				?>
          <tr>
            <td><?php echo ++$serial;?></td>
            <td><?php if(isset($d->title)) echo $d->subject;?></td>
            <td><?php if(isset($d->title)) echo $d->title;?></td>
            <td><?php if(isset($d->desc)) echo $d->desc;?></td>
            <td><?php if(isset($d->publishyear )) echo $publishday." ".$d->publishmonth." ".$d->publishyear;?></td>
            <td><?php if(isset($d->pic)&&!empty($d->pic)){ ?>
              <img src="img/news/<?php echo $d->pic?>" style="Width:200px;height:150px"/>
              <?php }?></td>
            <td><a href="<?php echo 'news_management/edit_data/'.$d->id?>">[Edit]</a>&nbsp; <a href="<?php echo 'news_management/delete_data/'.$d->id?>" onclick='javascript:confirmationDelete($(this));return false;'>[Delete]</a></td>
          </tr>
          <?php 
					}
					}
				?>
        </tbody>
      </table>
    </div>
  </div>
</div>
