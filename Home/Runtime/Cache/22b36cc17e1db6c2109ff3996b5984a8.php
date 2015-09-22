<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="xxxknight's blog">
<meta name="author" content="xxxknight">
<link rel="icon" href="__IMG__/icons/favicon.ico">

<title>搜索</title>


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
<link type="text/css" rel="stylesheet" href="__CSS__/Search/search.css"/>

<script type="text/javascript">
	$(function(){
      $("#keyword").val('<?php echo ($keyword); ?>');
      $("#rank0").width("<?php echo ($rSearch[0][num]/$sSearch*100); ?>"+"%");
      $("#rank1").width("<?php echo ($rSearch[1][num]/$sSearch*100); ?>"+"%");
      $("#rank2").width("<?php echo ($rSearch[2][num]/$sSearch*100); ?>"+"%");
      $("#rank3").width("<?php echo ($rSearch[3][num]/$sSearch*100); ?>"+"%");
      $("#rank4").width("<?php echo ($rSearch[4][num]/$sSearch*100); ?>"+"%");
	});

</script>

<script src="__JS__/Search/search.js"></script>
</head>

<!-- NAVBAR
================================================== -->
<body>	
<div class="container">
	<div class="row main">
		<div class="col-xs-12 col-sm-6">
        <form class="form-horizontal" action="__URL__/search">
            <div class="form-group">
              <div class="input-group">
                <input type="text" class="form-control" id="keyword" name="keyword">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="submit">搜索一下</button>
                </span>

              </div>
            </div>
        </form>
		</div>
    
        <div id ="backto"><a href="__APP__">回到首页</a></div>
	</div>
    
</div>

<div id="type">
      <span class="box"><a>文章</a></span>
      <span class="box"><a>图片</a></span>
      <span class="box"><a>视频</a></span>
</div>

<div class="container">
<div id="totalnum">为您找到相关结果<?php echo ($count); ?>个</div>
    <div class="row main">

      <div class="col-xs-12 col-sm-7">
          <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="result">
              <div class="result-title">
                <a href = "__APP__/Article/detailArt/id/<?php echo ($vo["id"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a>
              </div>
              <div class="result-content">
                <?php echo ($vo["summary"]); ?>
              </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
          <div id="show"><?php echo ($show); ?></div>
      </div>
      <div class="col-xs-12 col-sm-5">
      

      <h4>搜索排行</h4>
        <div class="progress progress-striped active">
           &nbsp;<?php echo ($rSearch[0]['name']); ?>
          <div id= "rank0" class="progress-bar">
            <?php echo ($rSearch[0]['num']); ?>
          </div>
        </div>


        <div class="progress progress-striped active">
          &nbsp;<?php echo ($rSearch[1]['name']); ?>
          <div id="rank1" class="progress-bar progress-bar-info">
            <?php echo ($rSearch[1]['num']); ?>
          </div>
        </div>

        <div class="progress progress-striped active">
          &nbsp;<?php echo ($rSearch[2]['name']); ?>
          <div id="rank2" class="progress-bar progress-bar-success">
            <?php echo ($rSearch[2]['num']); ?>
          </div>
        </div>

        <div class="progress progress-striped active">
          &nbsp;<?php echo ($rSearch[3]['name']); ?>
          <div id="rank3" class="progress-bar progress-bar-warning">
            <?php echo ($rSearch[3]['num']); ?>
          </div>
        </div>

        <div class="progress progress-striped active">
          &nbsp;<?php echo ($rSearch[4]['name']); ?>
          <div id="rank4" class="progress-bar progress-bar-danger">
              <?php echo ($rSearch[4]['num']); ?>
          </div>
        </div>
        <h4>猜你想搜</h4>
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
</body>

</html>