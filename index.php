<?php
require_once 'HelloWorld.php';
$myfile = fopen("D:\home\data\mysql\MYSQLCONNSTR_localdb.ini", "r") or die("Unable to open file!");
$connStr = fread($myfile,filesize("D:\home\data\mysql\MYSQLCONNSTR_localdb.ini"));
fclose($myfile);
echo $connStr;
$pdo = new PDO($connStr);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->query("CREATE TABLE hello (what VARCHAR(50) NOT NULL)");
$hw=new HelloWorld($pdo);
$content=$hw->hello();
echo $content;
?>