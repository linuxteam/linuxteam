<h1>Προβολή εικόνων από για slideshow</h1>
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

if(($user->data['user_id'] != ANONYMOUS) && $auth->acl_gets('a_'))
{
	$connection=mysql_connect($dbhost,$dbuser,$dbpasswd);
	
	if(!$connection)
	{
		die("Δεν μπορεί να συνδεθεί στην βάση δεδομένων");
	}
	
	mysql_select_db("web",$connection);
	mysql_query("set names 'utf8'",$connection);
	
	$sql1="Select TITLE from actions WHERE ACTIONID=".$id;
	$query=mysql_query($sql1);
	$result=mysql_fetch_assoc($query);
	if(mysql_num_rows($query)>0)
	{

	 echo "<strong>Event:</strong> ".$result['TITLE']."<br>";
	
	}

	$sql1="Select PICID,path,slideshow from pictures WHERE ACTIONID=".$id;
	$query=mysql_query($sql1);
	
	$i=0;

	if(mysql_num_rows($query)>0)
	{
		while($result=mysql_fetch_assoc($query))
		{
			$path[$result['PICID']]['path']=$hostname.$result['path'];
			$path[$result['PICID']]['slideshow']=$result['slideshow'];
			$i++;
		}
	}
	else
	{
		echo "Δεν Υπάρχουν εικόνες";
	}

	if(isset($_POST['slide_submit']) && isset($_POST['slideshow']))
	{
		foreach($_POST['slideshow'] as $i=>$img)
		{
			mysql_query("START TRANSACTION");
			mysql_query("BEGIN");
			$sql2="";
			$ok=true;
			if($img==1)
			{
				$sql2="UPDATE pictures SET slideshow = '1' WHERE PICID=".$i;
			}
			elseif($img==0)
			{
				$sql2="UPDATE pictures SET slideshow = '0' WHERE PICID=".$i;
			}
			$query=mysql_query($sql2);
			if($query)
			{
				$ok=true;
				mysql_query("COMMIT");
				$path[$i]['slideshow']=$img;
			}
			else
			{
				mysql_query("ROLLBACK");
				$ok=false;
			}
		}
	
		if(!$ok)
		{
			echo "Αδύνατο να εφαμοσθούν οι αλλαγές";
		}
		else
		{
			echo "Οι αλλαγές εφαρμόσθηκας επιτυχώς";
		}
	}
?>
	<form action="image_preview.php?id=<?php echo $id;?>" method="post">
<?php
	if($i>0)
	{
		foreach($path as $i => $img)
		{
?>
			<img src="<?php echo $img['path']; ?>" width="450" height="350"></img><br>
<?php
			if($auth->acl_get('a_'))
			{
?>
			<label>Ορισμός της παραπάνω εικόνας σαν slideshow;</label>
			Ναι<input type="radio"  name="slideshow[<?php echo $i; ?>]" value="1" <?php if($img['slideshow']==1){echo "checked";}?>>
			Όχι<input type="radio"  name="slideshow[<?php echo $i; ?>]" value="0"<?php if($img['slideshow']==0){echo "checked";}?>>
			<br>	

<?php
			}
		}
		
	}
	mysql_close($connection);
}
?>
<br>
<input type="submit"  name="slide_submit" value="Εφαρμογή αλλαγών">
</form>
