<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once 'HelloWorld.php';
$myfile = fopen("D:\home\data\mysql\MYSQLCONNSTR_localdb.txt", "r") or die("Unable to open file!");
$conns = explode(";",fread($myfile,filesize("D:\home\data\mysql\MYSQLCONNSTR_localdb.txt")));
fclose($myfile);
echo implode(" ",$conns);
$pdo = new PDO("mysql:dbname=" . explode("=",$conns[0])[1] . ";host=" . explode("=",$conns[1])[1], explode("=",$conns[2])[1], explode("=",$conns[3])[1]);
$pdo->query("CREATE TABLE hello (what VARCHAR(50) NOT NULL)");
$hw=new HelloWorld($pdo);
$content=$hw->hello();
echo $content;
?>