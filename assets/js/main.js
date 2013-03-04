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
// cache DOM
var target = $('#main');
var menu = $('#sdmn');
var auth_form_revealer = $('.auth-form-revealer');
var auth_form_hider = $('.auth-form-hider');
var auth_form_block = $('#topbar-block');

$(function(){
	// Facebook
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk')
	);

	// sticky menu
	target.waypoint({
		handler: function(event, direction){
			menu.toggleClass('sticky', direction = 'down');
		}
	});

	$("#topbar a.auth-form-revealer").click(function(e){
		e.preventDefault();
	});

	// authorization menu togglers
	auth_form_revealer.click(function(){
		auth_form_block.removeClass('hidden');
		auth_form_revealer.hide();
		auth_form_hider.show();
	});

	// authorization menu togglers
	auth_form_hider.click(function(){
		auth_form_block.addClass('hidden');
		auth_form_revealer.show();
		auth_form_hider.hide();
	});

	$('.checkboxlabel').click(function(){
		if($('.checkboxinput').prop('checked')){
			$('.checkboxinput').removeAttr('checked');
		}else{
			$('.checkboxinput').attr('checked', true);
		}
	});
});
