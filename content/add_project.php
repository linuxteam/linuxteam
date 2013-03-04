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
	$edit=$_GET['edit'];
	$id=$_GET['id'];
		
	if(!intval($id) && (!intval($edit) && ($edit!=1||$edit!=0))){
		die("Λάθος παραμέτροι");
	}

	$hostname=get_hostname();
	$connection=mysql_connect($dbhost,$dbuser,$dbpasswd);

	if(!$connection){
		die("Δεν μπορεί να συνδεθεί στην βάση δεδομένων");
	}

	mysql_select_db("web",$connection);
	mysql_query("set names 'utf8'",$connection);


	if (($user->data['user_id'] != ANONYMOUS))
	{
		$quer=mysql_query("Select USER from actions where ACTIONID=".$id);

		if(mysql_num_rows($quer)>0)
		{
			$res=mysql_fetch_assoc($quer);
			if($edit==1 && $res['USER']!=$user->data['username'])
			{
				if(!$auth->acl_gets('a_'))
				{
					die('To συγκεκριμένο project δεν μπορείτε να το επεξεργαστείτε');
				}
			}
		}
		else
		{
			die("Το project δεν υπάρχει");
		}	

		echo '<h2>Φόρμα εκχώρισης project</h2>';


		$title="";
		$licence="";
		$repo="";
		$forum="";
		$type="";
		$about="";
		$cover="./assets/img/tux.png";
		$author=$user->data['username_clean'];

		if($edit==1)
		{
			$sql="Select * FROM actions NATURAL JOIN projects WHERE ACTIONID=".$id;
			$query=mysql_query($sql);
			$result=mysql_fetch_assoc($query);			
			
			$author=$result['USER'];
			$title=$result['TITLE'];
			$licence=$result['LICENCE'];
			$repo=$result['GIT'];
			$forum=$result['FORUM'];
			$type=$result['TYPE'];
			$about=$result['ABOUT'];
			$cover=$result['COVERPATH'];
		}

		if(!empty($_POST['submit']))
		{
			$title=$_POST['title'];
			$author=($edit==1 && $auth->acl_gets('a_'))?$_POST['author']:$author;
			$about=$_POST['about'];
			$repo=$_POST['repo'];
			$type=$_POST['type'];
			$licence=$_POST['licence'];
			$forum=$_POST['forum'];		
			$msg="";

			if($edit==0)
			{	
				$cover="./assets/img/tux.png";
			}
			
			if(!empty($title) && !empty($about) && !empty($licence) && !empty($author))
			{
				if($edit==0){
					$sql1="INSERT INTO actions (TITLE,USER,COVERPATH,FORUM,ABOUT) VALUES('".$title."','".$author."','".substr($cover,1)."','".$forum."','".$about."')";
					$sql2="SELECT MAX(ACTIONID) from actions where USER='".$author."' AND TITLE='".$title."'";
					
				}else{
					$sql1="UPDATE actions set TITLE='".$title."', FORUM='".$forum."', ABOUT='".$about."', USER='".$author."'"." WHERE ACTIONID=".$id;
					$sql3="UPDATE projects  SET GIT='".$repo."', TYPE='".$type."', LICENCE='".$licence."'"." WHERE ACTIONID=".$id;
				}
				//insert 
				$query1=mysql_query($sql1);
				
				if($edit==0){
					$query=mysql_query($sql2);
					$result=mysql_fetch_array($query,MYSQL_NUM);
					$sql3="INSERT INTO projects (ACTIONID,GIT,TYPE,LICENCE) VALUES(".$result[0].",'".$repo."','".$type."','".$licence."')";
					$id=$result[0];
				}
				
				$query2=mysql_query($sql3);
				if($query1 && $query2)
				{
					$msg="Έχει εισαχθεί επιτυχώς το project σας.<br> Κάνε κλικ <a href=".$hostname."/image_upload.php?id=".$id.">εδώ</a> για να φορτώσετε εικονίδιο και εικόνες στο project σας";
					$edit=1;
					
				}else
				{
					$msg="Aποτυχία εισαγωγής project";
				}
			}
			else
			{
				$msg="Δεν έχουν συπληρωθεί σωστά τα πεδία";
			}
		}

		if(!empty($msg))
		{
			echo $msg;
		}
?>
<p>Τα πεδία με <strong>*</strong> είναι <strong>απαραίτητα</strong><br></p>
<form action="<?php echo $hostname;?>/add_project.php?id=<?php echo $id;?>&edit=<?php echo $edit;?>" method="post" enctype="multipart/form-data">
	<strong>Τίτλος:*</strong>
<br><input type="text" name="title" value="<?php echo $title;?>"/><?php if(empty($title)){ echo "Δεν έχει συμπληρωθεί το πεδίο";}?><br><br>
	<?php
		if($auth->acl_gets('a_') && $edit==1)
		{
	?>
	<strong>Δημιουργός:*</strong> 
	<br><input type="text" name="author" value="<?php echo $author;?>"/><?php if(empty($user)){ echo "Δεν έχει συμπληρωθεί το πεδίο";}?><br>
	<?php 	} ?>
	<strong>Αποθετήριο στο github:*</strong><br><input type="text" name="repo" value="<?php echo $repo;?>"/>
	<?php if(empty($repo)){ echo "Δεν έχει συμπληρωθεί το πεδίο";}?>		
	<br><br>
	<strong>Είδος project:</strong><br>
	<select name="type" value="<?php echo $type;?>"><
	<option value="software">Project Λογισμικού</option>
	<option value="hardware">Project Υλικού</option>
	</select><br><br>
	<strong>Άδεια:*</strong><br><input type="text" name="licence" value="<?php echo $licence;?>" />
	<?php if(empty($licencev)){ echo "Δεν έχει συμπληρωθεί το πεδίο";}?>	
	<br><br>
	<strong>Forum Link:</strong><br>
	<input type="text" name="forum" value="<?php echo $forumv;?>"></input><br>
	<strong>Λίγα λόγια για το project σας:</strong><br>
	<textarea rows="20" cols="50" name="about"> <?php echo $aboutv;?></textarea><br>
	<input type="submit" name="submit" value="Εκχώριση project"></submit>
</form>

<?php
	}
?>
