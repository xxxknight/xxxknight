<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="xxxknight's blog">
<meta name="author" content="xxxknight">
<link rel="icon" href="__IMG__/icons/favicon.ico">

<title>Videos</title>


<!-- Bootstrap core CSS -->
<link href="__ROOT__/Plugins/bootstrap/css/bootstrap.min.css"
	rel="stylesheet">
<script src="__ROOT__/Plugins/jquery-1.10.2.min.js"></script>
<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="__ROOT__/Resources/assets/js/ie-emulation-modes-warning.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<!-- 统一字体 -->
<link href="__CSS__/common.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="__CSS__/Classification/offcanvas.css" rel="stylesheet">
<link href="__CSS__/Classification/carousel.css" rel="stylesheet">

<script type="text/javascript">
	$(function() {
		$("#video").addClass("active");
		var tag = "<?php echo ($tag); ?>";
		//alert(tag);
		$(".list-group a").removeClass("active");
		$("#"+tag).addClass("active");
		
	})
</script>
</head>

<body>
    <link href="__CSS__/Account/sign.css" rel="stylesheet">
<script type="text/javascript" src="__JS__/Account/signup.js">
</script>
<div class="container">

		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed"
						data-toggle="collapse" data-target="#navbar" aria-expanded="false"
						aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<!-- <span class="pull-left"><img src="__IMG__/admin/login/xk.png" style="width:50px;height:50px;margin-right:20px;">
          			</span> -->
					<a class="navbar-brand" href="__APP__">xxxknight</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li id="index"><a href="__APP__">Home</a></li>
						<!-- <li class="dropdown" id="classi">
							<a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-expanded="false">Resources
								<span class="caret"></span>
						    </a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="__APP__/Album/albumlist">Album</a></li>
								<li><a href="__APP__/Article/showArticles">Articles</a></li>
								<li><a href="__APP__/Video/showVideos">Videos</a></li>
							</ul>
						</li> -->
						<li id="album"><a href="__APP__/Album/albumlist">Album</a></li>
						<li id="article"><a href="__APP__/Article/showArticles">Articles</a></li>
						<li id="video"><a href="__APP__/Video/showVideos">Videos</a></li>
						<li id="contact"><a href="__APP__/Contact">Contact</a></li>
						
					</ul>
					<form action="##" class="navbar-form navbar-right" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search" />
						</div>
						&nbsp;&nbsp;
						<?php if(session('isExist')){?>
						welcome,
						<a href="#" class=""><?php echo session('username');?></a>
						&nbsp;&nbsp;&nbsp;
						<a class="btn btn-danger" href="__APP__/Account/signout">Sign out</a>
						<?php }else{?>
						   <a class="btn btn-primary" id="btn-signup">Sign up</a>
						   <a class="btn btn-default" id="btn-signin">Sign in</a>
						<?php }?>
					</form>
				</div>
			</div>
		</nav>

	</div>

