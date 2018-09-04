<?php

return array(
	'DEFAULT_MODULE'        =>  'Home',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'index', // 默认操作名称

    'SESSION_OPTIONS'       =>  array(), 
    'SESSION_PREFIX'        =>  'robot_', 

    'URL_CASE_INSENSITIVE'  =>  false,   // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'             =>  1,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：

    'TMPL_PARSE_STRING'  =>array(
		'__UPLOAD__' => '/Uploads', //使用新的静态资源目录
		
		'__CSS__'    => '/Public/css', //使用新的静态资源目录
		'__JS__'     => '/Public/js', //使用新的静态资源目录
		'__IMG__'    => '/Public/img', //使用新的静态资源目录
		'__LAYUI__'  => '/Public/layui', //使用新的静态资源目录
    ),
);