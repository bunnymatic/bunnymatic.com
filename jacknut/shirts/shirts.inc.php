<?

if ( !isset($_GET["ssub"])) 
  {
    $ssub = "womens";
  } 
 else 
   {
  $ssub = $_GET["ssub"];
   }

 if ($ssub=="mens")
   {
     $shirt_subsection="Mens";
     $otherlink = "?ssub=womens";
     $othertext = "Womens";
     $numcols=2;
   }
 else
   {  
     $ssub = "womens";
     $numcols=3;
     $shirt_subsection="Womens";
     $otherlink = "?ssub=mens";
     $othertext = "Mens";
   }

   $shirt_title = $shirt_subsection . " Shirts";
?>
<? require_once "jacknut/paypal.php"; ?><table border=0><tr><td colspan=3>
<table border=0 width="100%">
<tr><td><h3><? print $shirt_title ?><br><font size="-1">(<a href="<? print $otherlink; ?>">click here for <b><? print $othertext; ?> Shirts</b></a>)</font></td>
    <td align=right><? add_viewcart_button(); ?></td></tr>
<td colspan=<? print $numcols;?> align=right><a href="http://www.paypal.com"><img border=0 src="/images/jacknut/paypal_logo.gif"></a><br><font size="-2">For more information about payment <a href="/jacknut/payment_info.html">click here</a></font>
<hr></td></tr>
</table></td></tr>
<tr>
<? if ( $shirt_subsection != "Mens" ) {
?>
  <td><img height=209 src="/i/jacknut/products/seal_baby_blue_small.jpg"></td>
<? }
?>
<td width="50%">Seal of the Governor of the State of California T-Shirt - $18.00<br>
<?
        $item_info = array();
	$item_info["DISPLAYNAME"] = "Seal of the Governor Shirt";
	$item_info["PARTNUMBER"] = "701";
	$item_info["UNITPRICE"] = "18.00";
	$item_info["SHIPPING_FIRST"] = "5.00";
	$item_info["SHIPPING_ADDITIONAL"] = "5.00";

        if ( $shirt_subsection == "Mens" )
        {
            $sizehash = array( "Mens Medium","Mens Large","Mens XLarge (SOLD OUT)");
            $colorhash = array( "Hanes Beefy T - Black",
                                "Hanes Beefy T - Denim Blue",
                                "Hanes Beefy T - Orange");
        }
        else
        {
            $sizehash = array( "Womens Medium","Womens Large" );
            $colorhash = array ( "Baby T - Baby Blue (SOLD OUT)",
                                 "Baby T - Lime",
                                 "Baby T - Pink",
                                 "Baby T - Black" );
        }
        $item_info["AVAILABLE_SIZES"] = $sizehash;
        $item_info["AVAILABLE_COLORS"] = $colorhash;
 
        add_purchase_button($item_info);
?>
</td><td align=center valign=middle><a 
    href="javascript:popUpDesign('/images/jacknut/governor_arnold_schwarzenegger_closeup.jpg');"><img border=0 
    src="/images/jacknut/gov_sticker1_thumb.jpg"><br><font 
    size="-2">click for closeup</font></a></td>
</tr>
<tr><td colspan=<? print $numcols;?>><hr></td></tr>
<tr><td width="50%" align=center valign=middle><a 
    href="javascript:popUpDesign('/images/jacknut/obey_arnold_schwarzenegger_closeup.gif');"><img border=0 
         src="/images/jacknut/obey_arnold_schwarzenegger_sticker_thumb.gif"><br><font size="-2">click for closeup</font></a></td>
<td>Obey Arnold T-Shirt - $18.00<br>
<?
        $item_info = array();
	$item_info["DISPLAYNAME"] = "Obey Arnold T-Shirt";
	$item_info["PARTNUMBER"] = "702";
	$item_info["UNITPRICE"] = "18.00";
	$item_info["SHIPPING_FIRST"] = "5.00";
	$item_info["SHIPPING_ADDITIONAL"] = "5.00";


        if ( $shirt_subsection == "Mens" )
        {
            $sizehash = array( "Mens Medium","Mens Large","Mens XLarge (SOLD OUT)");
            $colorhash = array( "Hanes Beefy T - Black",
                                "Hanes Beefy T - Denim Blue",
                                "Hanes Beefy T - Orange");
        }
        else
        {
            $sizehash = array( "Womens Medium","Womens Large" );
            $colorhash = array ( "Baby T - Baby Blue",
                                 "Baby T - Lime",
                                 "Baby T - Pink",
                                 "Baby T - Black" );
        }
        $item_info["AVAILABLE_SIZES"] = $sizehash;
        $item_info["AVAILABLE_COLORS"] = $colorhash;
 
        add_purchase_button($item_info);
?>
</td>
<? if ( $shirt_subsection != "Mens" ) {
?>
<td align=right><img height=209 src="/i/jacknut/products/obey_lime_small.jpg">
<? }
?>
</td></tr>
<tr><td colspan=<? print $numcols;?>><hr><font size="-1">All shirts are high-quality 100% cotton shirts from Bella (Womens), or Hanes Beefy T (Mens).
</table>
