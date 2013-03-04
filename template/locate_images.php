<?php
/*
	Linuxteam teilam Site
    Copyright (C) 2012-2013  Linuxteam teilam

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>
*/
header('Content-Type: text/html; charset=utf-8');
require("./functions.php");
require("../phpBB3/config.php");
$hostname=get_hostname();
$connection=mysql_connect($dbhost,$dbuser,$dbpasswd);
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

