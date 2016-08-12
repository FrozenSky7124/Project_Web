<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>炉石传说卡牌DIY</title>
<link rel="stylesheet" type="text/css" href="styles/style.css" />
</head>

<body>

<div id="header">
	<div class="inner">
      <div class="content">
        <div class="caption">
                <h1 id="title">
                    <a href="http://diyls.sinaapp.com/" title="炉石传说卡牌DIY在线生成  http://diyls.sinaapp.com">炉石传说卡牌DIY在线生成</a>
                </h1>
                <div id="tagline">炉石传说卡牌DIY在线生成  http://diyls.sinaapp.com 自定义属于自己的卡牌~~</div>
        </div>
		
      </div>
	</div>
</div>

<div id="entry">
	<?php
	//判断是否从finish.php直接进入
	if (!isset($_REQUEST['submit']))
	{
		//跳转index.php
		header('Location:index.php');
		exit;
	}
	
	define('MAX_SIZE',524288);
	$fileType=$_FILES['uppic']['type'];
	$fileLimitArr=array('image/jpeg','image/pjpeg','image/png','image/gif','image/x-png');
	
	if (in_array($fileType,$fileLimitArr))
	{
		if ($_FILES['uppic']['error']>0)
		{
			switch ($_FILES['uppic']['error'])
			{
				case 1:
				{
					echo '上传的文件大小超过500KB啦！请使用小一点的图片哦 O(∩_∩)O~'.'<br>';
					break;
				}
				case 2:
				{
					echo '上传的文件大小超过500KB啦！请使用小一点的图片哦 O(∩_∩)O~'.'<br>';
					break;
				}
				case 3:
				{
					echo '哦，糟了，上传文件失败了！~~~~(>_<)~~~~ '.'<br>';
					break;
				}
				case 4:
				{
					echo '请上传个性图片哦~ O(∩_∩)O~'.'<br>';
					break;
				}
				default:
				break;
			}
			if ($_FILES['uppic']['size']>MAX_SIZE) {
				echo '上传的文件大小超过500KB啦！请使用小一点的图片哦 O(∩_∩)O~'.'<br>';
				header('Location:index.php');
				exit;
			}
		}
	} else {
		switch ($_FILES['uppic']['error'])
		{
			case 1:
			{
				echo '上传的文件大小超过500KB啦！请使用小一点的图片哦 O(∩_∩)O~'.'<br>';
				break;
			}
			case 2:
			{
				echo '上传的文件大小超过500KB啦！请使用小一点的图片哦 O(∩_∩)O~'.'<br>';
				break;
			}
			case 3:
			{
				echo '哦，糟了，上传文件失败了！~~~~(>_<)~~~~ '.'<br>';
				break;
			}
			case 4:
			{
				echo '请上传个性图片哦~ O(∩_∩)O~'.'<br>';
				break;
			}
			default:
			echo '请上传格式为jpg，jpeg，png或gif的图片哦~'.'<br>';
			break;
		}
	}
	
	$cardtype=$_REQUEST['cardtype'];
	$cardrarity=$_REQUEST['cardrarity'];
	$cardmana=$_REQUEST['cardmana'];
	$cardattack=$_REQUEST['cardattack'];
	$cardhealth=$_REQUEST['cardhealth'];
	$cardhard=$_REQUEST['cardhard'];
	$cardname=$_REQUEST['cardname'];
	$carddesc=$_REQUEST['carddesc'];
	$cardclass=$_REQUEST['cardclass'];
	if (!is_numeric($cardattack)) {$cardattack=0;}
	if (!is_numeric($cardhealth)) {$cardhealth=0;}
	if (!is_numeric($cardhard)) {$cardhard=0;}
	if (!is_numeric($cardmana)) {$cardmana=0;}
	
//	print_r ($_REQUEST);
//	echo '<br>';
//	print_r($_FILES);
//	echo '<br>';
//	echo strlen($carddesc);
//	echo '<br>';
		
	if ($_FILES['uppic']['error']==0){
		if (in_array($fileType,$fileLimitArr)) {
			if ($_FILES['uppic']['size']<=MAX_SIZE) {
				/*
				if (is_uploaded_file($_FILES['uppic']['tmp_name']))
				{
					echo "上传的文件已找到";
					echo "<br>";
				}
				*/
				$fileName=date("YmdHis").'_'.rand(100,999).'_'.$_FILES['uppic']['name'];
				$tmpToStorage = new SaeStorage();
				$tmpToStorage->upload('temp',$fileName,$_FILES['uppic']['tmp_name']);
				echo '<br>';
				
				
				
				echo '<img src="./process.php';
				echo '?uptx=';
				echo $fileName;
				echo '&ctype='.$cardtype;
				echo '&crarity='.$cardrarity;
				echo '&cmana='.$cardmana;
				echo '&cattack='.$cardattack;
				echo '&chealth='.$cardhealth;
				echo '&chard='.$cardhard;
				echo '&cname='.$cardname;
				echo '&cdesc='.$carddesc;
				echo '&cclass='.$cardclass;
				echo '&filetype='.$fileType;
				echo '&?a.png"';
				echo '</img>';
				
				
				echo '      '.'<br>';
				echo '右键另存为png图片即可保存~';
				echo '<br>';
								
			}
		}
	}
	?>
</div>

<div id="footer">
	<div class="inner">
    	<div class="content">
        	<p id="about"><img src="http://sae.sina.com.cn/doc/_images/poweredby-117x12px.gif"/> | 基于 <a href="http://sae.sina.com.cn">SinaAppEngine</a> 架构 | Powered By <a href="http://frozensky.sinaapp.com">FrozenSky</a> | <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1000293244'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s23.cnzz.com/z_stat.php%3Fid%3D1000293244' type='text/javascript'%3E%3C/script%3E"));</script></p>
        </div>
    </div>
</div>





</body>
</html>