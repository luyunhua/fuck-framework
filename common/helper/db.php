<?php
/**
* 使用此类需定义
*	class Definition
*	{
*		const DB_ADDR = 'mysql';
*		const DB_PORT = '3306';
*		const DB_USER = 'www';
*		const DB_PASS = '123456';
*		const DB_NAME = 'db_test';
*	}
**/

class DB
{
	public static function insert($sql, $bind = null)
	{
		$stmt = self::getDB()->rawExec($sql, $bind);
		return $stmt->insert_id;
	}

	public static function update($sql, $bind = null)
	{
		$stmt = self::getDB()->rawExec($sql, $bind);
		return $stmt->affected_rows;
	}

	public static function select($sql, $bind)
	{
		return self::getDB()->rawQuery($sql, $bind);
	}

	public static function getDB()
	{
		if (self::$_db === null) {
			self::$_db = new MysqliDb(Definition::DB_ADDR, Definition::DB_USER, Definition::DB_PASS,
				Definition::DB_NAME);
		}
		return self::$_db;
	}

	private static $_db = null;
}
