<?php

// 加载配置文件
require __DIR__ . '/../../definition/include.php';

Loader::append([
	'HelloWorld'	=> 'helloworld/helloworld',
], __DIR__);