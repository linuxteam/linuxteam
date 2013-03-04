<?php
header('Content-Type: text/html; charset=utf-8');
require("./functions.php");
$hostname=get_hostname();
$connection=mysql_connect('localhost','linuxteam','f@34ExG~z');
if(!$connection)
{
	die("Could not connect to the server");
}
mysql_select_db("web",$connection);
$query=mysql_query("SELECT path FROM pictures WHERE slideshow=true",$connection);
$out="";
while($result=mysql_fetch_assoc($query))
{
	$out.= $hostname.$result['path'].'<br>';
}
$out=rtrim($out,'<br>');
echo $out;
mysql_close($connection);
?>

