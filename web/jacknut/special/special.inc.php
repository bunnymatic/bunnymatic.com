<? $numcols=2 ?>
<? require_once "jacknut/paypal.php"; ?><table border=0 cellpadding=5><tr><td colspan=3>
<table border=0 width="100%">
<tr><td><h3>Special Payments<br><font size="-1">
    <td align=right><? add_viewcart_button(); ?></td></tr>
<td colspan=<? print $numcols;?> align=right><a href="http://www.paypal.com"><img border=0 src="/images/jacknut/paypal_logo.gif"></a><br><font size="-2">For more information about payment <a href="/jacknut/payment_info.html">click here</a></font>
<hr></td></tr>
</table></td></tr>
<tr>
<td>If you have already mailed us about ordering a shirt, and have confirmed that we have the shirt in stock, and can do the rush shipment, you can use this item to add the rush payment.  <b>Do not assume rush service unless you've already received confirmation from us on stock availability</b></td>
<td width="50%">Rush Service Payment - $12.00<br>
<?
        $item_info = array();
	$item_info["DISPLAYNAME"] = "Additional Rush Service (FedEx 2Day)";
	$item_info["PARTNUMBER"] = "1001";
	$item_info["UNITPRICE"] = "12.00";
	$item_info["SHIPPING_FIRST"] = "0.00";
	$item_info["SHIPPING_ADDITIONAL"] = "3.00";

        add_purchase_button($item_info);
?>
</tr>
<tr><td colspan=<? print $numcols;?>><hr></td></tr>
</table>
