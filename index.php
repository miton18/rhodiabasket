<!--	CSS	-->
<?php
	require 'inc/lessc.inc.php';
		try {
		     lessc::ccompile('style/main.less', 'main.css');
		     lessc::ccompile('style/mobile.less', 'mobile.css');
		} catch (exception $ex) {
		     exit('lessc fatal error:'.$ex->getMessage());
		}
?>
<link href="style/main.css"   rel="stylesheet" type="text/css" />
<link href="style/mobile.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="jquery.custombox.css">
<!-- GOOGLE FONT -->
<link href='http://fonts.googleapis.com/css?family=Istok+Web' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Telex' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>



<meta charset="utf_8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Site web du club de basket du RHODIA"/>
<meta name="author" CONTENT="Auteur : Rémi collignon ;" />
<meta name="copyright" content="© rhodiabasket" />
<meta name="revisit" content="1 days" />

<title>rhodiabasket - Site du club</title>

<link rel="icon" type="image/png" href="img/fav.jpg" />
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="img/fav.jpg" /><![endif]-->