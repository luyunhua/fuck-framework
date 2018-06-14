<?php
/**
 * User: luyunhua
 * Email: luyunhua1987@gmail.com
 * Date: 18/6/13
 */

// 保证所有脚本运行完毕
ignore_user_abort(true);

require __DIR__ . '/helper/loader.php';


// Class Loader Register
Loader::init();

Loader::append([
	'Base'		=> 'helper/base',
	'MysqliDb'	=> 'util/db_mysqli',
	'Filter'	=> 'util/db_filter',
	'DB'		=> 'helper/db',
], __DIR__);
