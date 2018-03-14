<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once 'HelloWorld.php';
$myfile = fopen("D:\home\data\mysql\MYSQLCONNSTR_localdb.ini", "r") or die("Unable to open file!");
$conns = split("[=;]",fread($myfile,filesize("D:\home\data\mysql\MYSQLCONNSTR_localdb.ini")));
fclose($myfile);
echo implode(" ",$conns);
$pdo = new PDO("mysql:dbname=" . $conns[1] . ";host=" . $conns[3], $conns[5], $conns[7]);
$pdo->query("CREATE TABLE hello (what VARCHAR(50) NOT NULL)");
$hw=new HelloWorld($pdo);
$content=$hw->hello();
echo $content;
?>