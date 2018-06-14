<?php


define('ERROR_SUCCESS', 0); // no error

// internal error
define('ERROR_INTERNAL', 1);					// 系统内部错误
define('ERROR_INVALID_REQUEST', 2);				// 非法请求
define('ERROR_INVALID_JSON', 3);				// 非法JSON

// external error
define('ERROR_INVALID_USERNAME', 10000);		// 非法的用户名
