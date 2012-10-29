<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="generator" content="Habari">

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
</head>
<body>
	<!--begin masthead-->
	<header id="masthead">
		<hgroup id="branding">
			<h1 id="siteTitle"><a href="/">{hi:option:title}</a></h1>
			<h2 id="siteTagline">{hi:option:tagline}</h2>
		</hgroup>
		<nav>
			{hi:area:nav_top}
			<ul class="sitemenu">
				<li class="search">{hi:display:searchform}</li>
			</ul>
		</nav>
	</header>
	<!--end masthead-->

	<!--begin wrapper-->
	<div id="wrapper">
