<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="zh-CN">
<head>
admin<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="xxxknight's blog">
<meta name="author" content="xxxknight">
<link rel="icon" href="__IMG__/icons/favicon.ico">

<title>导出模块</title>


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
<link href="__CSS__/Admin/Export/module.css" rel="stylesheet">
<script type="text/javascript" src="__ROOT__/Plugins/date97/WdatePicker.js"></script>
<!-- Include the plugin's CSS and JS: -->
<script type="text/javascript" src="__ROOT__/Plugins/multiselect/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="__ROOT__/Plugins/multiselect/bootstrap-multiselect.css" type="text/css"/>
<script type="text/javascript">
$(function(){
    $("#li-export").addClass("active");  
});

$(function(){
    $('#tables').multiselect({
         maxHeight: 300,
         buttonWidth: '230px',
         dropRight: true,

        buttonText: function(options, select) {
            if (options.length === 0) {
                return '请选择导出表...';
            }
            else if (options.length > 0) {
                return "已有 "+options.length+' 张表被选!';
            }
        }
        });
})

</script>

<script type="text/javascript" src="__JS__/Admin/Export/export.js"></script>
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
                    <a href="__APP__/Album/module"><i class="glyphicon glyphicon-th"></i>
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

    <li id="li-analytics">
        <a href="#analyticsModule" class="nav-header collapsed" data-toggle="collapse">
            <i class="glyphicon glyphicon-calendar"></i>
            分析统计
            <span class="pull-right glyphicon glyphicon-chevron-left"></span>
        </a>
        <div id="analyticsModule" class="collapse">
            <ul class="nav nav-sidebar secondmenu">
                <li>
                    <a href="__APP__/Analytics/analyseUser"><i class="glyphicon glyphicon-user"></i>
                    用户分析
                    </a>
                </li>
                <li>
                    <a href="__APP__/Analytics/analyseFlow"><i class="glyphicon glyphicon-fire"></i>
                    流量分析
                    </a>
                </li>
                <li>
                    <a href="__APP__/Analytics/analyseArticle"><i class="glyphicon glyphicon-book"></i>
                    文章统计
                    </a>
                </li>
            </ul>
        </div>
    </li>
    
    <li id="li-export">
        <a href="__APP__/export">
            <i class="glyphicon glyphicon-credit-card"></i>
            导出模块        
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
                  <li><a>导出模块</a></li>
                  <li class="active">数据导出</li>
                </ol> 
                        
                <h3 class="page-header"><i class="glyphicon glyphicon-credit-card"></i> 
                    数据导出
                </h3>

                <div id="search-part">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#user" data-toggle="tab">用户数据</a></li>
                        <li><a href="#article" data-toggle="tab">文章数据</a></li>
                        <li><a href="#database" data-toggle="tab">数据库导出</a></li>
                        <li><a href="#log" data-toggle="tab">日志导出</a></li>
                    </ul>
                    <div id="tab1" class="tab-content">
                        <div class="tab-pane fade active in" id="user">
                            <form class="form-horizontal" id="user-form">
                                <div class="form-group">
                                    <label for="user-starttime" class="col-lg-2 control-label">注册起始时间</label>
                                    <div class="col-lg-3">
                                        <input type="text" class="Wdate" id="user-starttime" placeholder="起始时间" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'user-endtime\')}'})"/>
                                    </div>
                                    <label for="user-endtime" class="col-lg-2 control-label">注册结束时间</label>
                                    <div class="col-lg-3">
                                        <input type="text" class="Wdate" id="user-endtime" placeholder="结束时间" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'user-starttime\')}',})" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">导出格式</label>
                                    <div class="col-lg-3">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="user-formmat" id="user-excel" value="0" checked="" />
                                                        excel格式
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="user-formmat" id="user-txt" value="1" />
                                                        txt格式
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                        <button type="submit" class="btn btn-primary" id="user-sub">Submit</button>
                                    </div>
                                </div>
                  
                            </form>

                            
                        </div>
                        <div class="tab-pane fade" id="article">
                            <form class="form-horizontal" id="database-form">
                                <div class="form-group">
                                    <label for="select" class="col-lg-2 control-label">选择导出表</label>
                                    <div class="col-lg-5">
                                        <select multiple="" size="10" class="form-control">
                                            <?php if(is_array($tables)): $i = 0; $__LIST__ = $tables;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="1">1</option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                       
                                    </div>

                                </div>

                            </form>
                        </div>
                        <div class="tab-pane fade" id="database">
                            <form class="form-horizontal" id="database-form">
                                <div class="form-group">
                                    <label for="select" class="col-lg-2 control-label">选择导出表</label>
                                    <div class="col-lg-3">
                                        <select multiple="multiple" id="tables" size="10" class="form-control">
                                            <?php if(is_array($tables)): $i = 0; $__LIST__ = $tables;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["t"]); ?>"><?php echo ($vo["t"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <!-- <button type="reset" class="btn btn-default">重置</button> -->
                                        <button type="button" class="btn btn-primary" id="db-sub">导出</button>
                                    </div>


                                </div>
                                <div class="col-lg-10 col-lg-offset-2">
                                       <label>注：导出格式为sql文件</label> 
                                </div>



                            </form>
                            
                        </div>
                        <div class="tab-pane fade" id="log">
                            <form class="form-horizontal" id="database-form">
                                <div class="form-group">
                                    <label for="select" class="col-lg-2 control-label">选择导出表</label>
                                    <div class="col-lg-5">
                                        <select multiple="" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button type="reset" class="btn btn-default">重置</button>
                                        <button type="submit" class="btn btn-primary" id="db-sub">导出</button>
                                        <button type="submit" class="btn btn-info" id="db-suball">导出全部</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                        <div id="common-part">
                            <form class="form-horizontal"Y>
                                
                            </form>
                            

                        </div>


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

	<script src="__JS__/Admin/common.js">


</body>

<script>

</script>
</html>