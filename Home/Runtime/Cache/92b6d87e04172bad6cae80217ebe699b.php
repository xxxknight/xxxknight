<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">

<title>Album</title>


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
<link href="__CSS__/Album/showAlbum.css" rel="stylesheet">

<script type="text/javascript">
  var type = '<?php echo ($type); ?>';

  $(function() {
    //$("#navbar ul li").removeClass("active");
    $("#classi").addClass("active");
  })
</script>

<style type="text/css">
</style>


<script type="text/javascript">
	window.onload = function() {
		//运行瀑布流主函数
		PBL('wrap', 'box');

		//模拟数据
		var data = eval(<?php echo ($data); ?>);

		//设置滚动加载
		window.onscroll = function() {
			//校验数据请求
			if (getCheck()) {
				var wrap = document.getElementById('wrap');
				for (i in data) {
					//创建box
					var box = document.createElement('div');
					box.className = 'box';
					wrap.appendChild(box);
					//创建info
					var info = document.createElement('div');
					info.className = 'info';
					box.appendChild(info);
					//创建pic
					var pic = document.createElement('div');
					pic.className = 'pic';
					info.appendChild(pic);
					//创建img
					var img = document.createElement('img');
					img.src = data[i].link;
					img.style.height = 'auto';
					pic.appendChild(img);
					//创建title
					var title = document.createElement('div');
					title.className = 'title';
					info.appendChild(title);
					//创建a标记
					var a = document.createElement('a');
					a.innerHTML = data[i].title;
					title.appendChild(a);
				}
				PBL('wrap', 'box');
			}
		}
	}
	/**
	 * 瀑布流主函数
	 * @param  wrap	[Str] 外层元素的ID
	 * @param  box 	[Str] 每一个box的类名
	 */
	function PBL(wrap, box) {
		//	1.获得外层以及每一个box
		var wrap = document.getElementById(wrap);
		var boxs = getClass(wrap, box);
		//	2.获得屏幕可显示的列数
		var boxW = boxs[0].offsetWidth;
		var colsNum = Math.floor(document.documentElement.clientWidth / boxW);
		wrap.style.width = boxW * colsNum + 'px';//为外层赋值宽度
		//	3.循环出所有的box并按照瀑布流排列
		var everyH = [];//定义一个数组存储每一列的高度
		for ( var i = 0; i < boxs.length; i++) {
			if (i < colsNum) {
				everyH[i] = boxs[i].offsetHeight;
			} else {
				var minH = Math.min.apply(null, everyH);//获得最小的列的高度
				var minIndex = getIndex(minH, everyH); //获得最小列的索引
				getStyle(boxs[i], minH, boxs[minIndex].offsetLeft, i);
				everyH[minIndex] += boxs[i].offsetHeight;//更新最小列的高度
			}
		}
	}
	/**
	 * 获取类元素
	 * @param  warp		[Obj] 外层
	 * @param  className	[Str] 类名
	 */
	function getClass(wrap, className) {
		var obj = wrap.getElementsByTagName('*');
		var arr = [];
		for ( var i = 0; i < obj.length; i++) {
			if (obj[i].className == className) {
				arr.push(obj[i]);
			}
		}
		return arr;
	}
	/**
	 * 获取最小列的索引
	 * @param  minH	 [Num] 最小高度
	 * @param  everyH [Arr] 所有列高度的数组
	 */
	function getIndex(minH, everyH) {
		for (index in everyH) {
			if (everyH[index] == minH)
				return index;
		}
	}
	/**
	 * 数据请求检验
	 */
	function getCheck() {
		var documentH = document.documentElement.clientHeight;
		var scrollH = document.documentElement.scrollTop
				|| document.body.scrollTop;
		return documentH + scrollH >= getLastH() ? true : false;
	}
	/**
	 * 获得最后一个box所在列的高度
	 */
	function getLastH() {
		var wrap = document.getElementById('wrap');
		var boxs = getClass(wrap, 'box');
		return boxs[boxs.length - 1].offsetTop
				+ boxs[boxs.length - 1].offsetHeight;
	}
	/**
	 * 设置加载样式
	 * @param  box 	[obj] 设置的Box
	 * @param  top 	[Num] box的top值
	 * @param  left 	[Num] box的left值
	 * @param  index [Num] box的第几个
	 */
	var getStartNum = 0;//设置请求加载的条数的位置
	function getStyle(box, top, left, index) {
		if (getStartNum >= index)
			return;
		$(box).css({
			'position' : 'absolute',
			'top' : top,
			"left" : left,
			"opacity" : "0"
		});
		$(box).stop().animate({
			"opacity" : "1"
		}, 999);
		getStartNum = index;//更新请求数据的条数位置
	}
