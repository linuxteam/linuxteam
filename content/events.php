<h2>Οι εκδηλώσεις μας</h2>
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
	$connection=mysql_connect($dbhost,$dbuser,$dbpasswd);
	if(!$connection){
		die("Could not connect to the server");
	}
	mysql_select_db("web", $connection);
	mysql_query("set names 'utf8'", $connection);
	$query=mysql_query("SELECT * from actions NATURAL JOIN events ORDER BY begin DESC");
?>
<div id="events">
<?php
	while ($result=mysql_fetch_assoc($query)) {
		$forum_users = explode(', ', $result['USER']);
?>
	<div class="event">
		<img id="cover" src="<?php echo $hostname.$result['COVERPATH'];?>" class="floatleft" />
		<div class="details floatleft">
			<h3><?php echo $result['TITLE']; ?></h3>
			<p class="location">
				<strong>Τοποθεσία:</strong> <?php echo $result['location']; ?>
			</p>
			<p class="date">
				<strong>Έναρξη: </strong><?php echo date("D j/m/Y h:i a",$result['begin']); ?><br>
				<strong>Λήξη: </strong><?php echo date("D j/m/Y h:i a",$result['end']); ?>
			</p>
			<p class="other-details">
				<strong>Διοργανωτές: </strong>

<?php
				$temp = 1;
				 foreach ($forum_users as $forum_user){
					echo '<a href="'. $hostname . '/phpBB3/memberlist.php?mode=viewprofile&un=' . $forum_user . '" title="">'. $forum_user .'</a>';
				 	if($temp == 1){ echo ', '; $temp ++;}
				 }
?>

				<br />
				<br />

				<strong><a class="page-button" href="<?php echo $hostname;?>/phpBB3/<?php echo $result['FORUM']; ?>">Forum link</a></strong>
				<a class="page-button" href="<?php echo $hostname;?>/action_viewer.php?id=<?php echo $result['ACTIONID']; ?>&&event=1">More Info</a>
<?php
				if (($username != 'user'))
				{
					if($auth->acl_gets('a_'))
					{
?>
					<a class="page-button" href="<?php echo $hostname;?>/add_event.php?id=<?php echo $result['ACTIONID']?>&edit=1">Επεξεργασία πληροφοριών</a>
				<?php   }?>
					<a class="page-button" href="<?php echo $hostname;?>/image_upload.php?id=<?php echo $result['ACTIONID']?>">Μεταφόρτωση εικόνων</a>
					
<?php
				}
?>

			</p>
		</div>
		<div class="clearfix"></div>
	</div>
<?php
	}
?>
</div>
<?php
	if($user->data['user_id'] != ANONYMOUS && $auth->acl_gets('a_'))
	{
?>
	<a id="add-project-button" href="<?php echo $hostname?>/add_event.php?id=1&edit=0">Προσθήκη event</a>
<?php
	}
?>
