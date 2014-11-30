<? require_once "jacknut/paypal.php"; ?><table>
<tr><td><h3>Stickers!<br></td><td align=right><? add_viewcart_button(); ?></td></tr>
<tr><td colspan=2 align=right><a href="http://www.paypal.com"><img border=0 src="/images/jacknut/paypal_logo.gif"></a><br><font size="-2">For more information about payment <a href="/jacknut/payment_info.html">click here</a></font>
<hr></td></tr>
</td></tr>
<tr><td valign=middle>Eight(8) sticker assorted pack - $5.00<br><br></td><td valign=middle>
    <?
        $item_info = array();
	$item_info["DISPLAYNAME"] = "8 Sticker Pack";
	$item_info["PARTNUMBER"] = "500";
	$item_info["UNITPRICE"] = "5.00";
	$item_info["SHIPPING_FIRST"] = "0.00";
	$item_info["SHIPPING_ADDITIONAL"] = "0.00";

        add_purchase_button($item_info);
?>
</td></tr>
<tr><td colspan=2><hr></td></tr>
<tr><td width="50%">Seal of the Governor of the State of California Sticker - $1.00<br>(size: 3"x3")
<?
        $item_info = array();
	$item_info["DISPLAYNAME"] = "Seal of the Governor Sticker";
	$item_info["PARTNUMBER"] = "501";
	$item_info["UNITPRICE"] = "1.00";
	$item_info["SHIPPING_FIRST"] = "0.00";
	$item_info["SHIPPING_ADDITIONAL"] = "0.00";
 
        add_purchase_button($item_info);
?>
</td><td align=center valign=middle><a
     href="javascript:popUpDesign('/images/jacknut/governor_arnold_schwarzenegger_closeup.jpg');"><img border=0
     src="/images/jacknut/gov_sticker1_thumb.jpg"><br><font size="-2">click for closeup</font></a></td></tr>
<tr><td colspan=2><hr></td></tr>
<tr><td width="50%" align=center valign=middle><a 
    href="javascript:popUpDesign('/images/jacknut/obey_arnold_schwarzenegger_closeup.gif');"><img border=0 
         src="/images/jacknut/obey_arnold_schwarzenegger_sticker_thumb.gif"><br><font size="-2">click for closeup</font></a></td>
<td>Obey Arnold Sticker - $1.00<br>(size: 2"x3")<?
        $item_info = array();
	$item_info["DISPLAYNAME"] = "Obey Arnold Sticker";
	$item_info["PARTNUMBER"] = "502";
	$item_info["UNITPRICE"] = "1.00";
	$item_info["SHIPPING_FIRST"] = "0.00";
	$item_info["SHIPPING_ADDITIONAL"] = "0.00";
 
        add_purchase_button($item_info);
?>
</td></tr>
<tr><td colspan=2><hr></td></tr>
<tr><td width="50%">Seal of the Governor of the State of California Sticker (ver 2) - $1.00<br>(size: 3"x3")<?
        $item_info = array();
	$item_info["DISPLAYNAME"] = "Seal of the Governor Sticker (Alternate)";
	$item_info["PARTNUMBER"] = "503";
	$item_info["UNITPRICE"] = "1.00";
	$item_info["SHIPPING_FIRST"] = "0.00";
	$item_info["SHIPPING_ADDITIONAL"] = "0.00";
 
        add_purchase_button($item_info);
?>
</td><td  align=center valign=middle><a 
    href="javascript:popUpDesign('/images/jacknut/governor_arnold_schwarzenegger_bg_closeup.jpg');"><img 
    border=0 alt="Click for closeup" 
    src="/images/jacknut/gov_sticker2_thumb.jpg"></a><br><font 
    size="-2">click for closeup</font></a></td></tr>
</table>
