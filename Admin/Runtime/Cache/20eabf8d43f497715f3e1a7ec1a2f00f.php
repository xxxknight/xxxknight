<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="zh-CN">
<head>
admin<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="xxxknight's blog">
<meta name="author" content="xxxknight">
<link rel="icon" href="__IMG__/icons/favicon.ico">

<title>Admin manage</title>


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
<link href="__CSS__/Admin/Index/index.css" rel="stylesheet">

<script type="text/javascript">
$(function(){
    $("#li-index").addClass("active");  
});
</script>
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
                        
                <h3 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> 
                    基本参数
                </h3>
                <div class="row placeholders">
                    <div class="col-xs-6 col-sm-4 placeholder">
                        <div id="ec1" class="ec-pic" style="height:300px"></div>
                        <span class="text-muted">在线人数</span>
                    </div>

                    <div class="col-xs-6 col-sm-4 placeholder">
                        <div id="ec2" class="ec-pic" style="height:300px"></div>
                        <span class="text-muted">注册人数</span>
                    </div>

                    <div class="col-xs-6 col-sm-4 placeholder">
                        <div id="ec3" class="ec-pic" style="height:300px"></div>
                        <span class="text-muted">负载率</span>
                    </div>

            </div>

        </div>
    </div>
<!-- ECharts单文件引入 -->
<script src="__ROOT__/Plugins/echarts/echarts.js"></script>
<script type="text/javascript">
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
    'echarts/chart/gauge' // 使用柱状图就加载bar模块，按需加载
],
function (ec) {
    // 基于准备好的dom，初始化echarts图表
    var myChart1 = ec.init(document.getElementById('ec1')); 
    var myChart2 = ec.init(document.getElementById('ec2')); 
    var myChart3 = ec.init(document.getElementById('ec3')); 

    var option1 = {
        tooltip : {
            formatter: "{a} <br/>{b} : {c}"
        },
        series : [
            {
            name:'在线人数统计',
            max: 500,
            min: 0,
            type:'gauge',
            // detail : {formatter:'{value}%'},
            data:[{value: 500, name: '在线人数'}],

            }
        ]
    };
    var option2 = {
        tooltip : {
            formatter: "{a} <br/>{b} : {c}"
        },
        series : [
            {
            name:'注册人数统计',
            type:'gauge',
            max: 1000,
            //detail : {formatter:'{value}%'},
            data:[{value: 500, name: '注册人数'}]
            }
        ]
    };

    var option3 = {
        tooltip : {
            formatter: "{a} <br/>{b} : {c}%"
        },
        series : [
            {
            name:'负载指标',
            type:'gauge',
            detail : {formatter:'{value}%'},
            data:[{value: 50, name: '负载率'}]
            }
        ]
    };
                            
    // 为echarts对象加载数据 
    myChart1.setOption(option1); 
    myChart2.setOption(option2); 
    myChart3.setOption(option3); 
    }
);
</script>
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