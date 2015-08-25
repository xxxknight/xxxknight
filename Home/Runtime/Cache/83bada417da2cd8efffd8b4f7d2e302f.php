<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="zh-CN">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">

<title>video detail</title>


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

<!-- Custom styles for this template -->
<link href="__CSS__/Classification/detail.css" rel="stylesheet">

  </head>

  <body>
<div id="press-in">
loading...
</div>
  </body>
<script type="text/javascript" src="__CSS__/Classification/jquery.more.js"></script>
<script>
$(function(){
    $("#press-in").load("__URL__/wppress .press-recent-mk",function(){
    $("#press-in").append('<div style="float:right;margin-right:10px;cursor:pointer;margin-bottom:100px" class="ckm">Click More</div>');
});
var i =1;
$(".ckm").bind("click",function(){
    $(this).remove();
    $.getJSON("__URL__/wppress_json",{page:i},function(data){
    if(data.status==1){
    var str = ""; 
    $.each(data.data,function(index,array){ 
    var str ="1: "+array['id']+"2: "+array['vid']+"3: "+array['createtime']+"4: "+array['content']+"5: "+array['uid']+"end";
    $("#press-in").append(str);
}); 
$("#press-in").append('<span style="float:right;margin-right:10px;cursor:pointer;margin-bottom:100px" class="ckm">Click More</span>');
i++; 
}else{
$("#press-in").append('<span style="float:right;margin-right:10px;cursor:pointer;margin-bottom:100px" class="">End</span>');
}
});
});
})
</script>
</html>