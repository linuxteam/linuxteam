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
?>
	</div> <!-- #main -->
	<footer>
		<p>Designed & Developed by Dimitrios Desyllas, Aris Vasilikos, Adonis K.</p>
		<p>&copy; Linuxteam Tei Lamias <?php echo date('Y'); ?></p>
	</footer>
</div> <!-- #container -->

	<!-- JavaScript at the bottom for fast page loading: http://developer.yahoo.com/performance/rules.html#js_bottom -->

	<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.7.2.min.js"><\/script>')</script>

	<!-- scripts concatenated and minified via build script -->
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/main.js"></script>
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
	<!-- end scripts -->
	<?php

	if($type=='index'){	  
		echo '<script src="/assets/js/slideshow.js" type="text/javascript"></script>';
	}
	if($type=='action_viewer'){
		echo '<script src="/assets/js/action_viewer_pics.js" type="text/javascript"></script>';
	}
	?>
</body>
</html>
