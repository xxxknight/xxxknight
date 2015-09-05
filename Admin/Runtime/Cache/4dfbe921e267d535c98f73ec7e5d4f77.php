<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="zh-CN">
<head>
admin<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="xxxknight's blog">
<meta name="author" content="xxxknight">
<link rel="icon" href="__IMG__/icons/favicon.ico">

<title>词云管理</title>


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
<link href="__CSS__/Admin/Article/module.css" rel="stylesheet">

<script type="text/javascript">
	$(function(){
    $("#articleModule>ul>li:nth-child(4)").addClass("active");
    $("#articleModule").addClass("in");
    $("#li-article>a>span").removeClass("glyphicon-chevron-left").addClass("glyphicon-chevron-down");
     
	});

</script>
<script type="text/javascript" src="__JS__/Admin/Article/cloud.js"></script>
<script type="text/javascript" src="__JS__/Admin/Article/page-cloud.js"></script>

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
                <span class="caret"></span>
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
              <li><a>文章模块</a></li>
              <li class="active">词云管理</li>
            </ol>
           
            <h3 class="page-header"><i class="glyphicon glyphicon-cloud"></i> 
                词云管理
            </h3>
            <button class="btn btn-primary" id="btn-keyword">增加关键字</button>
            <div class="table-responsive">
                <table class="table table-striped" id="keywordlist">
                    <thead>
                      <tr>
                        <th width="30%">关键词名称</th>
                        <th widht="15%">关键值</th>
                        <th width="15%">类别</th>
                        <th width="20%">是否启用</th>
                        <th width="20%">操作</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div id="pagecount"></div>
            </div>
        </div>
      </div>
    </div>

<div class="modal" id="keywordModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"
              id="btnClose">
              <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title" id="kw-title">
              新增关键字
            </h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal">
                <fieldset>
                    <input id="kid" type="hidden" />
                    <div class="form-group">
                      <label for="name" class="col-lg-3 control-label">关键词名称</label>
                      <div class="col-lg-6">
                        <input type="text" class="form-control" id="name" maxlength="20">
                        <span class="help-block">注：关键字名称为1到20个字符.</span>
                      </div>
                      <div class="col-lg-3" id="tip">
                      </div>
                    
                    </div>

                    <div class="form-group">
                      <label for="value" class="col-lg-3 control-label">关键值</label>
                      <div class="col-lg-6">
                        <input type="text" class="form-control" id="value">
                        <span class="help-block">注：关键值越大则显示越大，可为1~9999999范围内的任意数值.</span>
                      </div>
                    </div>

                    <div class="form-group">
                        <label for="type" class="col-lg-3 control-label">分类</label>
                        <div class="col-lg-4">
                            <select class="form-control" id="type">
                              <option value="0">全部</option>
                              <?php if(is_array($types)): foreach($types as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["showname"]); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">是否启用</label>
                        <div class="col-lg-6">
                          <div class="radio">
                            <label>
                            <input type="radio" name="options" id="option1" value="1">
                            启用（默认）
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                            <input type="radio" name="options" id="option0" value="0">
                            不启用
                            </label>
                          </div>
                          <span class="help-block">注：启用的关键字将显示在文章首页.</span>
                        </div>
                       
                    </div>

                </fieldset>
              </form>
           
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" id="btnSave">
              保存
            </button>
            <button class="btn btn-primary" id="btnUpdate">
              更新
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