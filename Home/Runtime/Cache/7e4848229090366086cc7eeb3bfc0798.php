<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="xxxknight's blog">
<meta name="author" content="xxxknight">
<link rel="icon" href="__IMG__/icons/favicon.ico">

<title>xxxknight</title>


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
<link href="__CSS__/carousel.css" rel="stylesheet">

<script type="text/javascript">
	$(function(){
		$("#navbar ul li").removeClass("active");
	    $("#index").addClass("active");
	})

</script>
</head>
<!-- NAVBAR
================================================== -->
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
					<form action="__APP__/Search/search" class="navbar-form navbar-right" role="search">
						<div class="form-group">
							<input name="keyword" type="text" class="form-control" placeholder="Search" maxlength="30" size="25"/>
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


	<!-- Carousel
    ================================================== -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img class="first-slide" src="__IMG__/index/slide1.jpg"
					alt="First slide">
				<div class="container">
					<div class="carousel-caption">
						<h1>My Shadow</h1>
						<p>I have a little shadow that goes in and out with me, And
							what can be the use of him is more than I can see. He is
							very,very like me from the heels up to the head; And I see him
							jump before me,when I jump into my bed.</p>
						
					</div>
				</div>
			</div>
			<div class="item">
				<img class="second-slide" src="__IMG__/index/slide2.jpg"
					alt="Second slide">
				<div class="container">
					<div class="carousel-caption">
						<h1>The Shadow Of Love</h1>
						<p>I ll take the blame , we should never be apart tell me what
							can i do to get you back into my heart your shadow of love is
							still beside me.</p>
						
					</div>
				</div>
			</div>
			<div class="item">
				<img class="third-slide" src="__IMG__/index/slide3.jpg"
					alt="Third slide">
				<div class="container">
					<div class="carousel-caption">
						<h1>Tree Shadow</h1>
						<p>A ship in sail , a blooming flower , a town at night , a
							lovely poem , leaf shadows , a child ' s grace , the stary skies
							, apple trees in spring , the thousand sights and sounds or words
							that evoke in us the thought of beauty ?</p>
						<!-- <p>
							<a class="btn btn-lg btn-primary" href="#" role="button">Browse
								gallery</a>
						</p> -->
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button"
			data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"
			aria-hidden="true"></span> <span class="sr-only">Previous</span>
		</a> <a class="right carousel-control" href="#myCarousel" role="button"
			data-slide="next"> <span
			class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- /.carousel -->

	<!-- Marketing messaging and featurettes
    ================================================== -->
	<!-- Wrap the rest of the page in another container to center all the content. -->

	<div class="container marketing">

		<!-- Three columns of text below the carousel -->
		<div class="row">
			<div class="col-lg-4">
				<img class="img-circle" src="__IMG__/index/circle1.jpg"
					alt="wiki description" width="150" height="150">
				<h2>Wikipedia</h2>
				<p>A shadow is a region where light from a light source is
					obstructed by an opaque object. It occupies all of the
					three-dimensional volume behind an object with light in front of
					it.</p>
				<p>
					<a class="btn btn-info" href="#" role="button">View details
						&raquo;</a>
				</p>
			</div>
			<!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<img class="img-circle" src="__IMG__/index/circle2.jpg"
					alt="Three-dimensional shadows" width="150" height="150">
				<h2>3D shadows</h2>
				<p>A shadow occupies a three-dimensional volume of space, but
					this is usually not visible until it projects onto a reflective
					surface. A light fog, mist, or dust cloud can reveal the 3D
					presence of volumetric patterns in light and shadow.</p>
				<p>
					<a class="btn btn-info" href="#" role="button">View details
						&raquo;</a>
				</p>
			</div>
			<!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<img class="img-circle" src="__IMG__/index/circle3.jpg"
					alt="Propagation speed" width="150" height="150">
				<h2>Propagation speed</h2>
				<p>The farther the distance from the object blocking the light
					to the surface of projection, the larger the silhouette (they are
					considered proportional).</p>
				<p>
					<a class="btn btn-info" href="#" role="button">View details
						&raquo;</a>
				</p>
			</div>
			<!-- /.col-lg-4 -->
		</div>
		<!-- /.row -->


		<!-- START THE FEATURETTES -->

		<hr class="featurette-divider">

		<div class="row featurette">
			<div class="col-md-7">
				<h2 class="featurette-heading">
					Figure! <span class="text-muted">It'll blow your mind.</span>
				</h2>
				<p class="lead">Now, the blind boy has a shadow, A friendly
					shadow. He hear a lot of storys from the shadow. The night pass
					away quickly At 4 o'clock, the lights are going out. The shadow is
					dying out. The blind boy is crying. "No, Promise me not to leave
					me, OK? I need you!"</p>
			</div>
			<div class="col-md-5">
				<img class="featurette-image img-responsive center-block"
					src="__IMG__/index/rec1.jpg" alt="Figure" width="500"
					height="500">
			</div>
		</div>

		<hr class="featurette-divider">

		<div class="row featurette">
			<div class="col-md-7 col-md-push-5">
				<h2 class="featurette-heading">
					Three days to see ! <span class="text-muted">See for
						yourself.</span>
				</h2>
				<p class="lead">Sometimes I have thought it would be an
					excellent rule to live each day as if we should die tomorrow. There
					are those, of course, who would adopt the Epicurean motto of "Eat,
					drink, and be merry," but most people would be chastened by the
					certainty of impending death.</p>
			</div>
			<div class="col-md-5 col-md-pull-7">
				<img class="featurette-image img-responsive center-block"
					src="__IMG__/index/rec2.jpg" alt="Three days to see">
			</div>
		</div>

		<hr class="featurette-divider">

		<div class="row featurette">
			<div class="col-md-7">
				<h2 class="featurette-heading">
					Shadow Fiend (Never More) <span class="text-muted">Shadow
						Raze!!!</span>
				</h2>
				<p class="lead">Shadow Fiend's only defense lies in his superb
					offense. After each life he takes, he traps their soul to empower
					his attack damage with Necromastery. This allows him to amass high
					attack damage.</p>
			</div>
			<div class="col-md-5">
				<img class="featurette-image img-responsive center-block"
					src="__IMG__/index/rec3.jpg" alt="NEVERMORE">
			</div>
		</div>

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
	<!-- /.container -->
	<!-- Bootstrap core JavaScript ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
	
	<script src="__ROOT__/Plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
	<script src="__ROOT__/Resources/assets/js/vendor/holder.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="__ROOT__/Resources/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>