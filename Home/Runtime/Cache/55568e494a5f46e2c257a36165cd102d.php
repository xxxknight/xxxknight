<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="xxxknight's blog">
<meta name="author" content="xxxknight">
<link rel="icon" href="__IMG__/icons/favicon.ico">

<title>Picture</title>


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
<link type="text/css" rel="stylesheet" href="__ROOT__/Plugins/TN3/TN3.css"/>

<script type="text/javascript">
	$(function(){
		//$("#navbar ul li").removeClass("active");
	    $("#album").addClass("active");
	});

</script>
</head>

<body>
<!-- 代码 开始 -->
<div id="content">
    <div class="mygallery clearfix">
    
	<div class="tn3 album">
	    <!-- <h4>Fixed Dimensions</h4>
	    <div class="tn3 description">Images with fixed dimensions</div>
	    <div class="tn3 thumb">images/35x35/1.jpg</div> -->
	    <ol>
		    <?php if(empty($list)): ?><li>
		    		<a href="__IMG__/pictures/default.jpg">
						<img src="__IMG__/pictures/default.jpg"/>
					</a>
		    	</li>
		    <?php else: ?> 
			    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
				        <h4><?php echo ($vo["title"]); ?></h4>
				        <div class="tn3 description"><?php echo ($vo["remark"]); ?></div>
					        <a href="<?php echo ($vo["link"]); ?>">
						    	<img src="<?php echo ($vo["link"]); ?>"/>
					        </a>
				    </li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
	    </ol>
	</div>
	
    </div>
</div>
<div id="close"></div>
<!-- Bootstrap core JavaScript ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
	
	<script src="__ROOT__/Plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
	<script src="__ROOT__/Resources/assets/js/vendor/holder.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="__ROOT__/Resources/assets/js/ie10-viewport-bug-workaround.js"></script>

<script src="__ROOT__/Plugins/TN3/jquery.tn3lite.min.js"></script>
<script>
$(document).ready(function() {
	var tn1 = $('.mygallery').tn3({
		skinDir:"skins",
		imageClick:"fullscreen",
		image:{
		maxZoom:1.5,
		crop:true,
		clickEvent:"dblclick",
		transitions:[{
		type:"blinds"
		},{
		type:"grid"
		},{
		type:"grid",
		duration:460,
		easing:"easeInQuad",
		gridX:1,
		gridY:8,
		// flat, diagonal, circle, random
		sort:"random",
		sortReverse:false,
		diagonalStart:"bl",
		// fade, scale
		method:"scale",
		partDuration:360,
		partEasing:"easeOutSine",
		partDirection:"left"
		}]
		}
	});
	$(".tn3-prev-page").click(function(){
		location.href="__URL__/showAlbum/type/<?php echo ($previd); ?>";
	});

	$(".tn3-next-page").click(function(){
		location.href="__URL__/showAlbum/type/<?php echo ($lastid); ?>";
	});

	$("#close").click(function(){
		location.href="__URL__/albumlist";
	})

});
</script>
<!-- 代码 结束 -->

</body>

</html>