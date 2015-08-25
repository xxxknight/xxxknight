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

    <div class="container" id="primary">
      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo ($detail["title"]); ?></h2>
            <div class="blog-post-meta">
            <span>分类： <?php echo ($detail["typeid"]); ?></span>
            <!-- <span class="link_view">1000000</span> -->
            <span class="blog-span-right"><?php echo ($detail["createtime"]); ?> view:<?php echo ($detail["viewnum"]); ?> 
              comments:<?php echo ($detail["commentnum"]); ?></span>

            </div>
            <div class="blog-post-badge"><span class="badge"><?php echo ($detail["tag1"]); ?></span>
              <span class="badge"><?php echo ($detail["tag2"]); ?></span>
              <span class="badge"><?php echo ($detail["tag3"]); ?></span>
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
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
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