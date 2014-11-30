<script type="text/javascript">
<!-- 
  // designs_subnav code
<?
   # subnav for sightings

   $subnavimages = array();
   $subnavimages[0] = new NavBar("one",12,24,$IMAGE_URL_PREFIX."/i/obey");
   $subnavimages[1] = new NavBar("two",12,24,$IMAGE_URL_PREFIX."/i/obey");
   $subnavimages[2] = new NavBar("three",12,33,$IMAGE_URL_PREFIX."/i/obey");
   $subnavimages[3] = new NavBar("four",12,26,$IMAGE_URL_PREFIX."/i/obey");
   $subnavimages[4] = new NavBar("five",12,23,$IMAGE_URL_PREFIX."/i/obey");
   $subnavimages[5] = new NavBar("six",12,18,$IMAGE_URL_PREFIX."/i/obey");
   $subnavimages[6] = new NavBar("seven",12,35,$IMAGE_URL_PREFIX."/i/obey");
   $subnavimages[7] = new NavBar("eight",12,30,$IMAGE_URL_PREFIX."/i/obey");
   
   $nsubbuttons = sizeof($subnavimages);

   $idx = 0;
   foreach ( $subnavimages as $tmpnav)
   {
      $subnavlinks[$idx] = "/designs/index.html?sub=" . $tmpnav->displayname();
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
