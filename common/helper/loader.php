<?php
/**
 * User: luyunhua
 * Email: luyunhua1987@gmail.com
 * Date: 18/6/13
 */

class Loader
{
	public static function init()
	{
		spl_autoload_register([ __CLASS__, 'classLoaderCallback' ]);
	}

	public static function append($map, $dir)
	{
		foreach ($map as $class_name => &$file) {
			$file = $dir . '/' . $file;
		}
		unset($file);
		self::$class_map = array_merge(self::$class_map, $map);
	}

	/**
	 * @param string $class_name
	 * @return bool
	 */
	private static function classLoaderCallback($class_name)
	{
		$file = self::$class_map[$class_name];
		if (isset($file)) {
			require $file . '.php';
			return true;
		} else {
			return false;
		}
	}

	private static $class_map = [];

}