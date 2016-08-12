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
  <form name="uploadform" id="uploadform" action="finish.php" method="post" enctype="multipart/form-data">
    <table width="960" border="0" align="center">
      <caption>
        请输入自定义的卡牌数据
      </caption>
      <tr>
        <th width="150" scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
        <th width="150" scope="col">&nbsp;</th>
      </tr>
      <tr>
        <td align="right">卡牌类型：</td>
        <td>
        	<label><input name="cardtype" type="radio" id="cardtype_0" form="uploadform" value="minion" checked="checked" onchange="fun_cctype(this)" />&nbsp;随从&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <label><input name="cardtype" type="radio" id="cardtype_1" form="uploadform" value="spell" onchange="fun_cctype(this)"/>&nbsp;法术&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <label><input name="cardtype" type="radio" id="cardtype_2" form="uploadform" value="weapon" onchange="fun_cctype(this)"/>&nbsp;武器&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
        <td align="left">[必选]</td>
      <tr>
        <td align="right">个性图片：</td>
        <td align="center"><input type="hidden" name="MAX_FILE_SIZE" value="524288"/><input type="file" name="uppic"/></td>
        <td align="left">[小于500KB的图片,支持png,jpg,gif]</td>
      </tr>
      <tr>
        <td align="right">卡牌强度：</td>
        <td align="center">
        	<label><input name="cardrarity" type="radio" id="cardtype_0" form="uploadform" value="none" checked="checked" />&nbsp;基础&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <label><input name="cardrarity" type="radio" id="cardtype_1" form="uploadform" value="common" />&nbsp;普通&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <label><input name="cardrarity" type="radio" id="cardtype_2" form="uploadform" value="rare" />&nbsp;稀有&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <label><input name="cardrarity" type="radio" id="cardtype_3" form="uploadform" value="epic" />&nbsp;史诗&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <label><input name="cardrarity" type="radio" id="cardtype_4" form="uploadform" value="legendary" />&nbsp;传说&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>  
        </td>
        <td align="left">[必选]</td>
      </tr>
      <tr>
      	<td align="right">卡牌数值：</td>
        <td align="center">
        	&nbsp;费用：<input name="cardmana" type="text" id="cardmana" size="2" maxlength="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;攻击：<input id="cardattack" name="cardattack" type="text" size="2" maxlength="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;生命：<input id="cardhealth" name="cardhealth" type="text" size="2" maxlength="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;耐久：<input name="cardhard" type="text" disabled="disabled" id="cardhard" size="2" maxlength="2" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        <td align="left">[0~99]</td>
      </tr>
      <tr>
      	<td align="right">卡牌名称：</td>
        <td align="center"><input name="cardname" type="text" size="35" maxlength="15" /></td>
        <td align="left"></td>
      </tr>
      <tr>
      	<td align="right">描　　述：</td>
        <td align="center"><input name="carddesc" type="text" size="35" maxlength="50" /></td>
        <td align="left"></td>
      </tr>
      <tr>
      	<td align="right">职　　业：</td>
        <td align="center">
        	<select name="cardclass" style="width:180px">
            	<option value="neutral" selected="selected">中立</option>
                <option value="priest">牧师</option>
                <option value="mage">法师</option>
                <option value="druid">德鲁伊</option>
                <option value="hunter">猎人</option>
                <option value="paladin">圣骑士</option>
                <option value="rogue">潜行者</option>
                <option value="shaman">萨满祭祀</option>
                <option value="warlock">术士</option>
                <option value="warrior">战士</option>
            </select>
        </td>
        <td align="left"></td>
      </tr>
      <tr>
      </tr>
      <tr>
      	<td></td>
      	<td align="center">
        <input type="submit" name="submit" value="开始生成" class="submitbutton">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   	    <input type="reset" name="reset" id="reset" value="重置" class="resetbutton" /></td>
        <td></td>
      </tr>
    </table>
  </form>
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

<script language="javascript">
	function fun_cctype(obj)
	{
		if (obj.value == 'spell')
		{
			document.getElementById("cardattack").disabled=true;
			document.getElementById("cardhealth").disabled=true;
			document.getElementById("cardhard").disabled=true;
			document.getElementById("cardmana").disabled=false;
			document.getElementById("cardattack").value='';
			document.getElementById("cardhealth").value='';
			document.getElementById("cardhard").value='';
			document.getElementById("cardmana").value='';
		}
		if (obj.value == 'minion')
		{
			document.getElementById("cardattack").disabled=false;
			document.getElementById("cardhealth").disabled=false;
			document.getElementById("cardhard").disabled=true;
			document.getElementById("cardmana").disabled=false;
			document.getElementById("cardattack").value='';
			document.getElementById("cardhealth").value='';
			document.getElementById("cardhard").value='';
			document.getElementById("cardmana").value='';
		}
		if (obj.value == 'weapon')
		{
			document.getElementById("cardattack").disabled=false;
			document.getElementById("cardhealth").disabled=true;
			document.getElementById("cardhard").disabled=false;
			document.getElementById("cardmana").disabled=false;
			document.getElementById("cardattack").value='';
			document.getElementById("cardhealth").value='';
			document.getElementById("cardhard").value='';
			document.getElementById("cardmana").value='';
		}
	}
</script>