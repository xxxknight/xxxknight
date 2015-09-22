<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="xxxknight's blog">
<meta name="author" content="xxxknight">
<link rel="icon" href="__IMG__/icons/favicon.ico">

<title>Articles</title>


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

<link href="__CSS__/Classification/showArticles.css" rel="stylesheet">

<script type="text/javascript">
  var type = '<?php echo ($type); ?>';

  $(function() {
    //$("#navbar ul li").removeClass("active");
    $("#article").addClass("active");
    //$(".list-group .list-group-item").removeClass("active");
    $("#type"+type).addClass("active");
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



    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
            <div id="focus" style="height:350px">
            
            </div>
            <div class="row" id="main">
            <div class="list-group">
                <?php if(is_array($art_list)): foreach($art_list as $key=>$vo): ?><a href="__URL__/detailArt/id/<?php echo ($vo["id"]); ?>" class="list-group-item"><span class="item-title"><?php echo ($vo["title"]); ?></span>
                <span class="item-time"><?php echo ($vo["createtime"]); ?></span></a><?php endforeach; endif; ?>
            </div>
            <div class="text-right"><?php echo ($show); ?></div>
           
            </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
            <a href="__URL__/showArticles" id="type0" class="list-group-item"><span class="badge"><?php echo ($totalnum); ?></span>All</a>
            <?php if(is_array($typelist)): foreach($typelist as $key=>$vo): ?><a href="__URL__/showArticles/type/<?php echo ($vo["id"]); ?>" id="type<?php echo ($vo["id"]); ?>" class="list-group-item"><span class="badge"><?php echo ($vo["typenum"]); ?></span><?php echo ($vo["showname"]); ?></a><?php endforeach; endif; ?>
            </div>

            <div class="list-group">
            <div class="list-group-item list-group-item-info">文章归档</div>
            <?php if(is_array($monthlist)): foreach($monthlist as $key=>$vo): ?><a class="list-group-item"><span class="badge"><?php echo ($vo["monthnum"]); ?></span><div class="overflow-title"><?php echo ($vo["month"]); ?></div></a><?php endforeach; endif; ?>
           
            </div>

            <div id="reading-rank">
            <div class="list-group">
            <div class="list-group-item list-group-item-success">阅读排行</div>
            <?php if(is_array($ranklist)): foreach($ranklist as $key=>$vo): ?><a href="__URL__/detailArt/id/<?php echo ($vo["id"]); ?>" class="list-group-item"><span class="badge"><?php echo ($vo["viewnum"]); ?></span><div class="overflow-title"><?php echo ($vo["title"]); ?></div></a><?php endforeach; endif; ?>
           
            </div>
                
            </div>

            <div id="new-list">
            <div class="list-group">
            <div class="list-group-item list-group-item-danger">最新推荐</div>
            <?php if(is_array($newlist)): foreach($newlist as $key=>$vo): ?><a href="__URL__/detailArt/id/<?php echo ($vo["id"]); ?>" class="list-group-item"><div class="overflow-title2"><span class="new-flag">*</span> <?php echo ($vo["title"]); ?></div></a><?php endforeach; endif; ?>
            </div>
                
            </div>

        </div><!--/.sidebar-offcanvas-->

      </div><!--/row-->

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

    </div><!--/.container-->


   
  <!-- Bootstrap core JavaScript ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
	
	<script src="__ROOT__/Plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
	<script src="__ROOT__/Resources/assets/js/vendor/holder.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="__ROOT__/Resources/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
<!-- ECharts单文件引入 -->
<script src="__ROOT__/Plugins/echarts/echarts.js"></script>
<script type="text/javascript">
var list = <?php echo ($wordlist); ?>;
for(var i=0;i<list.length;i++){
    list[i]['itemStyle']=createRandomItemStyle();
}

    function createRandomItemStyle() {
        return {
            normal: {
                color: 'rgb(' + [
                    Math.round(Math.random() * 160),
                    Math.round(Math.random() * 160),
                    Math.round(Math.random() * 160)
                ].join(',') + ')'
            }
        };
    }

    // 路径配置
    require.config({
        paths: {
            echarts: '__ROOT__/Plugins/echarts'
        }
    });
        
    // 使用
    require(
        [
                'echarts',
                'echarts/chart/wordCloud',// 使用柱状图就加载bar模块，按需加载

        ],
        function (ec) {
            // 基于准备好的dom，初始化echarts图表
            var myChart = ec.init(document.getElementById('focus')); 
                
var option = {
    title: {
        text: 'What I focus on...',
    },
    tooltip: {
        show: true
    },
    series: [{
        name: 'focus on',
        type: 'wordCloud',
        size: ['100%', '100%'],
        textRotation : [0, -45, 45, -90],
        textPadding: 0,
        autoSize: {
            enable: true,
            minSize: 14
        },
        data: list       
    }]
};
        
                // 为echarts对象加载数据 
                myChart.setOption(option); 
            }
        );
    </script>
</html>