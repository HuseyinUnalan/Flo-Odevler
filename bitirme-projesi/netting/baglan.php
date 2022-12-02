<?php
ob_start();
@session_start();

try {
	$db = new PDO("mysql:host=localhost;dbname=proje;charset=utf8", 'root', '');
} catch (PDOException $e) {
	echo $e->getMessage();
}
