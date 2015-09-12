<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="zh-CN">
<head>
admin<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="xxxknight's blog">
<meta name="author" content="xxxknight">
<link rel="icon" href="__IMG__/icons/favicon.ico">

<title>上传照片</title>


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

<script src="__ROOT__/Plugins/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="__ROOT__/Plugins/uploadify/uploadify.css">
<script type="text/javascript">
$(function(){
    $("#albumModule>ul>li:nth-child(1)").addClass("active");
    $("#albumModule").addClass("in");
    $("#li-album>a>span").removeClass("glyphicon-chevron-left").addClass("glyphicon-chevron-down");
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

                <ol class="breadcrumb">
                  <span>您的位置：</span>
                  <li><a>相册模块</a></li>
                  <li class="active">上传照片</li>
                </ol> 

                <h3 class="page-header"><i class="glyphicon glyphicon-picture"></i> 
                    上传照片
                </h3>

                <form class="form-horizontal" id="form1">
                    <div class="form-group">
                        <label for="typeid" class="col-lg-2 control-label">所属相册</label>
                        <div class="col-lg-5">
                            <select class="form-control" id="typeid" required>
                                <option value="">请选择相册类别</option>
                                <?php if(is_array($albumTypeList)): foreach($albumTypeList as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                                
                            </select>
                        </div>
                        <div class="col-lg-5 hint help-block">
                                注：所属相册必填.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">照片名称</label>
                        <div class="col-lg-5">
                          <input type="text" class="form-control" id="title" placeholder="照片名称">
                        </div>
                        <div class="col-lg-5 hint help-block">
                                注：照片名可不填，默认为相册名，不超过20个字符.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alt" class="col-lg-2 control-label">替代文字</label>
                        <div class="col-lg-5">
                          <input type="text" class="form-control" id="alt" placeholder="替代文字">
                        </div>
                        <div class="col-lg-5 hint help-block">
                                注：替代文字可不填，默认为相册名，不超过20个字符.
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="queue" class="col-lg-2"></div>
                        <div class="col-lg-5">
                            <input id="file_upload" name="file_upload" type="file" multiple="true" required/>
                        </div>
                        <div class="col-lg-5 hint help-block">
                                注：按住ctrl可多选文件。
                        </div>
                    </div>
                    <div id="data"></div>
                </form>
            </div>
        </div>
    </div>

<script type="text/javascript">
$(function() {
    $('#file_upload').uploadify({
        'buttonText': "选择文件",
        'height' : 35,
        //'auto' : false,
        'swf'      : '__ROOT__/Plugins/uploadify/uploadify.swf',
        'uploader' : '__URL__/upload',
        'fileSizeLimit': '0',  
        'fileTypeExts': '*.gif; *.jpeg; *.jpg; *.png', 
        //'progressData': 'speed',  
        'onSelectError': function (file, errorCode, errorMsg) {  
            switch (errorCode) {  
                case -100:  
                    alert("上传的文件数量已经超出系统限制的" + jQuery('#file_upload').uploadify('settings', 'queueSizeLimit') + "个文件！");  
                    break;  
                case -110:  
                    alert("文件 [" + file.name + "] 大小超出系统限制的" + jQuery('#file_upload').uploadify('settings', 'fileSizeLimit') + "大小！");  
                    break;  
                case -120:  
                    alert("文件 [" + file.name + "] 大小异常！");  
                    break;  
                case -130:  
                    alert("文件 [" + file.name + "] 类型不正确！");  
                    break;  
            }  
        },  
        'onUploadStart': function (file) {

            var typeid = $("#typeid").val();

            if(!typeid){
                alert("请选择所属相册！");
                $("#file_upload").uploadify("cancel", "*");
                return false;
            }
            var typename = $("#typeid").find('option:selected').text().trim();

            $("#file_upload").uploadify("settings", "formData", {
                'typename' : typename,
                'typeid' : $("#typeid").val(),
                'title' : $("#title").val().trim(),
                'alt' : $("#alt").val().trim(),
            });  
            //在onUploadStart事件中，也就是上传之前，把参数写好传递到后台。  
        },

        'onUploadSuccess':function(file,data,response){
                //alert(data);
                // $("#data").html(data);
                // //$("#form1")[0].reset();
                // if(data !=1){
                //     alert(data);
                // }
        }

    });
    
});
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