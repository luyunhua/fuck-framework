<?php
/**
 * User: luyunhua
 * Email: luyunhua1987@gmail.com
 * Date: 18/6/13
 */

class Base
{
	public static function getRequestJson()
	{
		$post = $_POST['data'] ?? file_get_contents('php://input');
		if (!is_string($post)) {
			self::dieWithError(ERROR_INVALID_REQUEST);
		}
		$arr = json_decode($post, true);
		if (json_last_error() === JSON_ERROR_NONE) {
			return $arr;
		}
		// @TODO AssertLog
	}

	/**
	 * @param string|int $err
	 * @param string|null $errmsg
	 * @param bool $continue
	 */
	public static function dieWithError($err, $errmsg = null, $continue = false)
	{
		$arr = array_merge(
			[ 'status' => $err ],
			is_null($errmsg) ? []: [ 'err' => $errmsg ]
		);
		$json = json_encode($arr);
		header('Content-Type: application/json; charset = UTF-8');
		echo $json;
		if ($continue === false) {
			die;
		} else {
			fastcgi_finish_request();
		}
	}

	/**
	 * @param array $data
	 * @param bool $continue
	 */
	public static function dieWithResponse($data, $continue = false)
	{
		$json = json_encode(array_merge([ 'status' => ERROR_SUCCESS ], [ 'data' => $data ]));
		if (json_last_error() !== JSON_ERROR_NONE) {
			self::dieWithError(ERROR_INVALID_REQUEST);
		}
		echo $json;
		if ($continue === false) {
			die();
		} else  {
			fastcgi_finish_request();
		}
	}
}