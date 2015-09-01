<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="zh-CN">
<head>
admin<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="xxxknight's blog">
<meta name="author" content="xxxknight">
<link rel="icon" href="__IMG__/icons/favicon.ico">

<title>创建新博文</title>


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
<link href="__CSS__/Admin/Article/newArt.css" rel="stylesheet">

<!-- ueditor插件 -->
<script type="text/javascript" charset="utf-8" src="__ROOT__/Plugins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__ROOT__/Plugins/ueditor/ueditor.all.min.js">
</script>

<!-- tag插件 -->
<link rel="stylesheet" type="text/css" href="__ROOT__/Plugins/tag/css/jquery.tagsinput.css" />
<script type="text/javascript" src="__ROOT__/Plugins/tag/js/jquery.tagsinput.js"></script>
<script type='text/javascript' src='__ROOT__/Plugins/tag/js/jquery-ui.min.js'></script>
<link rel="stylesheet" type="text/css" href="__ROOT__/Plugins/tag/css/jquery-ui.css" />

<script type="text/javascript">
var ue = UE.getEditor('editor');
$(function(){
    // $("#li-article").addClass("active");
    $("#articleModule>ul>li:first-child").addClass("active");
    $("#articleModule").addClass("in");
    $("#li-article>a>span").removeClass("glyphicon-chevron-left").addClass("glyphicon-chevron-down");
});

</script>

<script type="text/javascript" src="__JS__/Admin/Article/newArt.js"></script>
</head>
<!-- NAVBAR
================================================== -->
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
                <li><a href="#"><i class="glyphicon glyphicon-user"></i>
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
            <i class="glyphicon glyphicon-picture"></i>
            相册模块
            <span class="pull-right glyphicon glyphicon-chevron-left"></span>
        </a>
        <div id="albumModule" class="collapse">
            <ul class="nav nav-sidebar secondmenu">
                <li>
                    <a href="#"><i class="glyphicon glyphicon-camera"></i>
                    创建新相册
                    </a>
                </li>
                <li>
                    <a href="#"><i class="glyphicon glyphicon-th-list"></i>
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
        <a href="#">
            <i class="glyphicon glyphicon-wrench"></i>
            关于系统
        </a>
    </li>

</ul>


   

        </div>
        <div id="mainpart" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <ol class="breadcrumb">
              <span>您的位置：</span>
              <li><a>文章模块</a></li>
              <li class="active">创建新文章</li>
            </ol> 
            <h3 class="page-header"><i class="glyphicon glyphicon-pencil"></i>
               创建新文章
            </h3>
            <div id="art">
              <form class="form-horizontal">
                <fieldset>
                    <div class="form-group">
                      <label for="title" class="col-lg-1 control-label">标题</label>
                      <div class="col-lg-7">
                        <input type="text" class="form-control" id="title" placeholder="title" maxlength="64"/>
                      </div>
                      <div class="col-lg-3 hint help-block">
                        注：标题为1到64个字符.
                      </div>
                    </div>
                </fieldset>
              </form>
              <script id="editor" type="text/plain" style="height:500px;"></script>
              <br/>
             
              <div class="form-group">
                  <div class="col-lg-3">
                      <button class="btn btn-primary" id="btnSave">
                        保存
                      </button>
                        &nbsp;
                      <!-- <button class="btn btn-info" id="btnPreview">
                        预览
                      </button>
                        &nbsp; -->
                      <button class="btn btn-danger" id="btnReset">
                        清空
                      </button>
                  </div>
              </div>
            </div>
       
        </div>
      </div>
    </div>

    <div class="modal" id="saveModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"
              id="btnClose">
              <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">
              编辑文章信息
            </h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal">
                <fieldset>
                    <div class="form-group">
                      <label for="dump-title" class="col-lg-2 control-label">标题</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="dump-title" readonly="">
                      </div>
                    </div>

                    <div class="form-group">
                        <label for="class" class="col-lg-2 control-label">文章类型</label>
                        <div class="col-lg-3">
                            <select class="form-control" id="class">
                              <option value="1">原创</option>
                              <option value="2">转载</option>
                              <option value="3">翻译</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type" class="col-lg-2 control-label">分类</label>
                        <div class="col-lg-4">
                            <select class="form-control" id="type">
                              <option value="">请选择分类</option>
                              <?php if(is_array($types)): foreach($types as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["showname"]); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">是否设置推荐</label>
                        <div class="col-lg-7">
                          <div class="radio">
                            <label>
                            <input type="radio" name="options" id="option0" value="0" checked="">
                            不设置为推荐文章（默认）
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                            <input type="radio" name="options" id="option1" value="1">
                            设置为推荐文章
                            </label>
                          </div>
                          <span class="help-block">注：设置为推荐的文章将显示在文章首页推荐栏目.</span>
                        </div>
                       
                    </div>

                    <div class="form-group">
                        <label for="type" class="col-lg-2 control-label">添加标签</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control tags" id="t1"/>

                            <div id="tag-list">

                                <?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span class="label label-info tag-span"><?php echo ($vo["name"]); ?> <i>+</i></span>
                                &nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>

                            </div>
                        </div>
                       
                    </div>
   
                </fieldset>
              </form>
           
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" id="btnCommit">
              确认提交
            </button>
            
            <button class="btn btn-danger" data-dismiss="modal" id="btnCancel"
              aria-hidden="true">
              返回
            </button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

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