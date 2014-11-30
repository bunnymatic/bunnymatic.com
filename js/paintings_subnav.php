<script type="text/javascript">
<!-- 
<?
   # subnav for sightings

   $subnav_link_dir = "/paint/";
   $subnavimages = array();
   $_imagecounter_ = 0;

   print "// subsection $current_subsection\n";
   # different menus if this is the paint page or the info page
    if ($current_subsection != "subinfo") {
      $subnavimages[$_imagecounter_++] = new NavBar("one",12,24,$IMAGE_URL_PREFIX."/i/obey");
      $subnavimages[$_imagecounter_++] = new NavBar("two",12,24,$IMAGE_URL_PREFIX."/i/obey");
      $subnavimages[$_imagecounter_++] = new NavBar("three",12,33,$IMAGE_URL_PREFIX."/i/obey");
      $subnavimages[$_imagecounter_++] = new NavBar("four",12,26,$IMAGE_URL_PREFIX."/i/obey");
      $subnavimages[$_imagecounter_++] = new NavBar("five",12,23,$IMAGE_URL_PREFIX."/i/obey");
      $subnavimages[$_imagecounter_++] = new NavBar("six",12,18,$IMAGE_URL_PREFIX."/i/obey");
      $subnavimages[$_imagecounter_++] = new NavBar("seven",12,35,$IMAGE_URL_PREFIX."/i/obey");

      $subnavimages[$_imagecounter_++] = new NavBar("subinfo",12,36,$IMAGE_URL_PREFIX."/i/obey");

      $idx = 0;
      foreach ( $subnavimages as $tmpnav)
      {
         $subnavlinks[$idx] = $subnav_link_dir . "page.html?sub=" . $tmpnav->displayname();
         $idx++;
      }
   } 
   else {
      $subnavimages[$_imagecounter_++] = new NavBar("subworks",12,36,$IMAGE_URL_PREFIX."/i/obey");
      $subnavimages[$_imagecounter_++] = new NavBar("subinfo",12,36,$IMAGE_URL_PREFIX."/i/obey");

      $subnavlinks[0] = $subnav_link_dir . "page.html?sub=one";
      $subnavlinks[1] = $subnav_link_dir . "page.html?sub=subinfo";
   }
   
   $nsubbuttons = $_imagecounter_;

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
