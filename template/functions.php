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
	function get_Hostname()
	{
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") 
		{
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
		} 
		else 
		{
			$pageURL .= $_SERVER["SERVER_NAME"];
		}
		return $pageURL;
	}

	function upload_image($fid,$path_to_store)
	{
		$allowedExts = array("jpg", "jpeg", "gif", "png");
		$extension = strtolower(end(explode(".", $_FILES[$fid]["name"])));
		if ((($_FILES[$fid]["type"] == "image/gif")|| 
		($_FILES[$fid]["type"] == "image/jpeg")|| 
		($_FILES[$fid]["type"] == "image/png")||
		($_FILES[$fid]["type"] == "image/pjpeg"))&& 
		in_array($extension, $allowedExts))
 		{
			if ($_FILES[$fid]["error"] > 0)
			{
				return "error";
			}
			else
			{
				$path=$path_to_store.$_FILES[$fid]["name"];
				if (file_exists($path))
				{
					return "exists";
				}
				else
				{
					if(move_uploaded_file($_FILES[$fid]["tmp_name"], $path))
					{
						return $path;
					}
					else
					{
						return "error";
					}
				}
			}
		}
		else
		{
			return "invalid";
		}
	}
?>
