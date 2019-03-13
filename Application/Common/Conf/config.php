<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_FILE_DEPR' => '_',
    'TMPL_L_DELIM' => '<#', //模板引擎普通标签开始标记
    'TMPL_R_DELIM' => '#>', //模板引擎普通标签结束标记
    'DEFAULT_MODULE' => 'Home', // 默认模块
    'DEFAULT_CONTROLLER' => 'Index', // 默认控制器名称
    'DEFAULT_ACTION' => 'index', // 默认操作名称


    'DB_TYPE' => 'Mysql',
	'DB_HOST' => '127.0.0.1',
	'DB_NAME' => 'market_tyn',
	'DB_USER' => 'root',
	'DB_PWD' => '',
	'DB_PORT' => 3306,
    'DB_PREFIX' => 'tyn_',
	'DB_CHARSET' => 'utf8',
	'DB_FIELDS_CACHE' => false,
	'URL_HTML_SUFFIX' => 'html',
	'SHOW_PAGE_TRACE' => false,
	'SHOW_ERROR_MSG' => false,
	'LOAD_EXT_CONFIG' => 'site',
);