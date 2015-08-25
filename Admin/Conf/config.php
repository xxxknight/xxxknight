<?php
return array(
	    //'配置项'=>'配置值'
	    //'URL_PATHINFO_DEPR'=>'-',//修改URL的分隔符
		'TMPL_L_DELIM'=>'<{', //修改左定界符
		'TMPL_R_DELIM'=>'}>', //修改右定界符
		'DB_TYPE'=>'mysql',   //设置数据库类型
		'DB_HOST'=>'10.103.14.47',//设置主机
		'DB_NAME'=>'xxxknight',//设置数据库名
		'DB_USER'=>'root',    //设置用户名
		'DB_PWD'=>'',        //设置密码
		'DB_PORT'=>'3306',   //设置端口号
		'DB_PREFIX'=>'xk_',  //设置表前缀
		//'DB_DSN'=>'mysql://root:@localhost:3306/xxxknight',//使用DSN方式配置数据库信息,root:后面跟密码，两者配置同时存在，DSN优先考虑
		'SHOW_PAGE_TRACE'=>true,//开启页面Trace
		//'DB_LIKE_FIELDS'=>'title|content' //查询语句中条件自动变为模糊查询%%
		'TMPL_TEMPLATE_SUFFIX'=>'.html',//更改模板文件后缀名
		//'TMPL_FILE_DEPR'=>'_',//修改模板文件目录层次
// 		'TMPL_DETECT_THEME'=>true,//自动侦测模板主题
// 		'THEME_LIST'=>'your,my',//支持的模板主题列表
		'TMPL_PARSE_STRING'=>array(           //添加自己的模板变量规则
				'__CSS__'=>__ROOT__.'/Resources/css',
				'__JS__'=>__ROOT__.'/Resources/js',
				'__IMG__'=>__ROOT__.'/Resources/images',
				'__MED__'=>__ROOT__.'/Resources/media',
		),
);
?>