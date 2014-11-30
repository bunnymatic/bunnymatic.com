<?
# functions to handle paypal related stuff

   function add_purchase_button($item_info) {
       global $HTTP_HOST;
       $item_name = $item_info["DISPLAYNAME"];
       print "<!-- ITEM NAME [$item_name] -->\n";
       $item_number = $item_info["PARTNUMBER"];
       $item_price = $item_info["UNITPRICE"];
       $item_shipping1 = $item_info["SHIPPING_FIRST"];
       $item_shipping2 = $item_info["SHIPPING_ADDITIONAL"];
       $item_sizes = $item_info["AVAILABLE_SIZES"];
       $item_colors = $item_info["AVAILABLE_COLORS"];

       $return_url = "http://" .$HTTP_HOST ."/gear/order_success.html";
       $cancel_return_url = "http://" .$HTTP_HOST ."/gear/order_cancel.html";
       $logo_url = "http://" .$HTTP_HOST ."/images/obey/paypal_obey_logo.gif";

       print <<<BUTTONEND
<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart"><input 
   type="hidden" name="business" value="tshirts@obeymiffy.com"><input 
   type="hidden" name="item_name" value="$item_name"><input 
   type="hidden" name="item_number" value="$item_number"><input 
   type="hidden" name="amount" value="$item_price"><input 
   type="hidden" name="shipping" value="$item_shipping1"><input 
   type="hidden" name="shipping2" value="$item_shipping2"><input 
   type="hidden" name="cs" value="1"><input 
   type="hidden" name="currency_code" value="USD"><input
   type="hidden" name="cn" value="Notes/Additional Info?"><input
   type="hidden" name="no_note" value="0"><input
   type="hidden" name="rm" value="1"><input
   type="hidden" name="return" value="$return_url"><input
   type="hidden" name="cancel_return" value="$cancel_return_url"><input
   type="hidden" name="image_url" value="$logo_url"><table>
BUTTONEND;
 if ( count($item_sizes) > 0 ) 
{
print <<<BUTTONEND
<tr><td><font size="-1"><input type="hidden" name="on0" value="Size">Size</font></td><td><font size="-1"><select name="os0">
BUTTONEND;
    foreach ($item_sizes as $sz)
    {
      print "<option value=\"$sz\">$sz</option>";
    }
print <<<BUTTONEND
</select></font>
</td></tr>
BUTTONEND;
  }

if ( count($item_colors) > 0 )
{
print <<<BUTTONEND
<tr><td><font size="-1"><input type="hidden" name="on1" value="Color">Color/Style</font></td><td><font size="-1"><select name="os1">
BUTTONEND;

    foreach ($item_colors as $clr)
    {
      print "<option value=\"$clr\">$clr</option>";
    }
print <<<BUTTONEND
</select></font>
</td></tr>
BUTTONEND;
} 
print <<<BUTTONEND
</table><input type="image" src="/images/obey/add_to_cart_btn.gif" border="0" name="add to cart" alt="Make payments with PayPal - it's fast, free and secure!"><input type="hidden" name="add" value="1"></form>
BUTTONEND;
   }

   function add_viewcart_button() {
       $logo_url = $HTTP_HOST ."/images/obey/paypal_obey_logo.gif";

print <<<BUTTONEND
<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="tshirts@obeymiffy.com">
<input type="image" src="/images/obey/view_cart_btn.gif" border="0" name="view cart" alt="Make payments with PayPal - it's fast, free and secure!">
<input type="hidden" name="display" value="1">
<input type="hidden" name="image_url" value="$logo_url">
</form>
BUTTONEND;
   }  
?>
