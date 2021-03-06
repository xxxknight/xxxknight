<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="xxxknight's blog">
<meta name="author" content="xxxknight">
<link rel="icon" href="__IMG__/icons/favicon.ico">

<title>Article detail</title>


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
   <link href="__CSS__/Classification/article.css" rel="stylesheet" />
   <script type="text/javascript" src="__JS__/Classification/Adetail.js"></script>
   <script type="text/javascript">

  $(function() {
    $("#article").addClass("active");
    $.get('__URL__/incViewNum/aid/<?php echo ($detail["id"]); ?>');
  });
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



    <div class="container" id="primary">
      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo ($detail["title"]); ?></h2>
            <div class="blog-post-meta">
            <span>分类： <a href="__URL__/showArticles/type/<?php echo ($detail["typeid"]); ?>"><?php echo ($detail["atype"]["showname"]); ?></a></span>
            <span class="blog-span-right">
              <?php echo ($detail["createtime"]); ?>&nbsp;
              <span class="glyphicon glyphicon-eye-open"></span>
              <?php echo ($detail["viewnum"]); ?>&nbsp;
              <span class="glyphicon glyphicon-comment"></span> 
              <?php echo ($detail["commentnum"]); ?>
            </span>

            </div>
            <div class="blog-post-badge">
              <span class="glyphicon glyphicon-tags"></span>&nbsp;
              <?php if(is_array($taglist)): $i = 0; $__LIST__ = $taglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>&nbsp;<span class="badge"><?php echo ($vo); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            
            <p class="blog-post-content">
            <?php echo ($detail["content"]); ?>
            </p>
           
          </div><!-- /.blog-post -->

            <div class="pager">
              <?php if(!empty($prev)): ?><div class="pager-prev">
                  <a class="btn btn-primary" href="__URL__/detailArt/id/<?php echo ($prev["id"]); ?>"><<上一篇</a>
                  <a class="pager-title" href="__URL__/detailArt/id/<?php echo ($prev["id"]); ?>"><?php echo ($prev["title"]); ?></a>
              </div><?php endif; ?>
              
              <?php if(!empty($after)): ?><div class="pager-after">
                  <a class="btn btn-primary" href="__URL__/detailArt/id/<?php echo ($after["id"]); ?>">下一篇>></a>
                  <a class="pager-title" href="__URL__/detailArt/id/<?php echo ($after["id"]); ?>"><?php echo ($after["title"]); ?></a>
                </div><?php endif; ?>
            </div> 
            <div class="comments-title"><h4>评论列表</h4></div>
                 <div id="pagecount"></div>
                 <hr/>
                 <div id="comments">
                      
                 </div>
              
          <div class="sub-comment">
            <div class="sub-title">Submit Comment (no more than 200 words)</div>
            <input type="hidden" id="sub-aid" value="<?php echo ($detail["id"]); ?>" /> 
            <textarea rows="8" cols="71" id="sub-content" placeholder="欢迎吐槽......"></textarea>
            <div class="sub-btn text-right">
              <button id="sub" class="btn btn-primary" value="submit">submit</button>
            </div>
          </div>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About <?php echo ($detail["atype"]["showname"]); ?></h4>
            <p><?php echo ($detail["atype"]["description"]); ?></p>
          </div>
          <div class="sidebar-module">
            <h4>相关文章</h4>
            <ol class="list-unstyled">
                <?php if(is_array($otherArts)): foreach($otherArts as $key=>$vo): ?><li><a href="__URL__/detailArt/id/<?php echo ($vo["id"]); ?>">
                    <div class="overflow-title"><?php echo ($vo["title"]); ?></div></a>
                  </li><?php endforeach; endif; ?>
              
            </ol>
          </div>
          
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

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
    </div><!-- /.container -->

   <!-- Bootstrap core JavaScript ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
	
	<script src="__ROOT__/Plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
	<script src="__ROOT__/Resources/assets/js/vendor/holder.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="__ROOT__/Resources/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
<script type="text/javascript">
var aid ='<?php echo ($detail["id"]); ?>';
var curPage = 1; //当前页码
var total,pageSize,totalPage;
//获取数据
function getData(page){
  $.ajax({
    type: 'GET',
    url: '__URL__/showAcomment',
    data: {'pageNum':page-1,'aid':aid},
    dataType:'json',
    beforeSend:function(){
       $("#comments").append("<div id='loading'><img src='__IMG__/loader.gif'/></div>");
    },
    success:function(json){
      $("#comments").empty();
      if (!json.list) {
        var empty="<div class='empty'>暂无评论</div><hr/>";
        $("#comments").append(empty);
        return;
      };
      
      total = json.total; //总记录数
      pageSize = json.pageSize; //每页显示条数
      curPage = page; //当前页
      totalPage = json.totalPage; //总页数
      var item = "";
      var list = json.list;
      $.each(list,function(index,array){ //遍历json数据列
        item += "<div id='c-item'><div class='item-title'>"+array['username']+" in "+ array['createtime'] + "</div><div class='item-body'>"+ array['content'] + "</div></div><hr/>";
      });
      $("#comments").append(item);
      getPageBar();//生成分页条
    },
    complete:function(){
      
    },
    error:function(){
      alert("数据加载失败");
    }
  });
}

//获取分页条
function getPageBar(){
  //页码大于最大页数
  if(curPage>totalPage) curPage=totalPage;
  //页码小于1
  if(curPage<1) curPage=1;
  pageStr = "<span>共"+total+"条</span>&nbsp;<span>"+curPage+"/"+totalPage+"</span>&nbsp;";
  
  //如果是第一页
  if(curPage==1){
    pageStr += "<span>首页</span>&nbsp;<span>上一页</span>&nbsp;";
  }else{
    pageStr += "<span><a href='javascript:void(0)' rel='1'>首页</a></span>&nbsp;"
    +"<span><a href='javascript:void(0)' rel='"+(curPage-1)+"'>上一页</a></span>&nbsp;";
  }
  
  //如果是最后页
  if(curPage>=totalPage){
    pageStr += "<span>下一页</span>&nbsp;<span>尾页</span>";
  }else{
    pageStr += "<span><a href='javascript:void(0)' rel='"+(parseInt(curPage)+1)+"'>下一页</a></span>"
    +"&nbsp;<span><a href='javascript:void(0)' rel='"+totalPage+"'>尾页</a></span>";
  }
    
  $("#pagecount").html(pageStr);
}

$(function(){
    getData(1);
    $("body").on('click',"#pagecount span a",function(){
    var rel = $(this).attr("rel");
    if(rel){
      getData(rel);
    }
  });
});
</script>
</html>