<? require_once "jacknut/paypal.php"; ?><table>
<tr><td><h3>Fridge Magnets!<br></td><td align=right><? add_viewcart_button(); ?></td></tr>
<tr><td colspan=2 align=right><a href="http://www.paypal.com"><img border=0 src="/images/jacknut/paypal_logo.gif"></a><br><font size="-2">For more information about payment <a href="/jacknut/payment_info.html">click here</a></font>
<hr></td></tr>
</td></tr>
<tr><td colspan=2 valign=top>Three(3) magnet pack (1 of each)- $5.00<br>
    <?
        $item_info = array();
	$item_info["DISPLAYNAME"] = "3 Magnet Pack";
	$item_info["PARTNUMBER"] = "600";
	$item_info["UNITPRICE"] = "5.00";
	$item_info["SHIPPING_FIRST"] = "0.00";
	$item_info["SHIPPING_ADDITIONAL"] = "0.00";

        add_purchase_button($item_info);
?>
</td></tr>
<tr><td colspan=2><hr></td></tr>
<tr><td width="50%">Seal of the Governor of the State of California Fridge Magnet - $2.00<br>(size: 3"x3")
<?
        $item_info = array();
	$item_info["DISPLAYNAME"] = "Seal of the Governor Magnet";
	$item_info["PARTNUMBER"] = "601";
	$item_info["UNITPRICE"] = "2.00";
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
<td>Obey Arnold Fridge Magnet - $2.00<br>(size: 2"x3")<br><?
        $item_info = array();
	$item_info["DISPLAYNAME"] = "Obey Arnold Magnet";
	$item_info["PARTNUMBER"] = "602";
	$item_info["UNITPRICE"] = "2.00";
	$item_info["SHIPPING_FIRST"] = "0.00";
	$item_info["SHIPPING_ADDITIONAL"] = "0.00";
 
        add_purchase_button($item_info);
?>
</td></tr>
<tr><td colspan=2><hr></td></tr>
<tr><td width="50%">Seal of the Governor of the State of California Fridge Magnet (Version 2) - $2.00<br>(size: 3"x3")<?
        $item_info = array();
	$item_info["DISPLAYNAME"] = "Seal of the Governor Magnet (Alternate)";
	$item_info["PARTNUMBER"] = "603";
	$item_info["UNITPRICE"] = "2.00";
	$item_info["SHIPPING_FIRST"] = "0.00";
	$item_info["SHIPPING_ADDITIONAL"] = "0.00";
 
        add_purchase_button($item_info);
?>
</td><td  align=center valign=middle><a 
    href="javascript:popUpDesign('/images/jacknut/governor_arnold_schwarzenegger_bg_closeup.jpg');"><img border=0
src="/images/jacknut/gov_sticker2_thumb.jpg"><br><font size="-2">click for closeup</font></a></td></tr>
</table>
