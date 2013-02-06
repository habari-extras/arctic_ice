<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="generator" content="Habari">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>{hi:@title_out}</title>

	<!--[if lt IE 9]><script>
		var e = ("abbr,article,aside,audio,canvas,datalist,details," +
			"figure,footer,header,hgroup,mark,menu,meter,nav,output," +
			"progress,section,time,video").split(',');
		for (var i = 0; i < e.length; i++) {
			document.createElement(e[i]);
		}
	</script> <![endif]-->

	{hi:@header_out}
<script>
function showMenu (event) {
    if (menu.is(":visible")) {
//        menu.slideUp({complete:function(){$(this).css('display','')}});
        menu.slideUp();
	$("#siteTagline").slideDown();
	$("#siteTitle").slideDown();
    }
    else {
	$("#siteTagline").slideUp();
	$("#siteTitle").slideUp();
        menu.slideDown();
    }
}

var header = undefined;
var menu = undefined;
var menuButton = undefined;
$(document).ready(function(){
    header = $("#masthead");
    headerMenu= $("nav.sitemenu");
    menu = $(".sitemenu ol");
    menuButton = $("<div class='menu-button'><a href='#'>Menu</a></div>");
    menuButton.click(showMenu);
    header.prepend(menuButton);
});
</script>
</head>
<body>
	<!--begin masthead-->
	<header id="masthead">
		<nav class="sitemenu">
			{hi:area:nav_top}
			<ul class="sitemenu">
				<li class="search">{hi:display:searchform}</li>
			</ul>
		</nav>

		<hgroup id="branding">
			<h1 id="siteTitle"><a href="/">{hi:option:title}</a></h1>
			<h2 id="siteTagline">{hi:option:tagline}</h2>
		</hgroup>
	</header>
	<!--end masthead-->

	<!--begin wrapper-->
	<div id="wrapper">
