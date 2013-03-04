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
	require('/home/www/linuxteam/htdocs/phpBB3/config.php');
	$id=$_GET['id'];
	if(!intval($id)){
		die("Wrong parameters");
	}
	$connection=mysql_connect($dbhost,$dbuser,$dbpasswd);
	if(!$connection){
		die("Could not connect to the server");
	}
	mysql_select_db("web",$connection);
	mysql_query("set names 'utf8'",$connection);	
	$query_s="SELECT path from pictures WHERE ACTIONID=".$id;
	$query=mysql_query($query_s);
	$array = array();
	while( $result=mysql_fetch_assoc($query)){
		$array[] = $result['path'];
	}
	$str = implode("<br>", $array);
	echo $str;
?>
