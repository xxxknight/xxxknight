<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="xxxknight's blog">
<meta name="author" content="xxxknight">
<link rel="icon" href="__IMG__/icons/favicon.ico">

<title>Sign up</title>


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

<link href="__CSS__/Account/sign.css" rel="stylesheet">

<script type="text/javascript" src="__JS__/Account/signup.js">
	
</script>

<script type="text/javascript">
</script>
</head>
<!-- NAVBAR
================================================== -->
<body>
	<link href="__CSS__/Account/sign.css" rel="stylesheet">
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
						   <a class="btn btn-primary">Sign up</a>
						   <a class="btn btn-default">Sign in</a>
						<?php }?>
					</form>
				</div>
			</div>
		</nav>

	</div>
<style>

#dialog1{
	width: 350px;
	margin: 100px auto;
}
#content1{
	border-radius: 0px;
}
#btn-close{
	margin-right: 20px;
	margin-top: 10px;
}
</style>
<div class="modal" id="mymodal">
    <div class="modal-dialog" id="dialog1">
        <div class="modal-content" id="content1">
    		
			<div class="modal-body">
				<ul class="nav nav-tabs">
  					<li class="active"><a href="#signin" data-toggle="tab">登陆</a></li>
  					<li><a href="#signup" data-toggle="tab">注册</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
  					<div class="tab-pane fade active in" id="signin">
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
							<img src="__APP__/Public/verify/" width="60px"
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
    					<form   action="__URL__/createAccount"  method="post"  class="form-signin">
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
							<button class="btn btn-lg btn-primary btn-block" id="sub">Sign
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

<script>
$(function(){
    $(".btn").click(function(){
      	$("#mymodal").modal("toggle");
    });

    $("#btn-close").click(function(){
    	alert(1);
    });
});
</script>
	
	<div class="container">
		<form   action="__URL__/createAccount"  method="post"  class="form-signin">
			<h2 class="form-signin-heading">Sign up</h2>
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
			<button class="btn btn-lg btn-primary btn-block" id="sub">Sign
				up for Shadow</button>
			<div id ="err1" class="err"></div>
			<div id ="err2" class="err"></div>
			<div id ="err3" class="err"></div>
		</form>
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