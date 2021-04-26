<?php 
$settingdata = $this->db->query("select * from t_settings")->result();
$facebook=$twitter=$google="";
foreach($settingdata as $s)
{
	if($s->name == "facebook"){$facebook = $s->value;}
	if($s->name == "twitter"){$twitter = $s->value;}
	if($s->name == "google plus"){$google = $s->value;}
}
 
?>
<!DOCTYPE html>
<html class="no-js" prefix="og: http://ogp.me/ns#" lang="en-IN">
<head>
<base href="<?php echo base_url();?>">

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>IPL 2018 News - Free Bootstrap Template</title>

<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="We craft awesome Bootstrap themes for free and share selected resources for web designer &amp; developer. Download Free HTML themes for Bootstrap">

<link href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/img/logo_icon_96dp.png" rel="apple-touch-icon" sizes="96x96">
<link href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/img/logo_icon_96dp.png" rel="icon" sizes="96x96" type="image/png">
<link href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/img/logo_icon_32dp.png" rel="icon" sizes="32x32" type="image/png">

<meta content="img/logo_icon_96dp.png" name="msapplication-TileImage">
<meta property="og:url" content="https://www.boostraptheme.com/demo/index.html">
<meta property="og:title" content="Free Bootstrap Template">
<meta property="og:locale" content="en_IN">
<meta property="og:site_name" content="Boostraptheme">
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="BoostrapTheme">
<meta name="twitter:creator" content="BoostrapTheme">

<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/app.css">

</head>
<body>
<div class="topmenu">
  <div class="container-fluid">
    <div class="row" id="page-top">
      <div class="col-md-6 col-sm-6">
        <div class="info">IPL 2018 <i class="fa fa-long-arrow-right"></i> 07April - 27 May</div>
      </div>
      <div class="col-md-6 sec col-sm-6">
        <div class="social">
          <ul>
            <li>Social Corner </li>
            <li><a href="<?php if($facebook !=""){echo $facebook;}else{echo "javascript:";}?>"><i class="fa fa-facebook"></i></a></li>
            <li><a href="<?php if($twitter !=""){echo $twitter;}else{echo "javascript:";}?>"><i class="fa fa-twitter"></i></a></li>
            <li><a href="<?php if($google !=""){echo $google;}else{echo "javascript:";}?>"><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div style="height: auto;"></div>
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav" data-toggle="affix">
  <div class="container"> <a class="navbar-brand js-scroll-trigger" href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/index.html"><img src="img/logo.png" alt="" class="img-fluid"></a>
    <button class="navbar-toggler navbar-toggler-center ml-auto py-3 my-1" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> Menu <i class="fa fa-bars"></i> </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav text-uppercase ml-auto">
        <li class="nav-item"> <a class="nav-link" href="<?php echo "home";?>">Home</a> </li>
        <li class="nav-item"> <a class="nav-link" href="<?php echo "news";?>">News</a> </li>
        <li class="nav-item"> <a class="nav-link" href="<?php echo "teams";?>">Teams</a> </li>
      </ul>
    </div>
  </div>
</nav>




