<script type="text/javascript">
<!--
   // topnav javascript
<? # phpinit

   # setup javascript button_names array and buttons array
   $button_names = array();
   foreach ($navimages as $nav) {
      array_push($button_names,$nav->name());
   }
   print_js_array("button_names",$button_names,1);

   # setup on and off image names
   print "\n   var $button_imgname = new Array();\n";
   for ($ii = 0; $ii < $nbuttons; $ii++ ) {
      print "   ".$button_imgname."[$ii] = new Array(";
      print "'".$navimages[$ii]->fname("off")."','".$navimages[$ii]->fname("on")."'";
      print ");\n";
   }

   # build image load init

   print "   var nbuttons = $nbuttons;\n";
?>

   function topnav_initialize() {
      for ( var ii = 0; ii < nbuttons; ii ++ ) {
         for ( var jj = 0; jj < 2 ; jj++ ) {
            eval( button_names[ii] +'_'+jj+'= new Image();');
            eval( button_names[ii] +'_'+jj+'.src = btn[ii][jj];');
         }
      }
      return true;
   }
   function topnav_update( btn_idx, new_val ) {
      eval ('document.'+button_names[btn_idx]+
            '.src='+button_names[btn_idx]+'_'+new_val+'.src;');
      return true;
   }
//-->
</script>
