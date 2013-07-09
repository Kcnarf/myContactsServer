<?php

class RootController
{
	public function opendb () {
		$DB_NAME = 'myContacts';
		$DB_HOST = 'localhost';
		$DB_USER = 'root';
		$DB_PASS = 'l5ba$2';

		$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
		return $mysqli;
	}
}