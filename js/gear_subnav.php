<script type="text/javascript">
<!-- 
  // designs_subnav code
<?
   # subnav for sightings

   $subnavimages = array();
   $ctr = 0;
#   $subnavimages[$ctr] = new NavBar("hoodies",12,47,$IMAGE_URL_PREFIX."/i/obey");
#   $ctr++;

   $subnavimages[$ctr] = new NavBar("tshirts1",12,60,$IMAGE_URL_PREFIX."/i/obey");
   $ctr++;

   $subnavimages[$ctr] = new NavBar( "tshirts2",12,62,$IMAGE_URL_PREFIX."/i/obey");
   $ctr++;

   $subnavimages[$ctr] = new NavBar( "undies",12,40,$IMAGE_URL_PREFIX."/i/obey");
   $ctr++;

   $nsubbuttons = $ctr;
   $idx = 0;
   foreach ( $subnavimages as $tmpnav)
   {
      $subnavlinks[$idx] = "/gear/index.html?sub=" . $tmpnav->displayname();
      $idx++;
   }

   $subnav_name = "subbtn";

   $subnav_names = array();
   $subnav_displaynames = array();
   foreach ($subnavimages as $nav) {
      array_push($subnav_names,$nav->name());
      array_push($subnav_displaynames,$nav->displayname());
   }
   print_js_array("subnav_names",$subnav_names,1);
   print_js_array("subnav_displaynames",$subnav_names,1);

   # setup on and off image names
   print "\n   var $subnav_name = new Array();\n";
   for ($ii = 0; $ii < $nsubbuttons; $ii++ ) {
      print "   ".$subnav_name."[$ii] = new Array(";
      print "'".$subnavimages[$ii]->fname("off")."','".$subnavimages[$ii]->fname("on")."'";
      print ");\n";
   }

   # build image load init

   print "   var nsubbuttons = $nsubbuttons;\n";

?>

   function subnav_initialize() {
      for ( var ii = 0; ii < nsubbuttons; ii ++ ) {
         for ( var jj = 0; jj < 2 ; jj++ ) {
            eval( subnav_names[ii] +'_'+jj+'= new Image();');
            eval( subnav_names[ii] +'_'+jj+'.src = <?print $subnav_name;?>[ii][jj];');
         }
      }
      return true;
   }
   function subnav_update( btn_idx, new_val ) {
      eval ('document.'+subnav_displaynames[btn_idx]+
            '.src='+subnav_names[btn_idx]+'_'+new_val+'.src;');
      return true;
   }

//-->
</script>