<section id="news" class="news">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="left-news">



			<?php if(isset($content)&&$content!="")echo $content;?>



		</div>
      </div>
      
      
      
      
      
      
      
      <!---============== Right Side Start =====================================---->
      
      <div class="col-md-3">
        <div class="right-news">
        
        
          <div class="live-score">
          
          
            <div class="card text-center">
              <div class="card-header"> Live Score </div>
              <div class="card-body">
                <ul>
                  <li><img src="img/mumbai_indians_logo.png" alt="" class="img-fluid">
                    <p>163/07 20ov.</p>
                  </li>
                  <li>vs</li>
                  <li><img src="img/chennai_super_kings_logo.png" alt="" class="img-fluid">
                    <p>123/05 14.02ov.</p>
                  </li>
                </ul>
              </div>
              <div class="card-footer text-muted"> 07 April 2018 </div>
            </div>
            
            
            <!--<div class="card text-center mt-3">
              <div class="card-header"> Live Score </div>
              <div class="card-body">
                <ul>
                  <li><img src="img/delhi_daredevils_logo.png" alt="" class="img-fluid">
                    <p>163/07 20ov.</p>
                  </li>
                  <li>vs</li>
                  <li><img src="img/kings_XI_punjab_logo.png" alt="" class="img-fluid">
                    <p>123/05 14.02ov.</p>
                  </li>
                </ul>
              </div>
              <div class="card-footer text-muted"> 08 April 2018 </div>
            </div>-->
            
            
          </div>
          
          
          
          <div class="team-point">
            <div class="card text-center mt-3">
              <div class="card-header"> JCL-1 </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>07 April 2018</td>
                      <td colspan="3"><img src="img/chennai_super_kings_logo.png" alt="" class="img-fluid"> <b>RS</b>&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp; <img src="img/chennai_super_kings_logo.png" alt="" class="img-fluid"> <b>CSK</b> </td>
                    </tr>
                    <tr>
                      <td>07 April 2018</td>
                      <td colspan="3"><img src="img/chennai_super_kings_logo.png" alt="" class="img-fluid"> <b>RS</b> &nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp; <img src="img/chennai_super_kings_logo.png" alt="" class="img-fluid"> <b>CSK</b> </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
          
          <div class="team-point">
            <div class="card text-center mt-3">
              <div class="card-header"> JCL-2 </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>07 April 2018</td>
                      <td colspan="3"><img src="img/chennai_super_kings_logo.png" alt="" class="img-fluid"> <b>RS</b>&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp; <img src="img/chennai_super_kings_logo.png" alt="" class="img-fluid"> <b>CSK</b> </td>
                    </tr>
                    <tr>
                      <td>07 April 2018</td>
                      <td colspan="3"><img src="img/chennai_super_kings_logo.png" alt="" class="img-fluid"> <b>RS</b> &nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp; <img src="img/chennai_super_kings_logo.png" alt="" class="img-fluid"> <b>CSK</b> </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
          
          <div class="team-point">
            <div class="card text-center mt-3">
              <div class="card-header"> JAPAN CUP </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>07 April 2018</td>
                      <td colspan="3"><img src="img/chennai_super_kings_logo.png" alt="" class="img-fluid"> <b>RS</b>&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp; <img src="img/chennai_super_kings_logo.png" alt="" class="img-fluid"> <b>CSK</b> </td>
                    </tr>
                    <tr>
                      <td>07 April 2018</td>
                      <td colspan="3"><img src="img/chennai_super_kings_logo.png" alt="" class="img-fluid"> <b>RS</b> &nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp; <img src="img/chennai_super_kings_logo.png" alt="" class="img-fluid"> <b>CSK</b> </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
          
          <div class="team-point">
            <div class="card text-center mt-3">
              <div class="card-header"> OTHERS </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>07 April 2018</td>
                      <td colspan="3"><img src="img/chennai_super_kings_logo.png" alt="" class="img-fluid"> <b>RS</b>&nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp; <img src="img/chennai_super_kings_logo.png" alt="" class="img-fluid"> <b>CSK</b> </td>
                    </tr>
                    <tr>
                      <td>07 April 2018</td>
                      <td colspan="3"><img src="img/chennai_super_kings_logo.png" alt="" class="img-fluid"> <b>RS</b> &nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp; <img src="img/chennai_super_kings_logo.png" alt="" class="img-fluid"> <b>CSK</b> </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
          
          
          
          <!--<div class="latest-news">
            <div class="card text-center mt-3">
              <div class="card-header"> Latest News </div>
              <div class="card-body">
                <div class="latest-news-cont pb-1"> <img src="img/news-10.jpg" alt="" class="img-fluid"> <a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/news-desc.html">
                  <h5>Fitness remains his priority, Samson has also changed</h5>
                  </a> </div>
                <hr>
                <div class="latest-news-cont pb-1"> <img src="img/news-9.jpg" alt="" class="img-fluid"> <a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/news-desc.html">
                  <h5>Kings XI Punjab pooled in Rs 5.50 crore for little-known Australian</h5>
                  </a> </div>
                <hr>
                <div class="latest-news-cont pb-1"> <img src="img/news-8.jpg" alt="" class="img-fluid"> <a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/news-desc.html">
                  <h5>Tens of thousands of people turned out on the streets of Kolkata</h5>
                  </a> </div>
                <hr>
                <div class="latest-news-cont pb-1"> <img src="img/news-7.jpg" alt="" class="img-fluid"> <a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/news-desc.html">
                  <h5>Their performance against Royal Challengers Bangalore</h5>
                  </a> </div>
                <hr>
                <div class="latest-news-cont pb-4"> <img src="img/news-1.jpg" alt="" class="img-fluid"> <a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/news-desc.html">
                  <h5>IPL 2017: Karun Nair stars as Daredevils beat Sunrisers</h5>
                  </a> </div>
              </div>
            </div>
          </div>-->
          <!--<div class="top-player">
            <div class="card text-center mt-3">
              <div class="card-header"> IPL-2017 Top Player </div>
              <div class="card-body">
                <div class="col-md-12">
                  <div class="run top-head">
                    <p>Runs</p>
                    <p>David Warner</p>
                    <p>600</p>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="top-head">
                    <p>Wickets</p>
                    <p>Bhuvneshwar</p>
                    <p>26</p>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="top-head">
                    <p>Sixes</p>
                    <p>Rishabh Pant</p>
                    <p>9</p>
                  </div>
                </div>
              </div>
            </div>
          </div>-->
        </div>
      </div>
      <!---============== Right Side End =====================================---->
      
      
      
      
    </div>
  </div>