<div class="modal" id="mymodal">
    <div class="modal-dialog" id="dialog1">
        <div class="modal-content" id="content1">
    		
			<div class="modal-body" id="body1">
				<ul class="nav nav-tabs">

  					<li id="li-signin"><a href="#signin" data-toggle="tab">登陆</a></li>
  					<li id="li-signup"><a href="#signup" data-toggle="tab">注册</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
  					<div class="tab-pane fade" id="signin">
    					<form class="form-signin" method="post" action="__APP__/Account/login">
							<label for="username" class="sr-only">Username</label> 
							<input type="text" id="username" class="form-control" name="username"
								placeholder="Username" value="<?php echo $_COOKIE['username']; ?>" required autofocus /> 
							<label for="password" class="sr-only">Password</label> 
							<input type="password" id="password" class="form-control"
								name="password" placeholder="Password" value="<?php echo $_COOKIE['password']; ?>" required />
							<label for="captcha" class="sr-only">Captcha</label> 
								<input type="text" id="captcha" class="form-control" name="captcha"
									placeholder="Captcha" required /> 
								<img src="__APP__/Public/verify/" width="100px" height="38px"
									onclick='this.src=this.src+"?"+Math.random()' />
							<div class="checkbox">
								<label> <?php if($_COOKIE['remember'] == 1){?><input type="checkbox"
								name="remember" value="1" checked><?php }else{($_COOKIE['remember'] == "")?><input
								type="checkbox" name="remember" value="1"><?php }?>
									Remember me
								</label>
							</div>
							<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
						</form>
  					</div>
  					<div class="tab-pane fade" id="signup">
    					<form  class="form-signin" method="post">
							<label for="inputUsername" class="sr-only">Username</label> 
							<input
								type="text" id="inputUsername" class="form-control" name="username"
								placeholder="Username" required autofocus/>
							<label for="inputEmail" class="sr-only">Email address</label> 
							<input
								type="email" id="inputEmail" class="form-control" name="email"
								placeholder="Email address" required/>
							<label
								for="inputPassword" class="sr-only">Password</label>
							<input
								type="password" id="inputPassword" class="form-control" name="password"
								placeholder="Password" required/>
							<button class="btn btn-lg btn-primary btn-block" id="sub-signup">Sign
								up for Shadow</button>
							
							<div id ="err1" class="err"></div>
							<div id ="err2" class="err"></div>
							<div id ="err3" class="err"></div>
							
						</form>
  					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


	<div class="container">
		<div class="row row-offcanvas row-offcanvas-right">
		    <div class="col-xs-6 col-sm-2 sidebar-offcanvas" id="sidebar">
				<div class="list-group">
					<a id="all" href="__URL__/showVideos" class="list-group-item active">All</a> 
					<a id="sports" href="__URL__/showVideos/tag/sports" class="list-group-item">Sports</a> 
					<a id="entertainment" href="__URL__/showVideos/tag/entertainment" class="list-group-item">Entertainment</a> 
					<a id="reading" href="__URL__/showVideos/tag/reading" class="list-group-item">Reading</a> 
					<a id="love" href="__URL__/showVideos/tag/love" class="list-group-item">Love</a> 
					<a id="movie" href="__URL__/showVideos/tag/movie" class="list-group-item">Movie</a> 
					<a id="mv" href="__URL__/showVideos/tag/mv" class="list-group-item">MV</a> 
				</div>
			</div>
			<!--/.sidebar-offcanvas-->

			<div class="col-xs-12 col-sm-10">
				<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="__IMG__/video/slides/slide1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Example headline.</h1>
              <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="__IMG__/video/slides/slide2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="__IMG__/video/slides/slide3.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="fourth-slide" src="__IMG__/video/slides/slide4.jpg" alt="Fourth slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="fifth-slide" src="__IMG__/video/slides/slide5.jpg" alt="Fifth slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
				
				
				
				<div class="row">
				    <?php if(is_array($list)): foreach($list as $key=>$vo): ?><div class="col-xs-6 col-lg-4">
						<p><img src="<?php echo ($vo["image"]); ?>" width="250px" height="150px"/></p>
						<h4><?php echo ($vo["name"]); ?>--<?php echo ($vo["id"]); ?></h4>
						<i>by</i> <?php echo ($vo["createpeople"]); ?> <i>in</i> <?php echo ($vo["createtime"]); ?>
						<p class="text-danger"><strong>Tag:</strong> <?php echo ($vo["tag1"]); ?>,<?php echo ($vo["tag2"]); ?>,<?php echo ($vo["tag3"]); ?></p>
						<p>
							<a class="btn btn-primary" href="__URL__/detail/vid/<?php echo ($vo["id"]); ?>" target="_blank" role="button">播放</a>
              <span class="text-success">like: </span> <span class="badge">13</span>
              <span class="text-warning">dislike: </span> <span class="badge">23</span>
						</p>
					</div><?php endforeach; endif; ?>
				</div>
				<!--/row-->
				<div class="text-right"><?php echo ($show); ?></div>
			</div>
			<!--/.col-xs-12.col-sm-9-->
		</div>
		<!--/row-->

		<hr class="featurette-divider">

		<!-- /END THE FEATURETTES -->

        <!-- FOOTER -->
		<footer style="text-align: center">
			<p class="pull-right">
				<a href="#">Back to top</a>
			</p>
			<p>
				&copy; 2015 <b>xxxknight</b>. &middot; <a href="#">Privacy</a>
				&middot; <a href="#">Terms</a>
			</p>
		</footer>

	</div>
	<!--/.container-->

	<!-- Bootstrap core JavaScript ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
	
	<script src="__ROOT__/Plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
	<script src="__ROOT__/Resources/assets/js/vendor/holder.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="__ROOT__/Resources/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>