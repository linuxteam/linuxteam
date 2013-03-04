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
	$hostname=get_hostname();
	$id= $_GET['id'];
	
	if(!intval($id)){
		die("Wrong parameters");
	}
	$connection=mysql_connect($dbhost,$dbuser,$dbpasswd);
	if(!$connection){
		die("Could not connect to the server");
	}
	mysql_select_db("web",$connection);
	mysql_query("set names 'utf8'",$connection);
	$query_s="Select * from actions where ACTIONID=".intval($id);
	$query=mysql_query($query_s);
	if(mysql_num_rows($query)==0){
		die("Could not find results");
	}

	$result = mysql_fetch_assoc($query);
	$forum_users = explode(', ', $result['USER']);
?>

<div id="events">
		<h2><a href="<?php echo $hostname;?>/action_viewer.php?id=<?php echo $result['ACTIONID']; ?>"><?php echo $result['TITLE']; ?></a></h2>
	<div class="event">
		<img id="cover" src="<?php echo $hostname.$result['COVERPATH'];?>" class="floatleft" style="margin-right: 1em;" />
		<div class="details" style="margin-left: 0;">
			<p class="other-details">
				<?php
				
					$editv="";					
					if(isset($_GET['event']) && $_GET['event']==1)
					{
						echo "<strong>Διοργανωτές:</strong> ";
					}
					else
					{
						echo "<strong>Δημιουργός:</strong> ";
					}

					$temp = 0;
					 foreach ($forum_users as $forum_user){
						if($temp == 1){
							echo ', ';
						}
						$temp ++;

						echo '<a href="'. $hostname . '/phpBB3/memberlist.php?mode=viewprofile&un=' . $forum_user . '" title="">'. $forum_user .'</a>';

					}
				?>

				<?php if ($result['FORUM'] != ''): ?>
						<br /><br />
						<strong><a class="page-button" href="<?php echo $hostname;?>/phpBB3/<?php echo $result['FORUM']; ?>">Forum link</a></strong>
				<?php endif ?>
				<?php
					if(($user->data['user_id'] != ANONYMOUS))
					{
				?>
						<strong><a class="page-button" href="<?php echo $hostname;?>/image_upload.php?id=<?php echo $id?>">Μεταφόρτωση εικόνων</a></strong>
					
				<?php
						if($auth->acl_gets('a_'))
						{
				?>
							<strong><a class="page-button" href="<?php echo $hostname;?>/image_preview.php?id=<?php echo $id?>">Ορισμός εικόνων στο slideshow</a></strong>
				<?php
						}
					}
				?>

				<br />

				<?php echo $result['ABOUT']; ?>
			</p>
		</div>
		<div class="clearfix"></div>
	</div>

	 <div id="mini_pics" style="width:100%;"> -->
	<!--	the following is a template
			for what the js does
		<button></button>
		<button></button>
		<div></div>
	 </div> -->
	</div>
</div>