</section>





<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="team">
          <h5>Teams</h5>
          <div class="border-bot"></div>
          <ul>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/team.html">Chennai Super Kings</a></li>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/team.html">Delhi Daredevils</a></li>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/team.html">Kings XI Punjab</a></li>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/team.html">Kolkata Knight Riders</a></li>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/team.html">Mumbai Indians</a></li>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/team.html">Rajasthan Royals</a></li>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/team.html">Royal Challengers Bangalore</a></li>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/team.html">Sunrisers Hyderabad</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="team">
          <h5>Useful Links</h5>
          <div class="border-bot"></div>
          <ul>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/news.html">News</a></li>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/score.html">Score</a></li>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/video.html">Video</a></li>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/team.html">Team</a></li>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/photo.html">Photo</a></li>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/video.html">Live TV</a></li>
            <li><a href="#">Stats</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="trend">
          <h5>Today Trend</h5>
          <div class="border-bot"></div>
          <ul>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/news-desc.html">IPL Auction 2018</a></li>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/news-desc.html">ipl highest paid player 2018</a></li>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/news-desc.html">The Washington Sundar story</a></li>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/news-desc.html">Vivo's Rs 2,199 cr investment </a></li>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/news-desc.html">Krunal Pandya interview</a></li>
            <li><a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/news-desc.html">Krunal Pandya interview</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="company-desc text-center"> <a href="https://demo.boostraptheme.com/demo/cricket-ipl-20-20/index.html"><img src="img/logo-big.png" alt="" class="img-fluid"></a>
          <ul>
            <li><a href="<?php if($facebook !=""){echo $facebook;}else{echo "javascript:";}?>"><i class="fa fa-facebook"></i></a></li>
            <li><a href="<?php if($twitter !=""){echo $twitter;}else{echo "javascript:";}?>"><i class="fa fa-twitter"></i></a></li>
            <li><a href="<?php if($google !=""){echo $google;}else{echo "javascript:";}?>"><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid footer-b text-center"> <small>Copyrights © 2018 Design by <a href="https://boostraptheme.com/">Boostraptheme.com</a></small> </div>
</footer>

<script src="js/jquery_002.js"></script> 
<script src="js/popper.js"></script> 
<script src="js/bootstrap.js"></script> 
<script src="js/jquery.js"></script> 
<script src="js/app.js"></script>

</body>
</html>