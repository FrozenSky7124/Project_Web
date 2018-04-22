<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title>EmoteTools - DreamFun.com</title>
<link href="style/EmoteTools_style.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="header">
</div>

<div id="entry">

<div id="elist">

<a href="index.php"><div class="elist_link" style="background-image: url(http://dreamfun-dreamfunstor.stor.sinaapp.com/EmoteTools-stor/AC-small/ac37.png); background-repeat: no-repeat; background-position-x: center; background-position-y: center; border-color: #66FFFF; border-style: dashed; border-width: 2px;"></div></a>

</div>

<div id="eshow">

<!--
<a href="http://dreamfun-dreamfunstor.stor.sinaapp.com/EmoteTools-stor/AC-small/ac0.png"><div class="eblock" style="background-image: url(http://dreamfun-dreamfunstor.stor.sinaapp.com/EmoteTools-stor/AC-small/ac0.png);">
</div></a>
-->


<?php
$i=0;
$img_url_0 = "http://dreamfun-dreamfunstor.stor.sinaapp.com/EmoteTools-stor/AC-small/";
while($i<=44)
{
	$img_url_1 = "ac".$i."."."png";
	$img_url = $img_url_0.$img_url_1;
	echo '<a href="';
	echo $img_url;
	echo '"><div class="eblock" style="background-image: url(';
	echo $img_url;
	echo ');"></div></a>';
	$i++;
}
?>


</div>

</div>

</html>