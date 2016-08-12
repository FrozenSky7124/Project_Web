<?php
	//header("Content-type: image/png");
	//接收finish.php传递的变量
	$ctype=$_REQUEST['ctype'];
	$crarity=$_REQUEST['crarity'];
	$cmana=$_REQUEST['cmana'];
	$cattack=$_REQUEST['cattack'];
	$chealth=$_REQUEST['chealth'];
	$chard=$_REQUEST['chard'];
	$cname=$_REQUEST['cname'];
	$cdesc=$_REQUEST['cdesc'];
	$cclass=$_REQUEST['cclass'];
	$uptxtype=$_REQUEST['filetype'];
	$uptxname=$_REQUEST['uptx'];
	
	//定义绘图变量
	switch($ctype)
	{
		case 'minion':{
			$mengban_width	= 300;
			$mengban_height	= 350;
			$mengban_px	=	50;
			$mengban_py	=	30;
			$namemengban_px	=	15;
			$namemengban_py	=	285;
			break;
		}
		case 'spell':{
			$mengban_width	= 330;
			$mengban_height	= 260;
			$mengban_px	=	40;
			$mengban_py	=	50;
			$namemengban_px	=	23;
			$namemengban_py	=	280;
			break;
		}
		case 'weapon':{
			$mengban_width	= 300;
			$mengban_height	= 250;
			$mengban_px	=	50;
			$mengban_py	=	72;
			$namemengban_px	=	13;
			$namemengban_py	=	295;
			break;
		}
		default:
		break;
	}
		
	//SAE Storage初始化
	$sae_stor = new SaeStorage();
	
	//定义images目录url
	$imgdir='images';
	//根据传递来的卡牌参数赋予各image组件正确的值
	$img_mb=imagecreatefrompng($sae_stor->getUrl($imgdir,$ctype."_mengban.png"));
	$img_bg=imagecreatefrompng($sae_stor->getUrl($imgdir,$ctype."_".$cclass."_bg.png"));
	if ($crarity=='none')
	{
		//$img_board=imagecreatefrompng($imgdir.$ctype."_".$crarity.".png");
		//$img_rarity=imagecreatefrompng($imgdir.$ctype."_".$crarity.".png");
		//$img_banner=imagecreatefrompng($imgdir.$ctype."_".$crarity.".png");
		//$img_long=imagecreatefrompng($imgdir.$ctype."_".$crarity.".png");
	} else
	{
		$img_board=imagecreatefrompng($sae_stor->getUrl($imgdir,$ctype."_board.png"));
		$img_rarity=imagecreatefrompng($sae_stor->getUrl($imgdir,$ctype."_rare_".$crarity.".png"));
		if (($ctype=='minion')||($ctype=='weapon'))
		$img_banner=imagecreatefrompng($sae_stor->getUrl($imgdir,$ctype."_banner.png"));
		if (($crarity=='legendary') && ($ctype=='minion'))
		$img_long=imagecreatefrompng($sae_stor->getUrl($imgdir,$ctype."_long.png"));
	}
	
	//获取用户上传的图片
	if (($uptxtype=='image/jpeg')||($uptxtype=='image/pjpeg'))
	$img_uptx = imagecreatefromjpeg($sae_stor->getUrl('temp',$uptxname));
	if (($uptxtype=='image/png')||($uptxtype=='image/x-png'))
	$img_uptx = imagecreatefrompng($sae_stor->getUrl('temp',$uptxname));
	if ($uptxtype=='image/gif')
	$img_uptx = imagecreatefromgif($sae_stor->getUrl('temp',$uptxname));
	
	//初始化画布	
	$img_000=imagecreatetruecolor(400,573);
	//设置黑色为透明色Alpha全透明
	$bgcolor = imagecolorallocatealpha($img_000, 0, 0, 0, 127);
	//对用户上传的图片通过预定义的蒙版图片进行裁剪
	if (imagesx($img_uptx) <= $mengban_width)
	{
		//处理（上传图片宽度 <= 画布预设宽度）
		imagecopyresized($img_000, $img_uptx, $mengban_px, $mengban_py, 0, 0, $mengban_width, $mengban_height, imagesx($img_uptx), (imagesx($img_uptx)/$mengban_width)*imagesy($img_uptx));
	}else
	{
		imagecopyresized($img_000, $img_uptx, $mengban_px, $mengban_py, 0, 0, $mengban_width, $mengban_height, imagesx($img_uptx), (imagesx($img_uptx)/$mengban_width)*$mengban_height);
	}
	imagecopyresized($img_000, $img_mb, 0, 0, 0, 0, 400, 573, 400, 573);
	imagecolortransparent($img_000, $bgcolor);
	imagefill($img_000, 0, 0, $bgcolor);
	//合并其他素材图片
	imagecopyresized($img_000, $img_bg, 0, 0, 0, 0, 400, 573, 400, 573);
	if ($crarity!='none')
	{
		imagecopyresized($img_000, $img_rarity, 0, 0, 0, 0, 400, 573, 400, 573);
		imagecopyresized($img_000, $img_board, 0, 0, 0, 0, 400, 573, 400, 573);
		if (($ctype=='minion')||($ctype=='weapon'))
		imagecopyresized($img_000, $img_banner, 0, 0, 0, 0, 400, 573, 400, 573);
		if (($crarity=='legendary')&&($ctype=='minion'))
		imagecopyresized($img_000, $img_long, 0, 0, 0, 0, 400, 573, 400, 573);
	}
	imagesavealpha($img_000,true);
	//图像处理完成-输出到文件
	
	$white_gd = imagecolorallocate($img_000, 255, 255, 255);
	$grey_gd = imagecolorallocate($img_000,55,55,55);
	$black_gd = imagecolorallocate($img_000, 0, 0, 0);
	$font_kai = "/usr/share/fonts/chinese/TrueType/ukai.ttf";
	$font_belwe = "./Belwe.ttf";
	if ($ctype=='minion')
	{	
		//Mana
		if (strlen($cmana)==2){
		imagettftext($img_000, 50, 0, 30, 105, $grey_gd, $font_belwe, $cmana);
		imagettftext($img_000, 50, 0, 28, 103, $white_gd, $font_belwe, $cmana);}
		if (strlen($cmana)==1){
		imagettftext($img_000, 50, 0, 45, 105, $grey_gd, $font_belwe, $cmana);
		imagettftext($img_000, 50, 0, 43, 103, $white_gd, $font_belwe, $cmana);}
		//Attack
		if (strlen($cattack)==2){
		imagettftext($img_000, 50, 0, 32, 535, $grey_gd, $font_belwe, $cattack);
		imagettftext($img_000, 50, 0, 30, 532, $white_gd, $font_belwe, $cattack);}
		if (strlen($cattack)==1){
		imagettftext($img_000, 50, 0, 52, 535, $grey_gd, $font_belwe, $cattack);
		imagettftext($img_000, 50, 0, 50, 532, $white_gd, $font_belwe, $cattack);}
		//Health
		if (strlen($chealth)==2){
		imagettftext($img_000, 50, 0, 318, 535, $grey_gd, $font_belwe, $chealth);
		imagettftext($img_000, 50, 0, 316, 532, $white_gd, $font_belwe, $chealth);}
		if (strlen($chealth)==1){
		imagettftext($img_000, 50, 0, 337, 535, $grey_gd, $font_belwe, $chealth);
		imagettftext($img_000, 50, 0, 335, 532, $white_gd, $font_belwe, $chealth);}
		
		//Desc
		if (strlen($cdesc)<=30)
		{
			imagettftext($img_000, 17, 0, 95, 450, $black_gd, $font_kai, $cdesc);
		} else if ((strlen($cdesc)>30)&&(strlen($cdesc)<=60))
		{
			imagettftext($img_000, 17, 0, 95, 425, $black_gd, $font_kai, substr($cdesc,0,30));
			imagettftext($img_000, 17, 0, 95, 450, $black_gd, $font_kai, substr($cdesc,30,30));
		}
		else
		{
			imagettftext($img_000, 17, 0, 95, 425, $black_gd, $font_kai, substr($cdesc,0,30));
			imagettftext($img_000, 17, 0, 95, 450, $black_gd, $font_kai, substr($cdesc,30,30));
			imagettftext($img_000, 17, 0, 95, 475, $black_gd, $font_kai, substr($cdesc,60,30));
		}
		//Name
		$nameArray=imagettfbbox( 19 , 5 , $font_kai, $cname );
		$namex=(400-($nameArray['2']-$nameArray['0']))/2;
		imagettftext($img_000, 19, 5, $namex, 333, $black_gd, $font_kai, $cname);
	}
	else if ($ctype=='spell')
	{
		//Mana
		if (strlen($cmana)==2){
		imagettftext($img_000, 50, 0, 27, 85, $grey_gd, $font_belwe, $cmana);
		imagettftext($img_000, 50, 0, 25, 83, $white_gd, $font_belwe, $cmana);}
		if (strlen($cmana)==1){
		imagettftext($img_000, 50, 0, 43, 80, $grey_gd, $font_belwe, $cmana);
		imagettftext($img_000, 50, 0, 41, 78, $white_gd, $font_belwe, $cmana);}
		
		//Desc
		if (strlen($cdesc)<=30)
		{
			imagettftext($img_000, 17, 0, 95, 450, $black_gd, $font_kai, $cdesc);
		} else if ((strlen($cdesc)>30)&&(strlen($cdesc)<=60))
		{
			imagettftext($img_000, 17, 0, 95, 445, $black_gd, $font_kai, substr($cdesc,0,30));
			imagettftext($img_000, 17, 0, 95, 470, $black_gd, $font_kai, substr($cdesc,30,30));
		}
		else
		{
			imagettftext($img_000, 17, 0, 95, 425, $black_gd, $font_kai, substr($cdesc,0,30));
			imagettftext($img_000, 17, 0, 95, 450, $black_gd, $font_kai, substr($cdesc,30,30));
			imagettftext($img_000, 17, 0, 95, 475, $black_gd, $font_kai, substr($cdesc,60,30));
		}
		//Name
		$nameArray=imagettfbbox( 19 , 0 , $font_kai, $cname );
		$namex=(400-($nameArray['2']-$nameArray['0']))/2+10;
		imagettftext($img_000, 19, 0, $namex, 315, $black_gd, $font_kai, $cname);
	}
	else if ($ctype=='weapon')
	{
		//Mana
		if (strlen($cmana)==2){
		imagettftext($img_000, 50, 0, 25, 105, $grey_gd, $font_belwe, $cmana);
		imagettftext($img_000, 50, 0, 23, 103, $white_gd, $font_belwe, $cmana);}
		if (strlen($cmana)==1){
		imagettftext($img_000, 50, 0, 41, 105, $grey_gd, $font_belwe, $cmana);
		imagettftext($img_000, 50, 0, 39, 103, $white_gd, $font_belwe, $cmana);}
		//Attack
		if (strlen($cattack)==2){
		imagettftext($img_000, 50, 0, 32, 545, $grey_gd, $font_belwe, $cattack);
		imagettftext($img_000, 50, 0, 30, 542, $white_gd, $font_belwe, $cattack);}
		if (strlen($cattack)==1){
		imagettftext($img_000, 50, 0, 52, 545, $grey_gd, $font_belwe, $cattack);
		imagettftext($img_000, 50, 0, 50, 542, $white_gd, $font_belwe, $cattack);}
		//Hard
		if (strlen($chard)==2){
		imagettftext($img_000, 50, 0, 318, 545, $grey_gd, $font_belwe, $chard);
		imagettftext($img_000, 50, 0, 316, 542, $white_gd, $font_belwe, $chard);}
		if (strlen($chard)==1){
		imagettftext($img_000, 50, 0, 337, 544, $grey_gd, $font_belwe, $chard);
		imagettftext($img_000, 50, 0, 335, 542, $white_gd, $font_belwe, $chard);}
		
		//Desc
		if (strlen($cdesc)<=30)
		{
			imagettftext($img_000, 17, 0, 95, 450, $white_gd, $font_kai, $cdesc);
		} else if ((strlen($cdesc)>30)&&(strlen($cdesc)<=60))
		{
			imagettftext($img_000, 17, 0, 95, 445, $white_gd, $font_kai, substr($cdesc,0,30));
			imagettftext($img_000, 17, 0, 95, 470, $white_gd, $font_kai, substr($cdesc,30,30));
		}
		else
		{
			imagettftext($img_000, 17, 0, 95, 425, $white_gd, $font_kai, substr($cdesc,0,30));
			imagettftext($img_000, 17, 0, 95, 450, $white_gd, $font_kai, substr($cdesc,30,30));
			imagettftext($img_000, 17, 0, 95, 475, $white_gd, $font_kai, substr($cdesc,60,30));
		}
		//Name
		$nameArray=imagettfbbox( 19 , 0 , $font_kai, $cname );
		$namex=(400-($nameArray['2']-$nameArray['0']))/2;
		imagettftext($img_000, 19, 0, $namex, 326, $black_gd, $font_kai, $cname);
		imagettftext($img_000, 19, 0, $namex, 324, $white_gd, $font_kai, $cname);
	}
	
	
	
	
	
	
	imagepng($img_000);
	
?>