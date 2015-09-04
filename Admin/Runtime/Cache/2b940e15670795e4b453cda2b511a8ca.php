<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="zh-CN">
<head>
admin<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="xxxknight's blog">
<meta name="author" content="xxxknight">
<link rel="icon" href="__IMG__/icons/favicon.ico">

<title>编辑相册</title>


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

<!-- Custom styles for this template -->
<link href="__CSS__/Admin/common.css" rel="stylesheet">
<link href="__CSS__/Admin/Album/module.css" rel="stylesheet">
<script type="text/javascript">
$(function(){
    $("#albumModule>ul>li:nth-child(3)").addClass("active");
    $("#albumModule").addClass("in");
    $("#li-album>a>span").removeClass("glyphicon-chevron-left").addClass("glyphicon-chevron-down");

    $("#albumid").val('<?php echo ($album["id"]); ?>');
    $("#name").val('<?php echo ($album["name"]); ?>');
    $("#summary").val('<?php echo ($album["summary"]); ?>');
});
</script>
<script type="text/javascript" src="__JS__/Admin/Album/editAlbum.js"></script>
</head>

<body>
 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="pull-left"><img src="__IMG__/admin/login/xk.png" style="width:50px;height:50px">
          </span>
          <a class="navbar-brand" href="#">&nbsp; xxxknight's muse</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown" style="margin-right:20px">
              <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" 
              href="<?php echo $_SESSION['admin']['id'] ?>">
                <?php echo session('adminname');?>
              </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="min-width:100px;">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="__APP__/System/profile">
                    <i class="glyphicon glyphicon-user"></i>
                    个人中心</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="__APP__/Login/logout">
                    <i class="glyphicon glyphicon-off"></i>
                    注销</a></li>
                </ul>
            </li>
          </ul>
        </div>
      </div>
</nav>


    <div class="container-fluid">
        <div class="row">
        
            <div class="col-sm-3 col-md-2 sidebar">
              <ul id="main-nav" class="nav nav-sidebar">
    <li id="li-index">
        <a href="__APP__">
            <i class="glyphicon glyphicon-home"></i> 
            首页
        </a>
    </li>
    <li id="li-system">
        <a href="#systemModule" class="nav-header collapsed" data-toggle="collapse">
            <i class="glyphicon glyphicon-cog"></i>
            系统管理
            <span class="pull-right glyphicon glyphicon-chevron-left"></span>
        </a>
        <div id="systemModule" class="collapse">
            <ul class="nav nav-sidebar secondmenu">
                <li><a href="__APP__/Account/index"><i class="glyphicon glyphicon-user"></i>
                    用户管理</a>
                </li>
                <li><a href="#"><i class="glyphicon glyphicon-th-list"></i>
                    菜单管理</a>
                </li>
                <li><a href="#"><i class="glyphicon glyphicon-asterisk"></i>
                    角色管理</a>
                </li>
                <li><a href="__APP__/System/profile"><i class="glyphicon glyphicon-edit"></i>
                    个人中心</a>
                </li>
                <li><a href="__APP__/Contact/contact"><i class="glyphicon glyphicon-phone"></i>
                    问题反馈</a>
                </li>
                <li><a href="#"><i class="glyphicon glyphicon-eye-open"></i>
                    日志查看</a>
                </li>
            </ul>
        </div>
    </li>


    <li id="li-article">
        <a href="#articleModule" class="nav-header collapsed" data-toggle="collapse">
            <i class="glyphicon glyphicon-book"></i>
            文章模块
            <span class="pull-right glyphicon glyphicon-chevron-left"></span>
        </a>
        <div id="articleModule" class="collapse">
            <ul class="nav nav-sidebar secondmenu">
                <li>
                    <a href="__APP__/Article/createArt"><i class="glyphicon glyphicon-pencil"></i>
                    创建新文章
                    </a>
                </li>
                <li>
                    <a href="__APP__/Article/manageArt"><i class="glyphicon glyphicon-th-list"></i>
                    文章管理
                    </a>
                </li>
                <li>
                    <a href="__APP__/Article/comment"><i class="glyphicon glyphicon-comment"></i>
                    评论管理
                    </a>
                </li>
                <li>
                    <a href="__APP__/Article/cloud"><i class="glyphicon glyphicon-cloud"></i>
                    词云管理
                    </a>
                </li>

                <li>
                    <a href="__APP__/Article/tag"><i class="glyphicon glyphicon-tag"></i>
                    标签管理
                    </a>
                </li>

                <li>
                    <a href="__APP__/Article/arttype"><i class="glyphicon glyphicon-th"></i>
                    分类管理
                    </a>
                </li>


            </ul>
        </div>
    </li>

    <li id="li-album">
        <a href="#albumModule" class="nav-header collapsed" data-toggle="collapse">
            <i class="glyphicon glyphicon-camera"></i>
            相册模块
            <span class="pull-right glyphicon glyphicon-chevron-left"></span>
        </a>
        <div id="albumModule" class="collapse">
            <ul class="nav nav-sidebar secondmenu">
                <li>
                    <a href="__APP__/Album/uploadPic"><i class="glyphicon glyphicon-picture"></i>
                    上传照片
                    </a>
                </li>
                <li>
                    <a href="__APP__/Album/createAlbum"><i class="glyphicon glyphicon-camera"></i>
                    创建新相册
                    </a>
                </li>
                <li>
                    <a href="__APP__/Album/manageAlbum"><i class="glyphicon glyphicon-th-list"></i>
                    相册管理
                    </a>
                </li>
                <li>
                    <a href="#"><i class="glyphicon glyphicon-th"></i>
                    模块管理
                    </a>
                </li>

            </ul>
        </div>
    </li>



    <li id="li-video">
        <a href="#videoModule" class="nav-header collapsed" data-toggle="collapse">
            <i class="glyphicon glyphicon-facetime-video"></i>
            视频模块
            <span class="pull-right glyphicon glyphicon-chevron-left"></span>
        </a>
        <div id="videoModule" class="collapse">
            <ul class="nav nav-sidebar secondmenu">
                <li>
                    <a href="#"><i class="glyphicon glyphicon-film"></i>
                    视频管理
                    </a>
                </li>
                <li>
                    <a href="#"><i class="glyphicon glyphicon-th"></i>
                    模块管理
                    </a>
                </li>
            </ul>
        </div>
    </li>
    
    <li id="li-export">
        <a href="./plans.html">
            <i class="glyphicon glyphicon-credit-card"></i>
            导出模块        
        </a>
    </li>
                
    <li id="li-analytics">
        <a href="./charts.html">
            <i class="glyphicon glyphicon-calendar"></i>
            分析统计
        </a>
    </li>
    
    <li id="li-about">
        <a href="__APP__/About/about">
            <i class="glyphicon glyphicon-wrench"></i>
            关于系统
        </a>
    </li>

