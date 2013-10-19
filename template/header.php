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
	// deny direct access
	defined('INCLUDES') or die('No direct access allowed.');
	define('IN_PHPBB', true);
	$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : "./forum/";
	$phpEx = substr(strrchr(__FILE__, '.'), 1);
	include($phpbb_root_path . 'common.' . $phpEx);

	// Start session management
	$user->session_begin();
	$auth->acl($user->data);
	$user->setup();

	if(!($user->data['user_id'] == ANONYMOUS) && $user->data[is_registered] == true){
		$username = "{$user->data['username']}";
	}else{
		$username = 'user';
	}

	$hostname = get_Hostname();
	$logo = $hostname.'/assets/img/tux.png';
	$header = '';
	$header = $username.'@linuxteam:~$<span class="blink">_</span>';
?>

<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!-- Consider specifying the language of your content by adding the `lang` attribute to <html> -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<title>LinuxTeam ΤΕΙ Στερεάς Ελλάδας</title>
	<meta name="description" content="Κοινότητα φίλων Linux και Ελευθέρου λογισμικού Τει Λαμίας.">

	<!-- Mobile viewport optimized: h5bp.com/viewport -->
	<meta name="viewport" content="width=device-width">

	<!-- FACEBOOK -->
	<meta property="og:title" content="LinuxTeam ΤΕΙ Λαμίας" />
	<meta property="og:type" content="cause" />
	<meta property="og:url" content="http://linuxteam.teilam.gr/" />
	<meta property="og:image" content="http://linuxteam.teilam.gr/assets/img/tux.png" />
	<meta property="og:site_name" content="Linuxteam Teilam" />
	<meta property="fb:admins" content="100003070249087" />
	<!-- END OF FACEBOOK -->

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

	<link rel="canonical" href="http://linuxteam.teilam.gr/" />

	<link rel="stylesheet" href="assets/css/top.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/bottom.css">
	<link rel="stylesheet" href="assets/css/1140.css">

	<?php if($type=='action_viewer') echo '<link rel="stylesheet" href="assets/css/action_viewer.css">' ?>
	<!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

	<!-- All JavaScript at the bottom, except this Modernizr build.
		 Modernizr enables HTML5 elements & feature detects for optimal performance.
		 Create your own custom Modernizr build: www.modernizr.com/download/ -->
	<script src="assets/js/vendor/modernizr-2.5.3.min.js"></script>
</head>
<body>
	<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6. 
		 chromium.org/developers/how-tos/chrome-frame-getting-started -->
	<!--[if lt IE 7]><p class="chromeframe">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->


	<div id="topbar" class="container">
		<div class="floatleft">
			<?php
				if(($user->data['user_id'] != ANONYMOUS)&& (!$user->data['is_bot']))
				{
					echo '<img class="avatar" src="'.$hostname.'/forum/download/file.php?avatar='.$user->data['user_avatar'].'">';
					echo '<span class="username">Welcome <a href="'.$hostname.'/forum/ucp.php">'.$user->data['username'].'</a>!</span>';
					echo '<span class="unreadpms"><a href="'.$hostname.'/forum/ucp.php?i=pm&folder=inbox">You have '.$user->data['user_new_privmsg'].' Unread PMs</a></span>';
				}
			?>
		</div>
		<div class="floatright">
			<!-- Login Form -->
			<?php if(($user->data['user_id'] == ANONYMOUS)&& (!$user->data['is_bot'])): ?>
				<a href="<?php echo $hostname; ?>/forum/ucp.php?mode=register" title="register">Register</a>
				<a class="auth-form-revealer" href="#">Login</a>
				<form id="topbar-block" class="hidden" action="<?php echo $hostname; ?>/forum/ucp.php?mode=login" method="post" accept-charset="utf-8">
					<input type="text" name="username" value="" placeholder="username">
					<input type="password" name="password" value="" placeholder="password" id="password">
					<label class="checkboxlabel" for="rememberme">remember me</label>
					<input class="checkboxinput" type="checkbox" name="autologin" id="autologin">
					<button type="submit"value="Log In" name="login" id="password" class="page-button">login</button>
					<button type="reset" class="page-button">clear</button>
					<button type="button" class="page-button auth-form-hider">&times;</button>
					<input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'];?>" />
				</form>
			<?php endif ?>

			<!-- Logout Form -->
			<?php if(!($user->data['user_id'] == ANONYMOUS)&& (!$user->data['is_bot'])): ?>
				<a href="<?php echo $hostname; ?>/forum/ucp.php?mode=logout&sid=<?php echo $user->data['session_id'];?>"> Αποσύνδεση [ <?php echo $user->data['username']; ?> ]</a>
			<?php endif ?>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>

	<div class="container row" id="container">
		<header>
			<?php
				echo'<div id="space">
						<img id="logo_left" src="'.$logo.'"></img>
						<img id="logo_right" src="'.$logo.'"></img>
						<h1>'.$header.'</h1>
					</div>
					<ul id="menu">
						<li class="menu_box"><a href="'.$hostname.'/index.php">Αρχική</a>
						</li><li class="menu_box"><a href="'.$hostname.'/about.php">About Us</a>
						</li><li class="menu_box"><a href="'.$hostname.'/events.php">Εκδηλώσεις</a>
						</li><li class="menu_box"><a href="'.$hostname.'/projects.php">Projects</a>
						</li><li class="menu_box"><a href="'.$hostname.'/forum">Forum</a></li>
					</ul>';
			?>
		</header>
		<div role="main" id="main">