</script>




</head>
<!-- NAVBAR
================================================== -->
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
					<a class="navbar-brand" href="__APP__">Shadow</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li id="index"><a href="__APP__">Home</a></li>
						<li class="dropdown" id="classi"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-expanded="false">Classification
								<span class="caret"></span>
						</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="__APP__/Album/showAlbum">Album</a></li>
								<li><a href="__APP__/Article/showArticles">Articles</a></li>
								<li><a href="__APP__/Video/showVideos">Videos</a></li>
							</ul></li>
						<li id="blog"><a href="__APP__/Blog">Blog</a></li>
						<li id="about"><a href="__APP__/About">About</a></li>
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
	<div class="container">
        <div class="jumbotron">
            <h1>Hello, world!</h1>
            <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
        </div>
	

	<div id="wrap">


		<div class="box">
			<div class="info">
				<div class="pic">
					<img src="__ROOT__/resources/images/pictures/shadow1.jpg">
				</div>
				<div class="title">
					<a href="#">shadow</a>
				</div>
			</div>
		</div>

		<div class="box">
			<div class="info">
				<div class="pic">
					<img src="__ROOT__/resources/images/pictures/shadow2.jpg">
				</div>
				<div class="title">
					<a href="#">shadow</a>
				</div>
			</div>
		</div>

		<div class="box">
			<div class="info">
				<div class="pic">
					<img src="__ROOT__/resources/images/pictures/shadow3.jpg">
				</div>
				<div class="title">
					<a href="#">shadow</a>
				</div>
			</div>
		</div>

		<div class="box">
			<div class="info">
				<div class="pic">
					<img src="__ROOT__/resources/images/pictures/shadow4.jpg">
				</div>
				<div class="title">
					<a href="#">shadow</a>
				</div>
			</div>
		</div>

		<div class="box">
			<div class="info">
				<div class="pic">
					<img src="__ROOT__/resources/images/pictures/shadow5.jpg">
				</div>
				<div class="title">
					<a href="#">shadow</a>
				</div>
			</div>
		</div>

		<div class="box">
			<div class="info">
				<div class="pic">
					<img src="__ROOT__/resources/images/pictures/shadow6.jpg">
				</div>
				<div class="title">
					<a href="#">shadow</a>
				</div>
			</div>
		</div>

		<div class="box">
			<div class="info">
				<div class="pic">
					<img src="__ROOT__/resources/images/pictures/shadow7.jpg">
				</div>
				<div class="title">
					<a href="#">shadow</a>
				</div>
			</div>
		</div>

		<div class="box">
			<div class="info">
				<div class="pic">
					<img src="__ROOT__/resources/images/pictures/shadow8.jpg">
				</div>
				<div class="title">
					<a href="#">shadow</a>
				</div>
			</div>
		</div>

		<div class="box">
			<div class="info">
				<div class="pic">
					<img src="__ROOT__/resources/images/pictures/shadow9.jpg">
				</div>
				<div class="title">
					<a href="#">shadow</a>
				</div>
			</div>
		</div>

		<div class="box">
			<div class="info">
				<div class="pic">
					<img src="__ROOT__/resources/images/pictures/shadow10.jpg">
				</div>
				<div class="title">
					<a href="#">shadow</a>
				</div>
			</div>
		</div>
	</div>
	</div>

	<p class="pull-right">
		<a id="toTop" href="#"></a>
	</p>


	<!-- Bootstrap core JavaScript ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
	
	<script src="__ROOT__/Plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
	<script src="__ROOT__/Resources/assets/js/vendor/holder.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="__ROOT__/Resources/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>