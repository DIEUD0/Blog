<?php

namespace OpenClassrooms\Projet4\Blog;

abstract class Manager
{
	final protected function dbConnect()
	{
		$db = new \PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');

		return $db;
	}
}
