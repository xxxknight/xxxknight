<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="xxxknight's blog">
<meta name="author" content="xxxknight">
<link rel="icon" href="__IMG__/icons/favicon.ico">

<title>Picture</title>


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

<script src="__JS__/Album/albumlist.js" type="text/javascript"></script>
<link href="__CSS__/Album/albumlist.css" rel="stylesheet">
<script type="text/javascript">
	$(function(){
		//$("#navbar ul li").removeClass("active");
	    $("#album").addClass("active");
	});
</script>

<script type="text/javascript">
			$(function() {

				$('#carousel').carouFredSel({
					width: '100%',
					items: {
						visible: 'odd+2'
					},
					scroll: {
						pauseOnHover: true,
						onBefore: function() {
							$(this).children().removeClass( 'hover' );
						}
					},
					auto: {
						items: 1,
						easing: 'linear',
						duration: 1250,
						timeoutDuration: 0
					},
					pagination: {
						container: '#pager',
						items: 1,
						duration: 0.5,
						queue: 'last',
						onAfter: function() {
							var cur = $(this).triggerHandler( 'currentVisible' ),
								mid = Math.floor( cur.length / 2 );

							cur.eq( mid ).addClass( 'hover' );
						}
					}
				});

			});
</script>
</head>

<body>
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
						   <a class="btn btn-primary" href="__APP__/Account/signup">Sign up</a>
						   <a class="btn btn-default" href="__APP__/Account/signin">Sign in</a>
						<?php }?>
					</form>
				</div>
			</div>
		</nav>

	</div>
<div id ="outer">
    <div id="wrapper">
	    <div id="carousel">
	    	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div>
				<img src="<?php echo ($vo["link"]); ?>" alt="<?php echo ($vo["alt"]); ?>" width="200" height="200" />
				<span><?php echo ($vo["title"]); ?></span>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	    <div id="pager"></div>
    </div>
</div>
       
<div id="main">
			
<ul class="nav nav-tabs">
  <li class="active"><a href="#albums" data-toggle="tab" aria-expanded="false">相册</a></li>
  <li class=""><a href="#profile" data-toggle="tab" aria-expanded="true">照片墙</a></li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane active fade in" id="albums">
  	    <?php if(is_array($albumTypeList)): $i = 0; $__LIST__ = $albumTypeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="albums col-xs-6 col-md-3">
        	<div class="albumtype">
        	
			<a href="__URL__/showAlbum/type/<?php echo ($vo["id"]); ?>" class="thumbnail">
				<img alt="100%x180" src="<?php echo ($vo["coverImg"]); ?>" style="height: 180px; width: 100%; display: block;" >
			</a>
			<div class="caption">
				<div>&nbsp;&nbsp;<?php echo ($vo["name"]); ?>&nbsp;&nbsp; <span class="badge">00</span></div>
				<p>&nbsp;&nbsp;<?php echo ($vo["summary"]); ?></p>
			</div>  
		    </div>
		    
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
		
		
  </div>
  <div class="tab-pane fade" id="profile">
    <p>we are not supporting this function!!!</p>
  </div>
  
</div>
</div>
	
<!-- Bootstrap core JavaScript ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
	
	<script src="__ROOT__/Plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
	<script src="__ROOT__/Resources/assets/js/vendor/holder.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="__ROOT__/Resources/assets/js/ie10-viewport-bug-workaround.js"></script>


</body>

</html>