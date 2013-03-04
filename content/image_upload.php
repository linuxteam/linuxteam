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
require('./phpBB3/config.php');
$id=$_GET['id'];
$hostname=get_hostname();

if(!intval($id))
{
	die("Λάθος παραμέτροι");
}
if(($user->data['user_id'] != ANONYMOUS))
{
	$connection=mysql_connect($dbhost,$dbuser,$dbpasswd);
	if(!$connection)
	{
		die("Δεν μπορεί να συνδεθεί στην βάση δεδομένων");
	}
	
	mysql_select_db("web",$connection);
	mysql_query("set names 'utf8'",$connection);

	$sql1="Select ACTIONID, USER from actions WHERE ACTIONID=".$id;

	$query=mysql_query($sql1);
	$result=mysql_fetch_assoc($query);
	if($result['ACTIONID']!=$id )
	{
		die("Δεν μπορείτε να φορτώσεται εικόνα στην ενέργεια αυτή");
	}
	$suser=$result['USER'];

	$sql="";

	if(isset($_POST['submit']))
	{
		#Selecting path tpo upload image
		$path="./assets/img/slideshow/";
		if(!strcmp($_POST['use'],"cover"))
		{
			$path="./assets/img/cover/";
		}

		$imgpath=upload_image('img',$path);
		#Depending on the output of the function we set  corrrect error 
		if(!strcmp($imgpath,"error"))
		{
			$error="Δεν μπορεί να φορτώσει το αρχείο";
		}
		else if(!strcmp($imgpath,"invalid"))
		{
			$error="Δεν αποτελεί έγκυρο αρχείο";
		}
		else
		{ 
			if(!strcmp($imgpath,"exists"))
			{
				$error="Tο αρχείο ήδη υπάρχει.<br> Στην περίπτωση όπου επιλέχθικε ως εξόφυλλο θα ξαναοριστεί";
				$imgpath=$path.$_FILES['img']["name"];
			}
			
			if(!strcmp($_POST['use'],"cover"))		
			{
			
				$sql="UPDATE actions SET COVERPATH='".substr($imgpath,1)."' WHERE ACTIONID=".$id; 
			}
			else
			{
				$slideshow="false";
				if(!strcmp($_POST['use'],"slideshow"))#Checking if it is meant for homepage slideshow
				{
					$slideshow="true";
				}
			
				$sql="INSERT INTO pictures(path,slideshow,ACTIONID) VALUES( '".substr($imgpath,1)."', ".$slideshow.",".$id.")";
			}
		
			$query=mysql_query($sql);
			if($query)
			{
				$error="Το αρχείο φορτώθηκε επιτυχώς";
				$upload=true;
			}
			else
			{
				$error.="<br>Το αρχείο δεν φορτώθηκε επιτυχώς";
				$upload=false;
			}
		}
	}
	else
	{
		echo "Not Submitted<br>";
	}


if(!empty($error))
{
echo '<strong>'.$error.'</strong>';
}
?>

<form id="image-uploader" action="<?php echo $hostname?>/image_upload.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
	</strong><label for="img">Εικόνα προς φόρτωση:</label></strong><input type="file" name="img"></input>
	<br>

	<label for="use">Χρήση:</label>
	<select name="use">
	<option value="simple">Απλή φωτογραφία event</option>
	<?php
	if($suser==$user->data['username_clean']||$auth->acl_gets('a_'))
	{
	?>
	<option value="cover">Εξώφυλλο - Εικονίδιο</option>
	<?php 
	}
	if($auth->acl_gets('a_'))
	{?>
	<option value="slideshow">Slideshow</option>
	<?php 
	}?>
	</select>	
	<br>
	<button type="submit" name="submit" class="page-button">Φόρτωση εικόνας</button>
</form>
<?php
	if($upload)
	{
?>
<img src="<?php echo $hostname.$imgpath;?>">
<?php
	}

}
?>