</ul>


   

            </div>
            <div id="mainpart" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <ol class="breadcrumb">
                  <span>您的位置：</span>
                  <li><a>相册模块</a></li>
                  <li><a href="__URL__/manageAlbum">相册管理</a></li>
                  <li class="active">管理相册</li>
                </ol> 
                        
                <h3 class="page-header"><i class="glyphicon glyphicon-edit"></i> 
                    管理相册——<?php echo ($album["name"]); ?> (共<?php echo ($album["imgnum"]); ?>张照片)
                </h3>
                <div class="btngroup">
                    <button class="btn btn-success">
                        上传照片
                    </button>
                    <button class="btn btn-primary" id="updateAlbum">
                        编辑相册
                    </button>
                    <button class="btn btn-danger" id="deleteAlbum">
                        删除相册
                    </button>

                </div>
                <hr/>
                <div id="showlist">
                    <?php if(is_array($picturelist)): $i = 0; $__LIST__ = $picturelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-xs-6 col-md-3" style="height:250px;">
                            <div class="pic" style="overflow:hidden;">
                                <a href="#modal<?php echo ($vo["id"]); ?>" data-toggle="modal" class="thumbnail">
                                    <img alt="<?php echo ($vo["title"]); ?>" src="<?php echo ($vo["link"]); ?>"/>
                                    <div class="pic-text"><?php echo ($vo["title"]); ?></div>
                                </a>

                            </div>
                        </div>
                        <div class="modal" id="modal<?php echo ($vo["id"]); ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">编辑照片——<?php echo ($vo["title"]); ?></h4>
                                    </div>
                                    <form class="form-horizontal" action="__URL__/updatePicture" method="post">
                                    <div class="modal-body">
                                       
                                            <input type="hidden" name="tid" value="<?php echo ($vo["typeid"]); ?>"/>
                                            <input type="hidden" name="pid" value="<?php echo ($vo["id"]); ?>"/>
                                            <div class="form-group">
                                                <label for="title" class="col-lg-2 control-label">标题</label>
                                                <div class="col-lg-7">
                                                    <input type="text" value="<?php echo ($vo["title"]); ?>" class="form-control" id="title" placeholder="title" required maxlength="20">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="alt"  class="col-lg-2 control-label">替代文字</label>
                                                <div class="col-lg-7">
                                                    <input type="text" value="<?php echo ($vo["alt"]); ?>" class="form-control" id="alt" placeholder="alt" maxlength="20">
                                                </div>
                                            </div>    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" onclick="javascript:deletePicture(<?php echo ($vo["id"]); ?>)">删除
                                        </button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                        <button type="submit" class="btn btn-primary">更新</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>

<div class="alert alert-dismissible alert-danger" style="width:300px; position:fixed;" id="delete-alert">
  <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
</div>
                
            </div>
        </div>
    </div>

<div class="modal" id="albumModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">编辑相册基本参数</h4>
            </div>
            <form class="form-horizontal" action="__URL__/saveUpdateAlbum" enctype="multipart/form-data" method="post">
            <div class="modal-body">
                        <input type="hidden" id="albumid" name="albumid"/>
                
                        <div class="form-group">
                            <label for="name" class="col-lg-2 control-label">相册名</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="name" name="name" placeholder="相册名" required/>
                            </div>
                            <div class="col-lg-4 hint help-block">
                                注：相册名为1到20个字符.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cover" class="col-lg-2 control-label">封面图</label>
                            <div class="col-lg-6">
                                <input type="file" class="form-control" id="cover" name="cover"/>
                            </div>
                            <div class="col-lg-4 hint help-block">
                                注：封面为240px*180px.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="summary" class="col-lg-2 control-label">相册描述</label>
                            <div class="col-lg-6">
                                <textarea class="form-control" rows="4" id="summary" name="summary"></textarea>
                            </div>
                            <div class="col-lg-4 hint help-block">
                                注：描述不超过50个字符.
                            </div>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary" onclick="return checkSaveUpdateAlbum()">更新</button>
            </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- Bootstrap core JavaScript ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
	
	<script src="__ROOT__/Plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
	<script src="__ROOT__/Resources/assets/js/vendor/holder.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="__ROOT__/Resources/assets/js/ie10-viewport-bug-workaround.js"></script>

	<script src="__JS__/Admin/common.js">


</body>

</html>