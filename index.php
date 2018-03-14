<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once 'HelloWorld.php';
$myfile = fopen("D:\home\data\mysql\MYSQLCONNSTR_localdb.ini", "r") or die("Unable to open file!");
$password = substr(fread($myfile,filesize("D:\home\data\mysql\MYSQLCONNSTR_localdb.ini")),62);
fclose($myfile);
echo $password;
$pdo = new PDO("mysql:dbname=localdb;host=localhost","azure",$password);
$pdo->query("CREATE TABLE hello (what VARCHAR(50) NOT NULL)");
$hw=new HelloWorld($pdo);
$content=$hw->hello();
echo $content;
?>