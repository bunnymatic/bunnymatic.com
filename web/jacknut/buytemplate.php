<HTML>
<? 
    require "jacknut/functions.inc.php" ;
    require "jacknut/params.php"; 
?>
<HEAD>
<TITLE><? print get_title_prefix(); if (sizeof($sub) > 0) { print ": $sub";} ?></TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<? print_style(); ?>
<script type="text/javascript" src="/js/jacknut_popup.js"></script>
<script type="text/javascript" src="/js/mailer.js"></script>
<script type="text/javascript">
<!--

   var btn = new Array();
   btn[0] = new Array( '/images/jacknut/shirts_button_brown.gif', '/images/jacknut/shirts_button_purple.gif');
   btn[1] = new Array( '/images/jacknut/stickers_button_brown.gif', '/images/jacknut/stickers_button_purple.gif');
   btn[2] = new Array( '/images/jacknut/magnets_button_brown.gif', '/images/jacknut/magnets_button_purple.gif');

   var button_names = new Array( "shirts_btn", "stickers_btn", "magnets_btn");
   
   function initialize_buttons() {
      for ( var ii = 0; ii < button_names.length; ii ++ ) {
         for ( var jj = 0; jj < 2 ; jj++ ) {
            eval( button_names[ii] +'_'+jj+'= new Image();');
            eval( button_names[ii] +'_'+jj+'.src = btn[ii][jj];');
         }
      }
      return true;
   } 
   
   function mouseover( btn_idx, new_val )
   {
      eval ('document.'+button_names[btn_idx]+
            '.src='+button_names[btn_idx]+'_'+new_val+'.src;');
      return true;
   }
//-->
</script>
</HEAD>
<? print_bodytag(" onLoad=\"javascript:initialize_buttons();\"; ");?>
<!-- ImageReady Slices (weblayout.psd) -->
<TABLE WIDTH=700 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD COLSPAN=2 align=center><a href="/jacknut/"><IMG border=0 
                           SRC="/images/jacknut/weblayout_01.gif" 
                           WIDTH=518 HEIGHT=94 
                     ALT="jacknut : governor arnold schwarzenegger shirts, stickers and magnets"></a></td>
	</TR>
        <tr><TD align="center" COLSPAN=2 HEIGHT=38><? print_text_nav($TOPDIR,1); ?></td></tr>
	<TR>
		<TD valign=top><table><tr><td><a 
                     href="<? print $TOPDIR; ?>shirts/" 
                     onMouseOver="javascript:mouseover(0,1);"
                     onMouseOut="javascript:mouseover(0,0);"
                     ><IMG name="shirts_btn" border=0 SRC="/images/jacknut/shirts_button_brown.gif" WIDTH=202 HEIGHT=135 ALT=""></TD>
                     </td></tr>
	<TR>
		<TD><a 
                     href="<? print $TOPDIR; ?>stickers/" 
                     OnMouseOver="javascript:mouseover(1,1);"
                     onMouseOut="javascript:mouseover(1,0);"
                     ><IMG name="stickers_btn" border=0 SRC="/images/jacknut/stickers_button_brown.gif" WIDTH=202 HEIGHT=93 ALT=""></a></TD>
	</TR>
	<TR>
		<TD><a 
                     href="<? print $TOPDIR; ?>magnets/"
                     OnMouseOver="javascript:mouseover(2,1);"
                     onMouseOut="javascript:mouseover(2,0);"
                     ><IMG name="magnets_btn" border=0 SRC="/images/jacknut/magnets_button_brown.gif" WIDTH=202 HEIGHT=87 ALT=""></a></TD>
	</TR></table></td>
		<TD width=498 valign=top align=left>
<? include $PAGEFILE; ?>
	</TD>
	</TR>
        <tr><TD align="center" COLSPAN=2 HEIGHT=38><? print_text_nav($TOPDIR); ?></td></tr>
</TABLE>
<!-- End ImageReady Slices -->
</BODY>
</HTML>
