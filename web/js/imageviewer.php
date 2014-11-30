<script type="text/javascript">
<!--
var _doneLoading = false;

<? # php build image list

  if ( $IMAGELIST_FNAME ) {
    $fname = $IMAGELIST_FNAME;
  } else {
    $fname = "./imagelist.txt";
  }
  if ( file_exists($fname)) {
    $picfiles = file( $fname );
  } else {
    print "ERROR LOCATING IMAGE LIST FILE ($fname)\n";
  }
  $num_images = sizeof($picfiles);
  
  $ctr = 0;
  $captions = array();
  $images = array();
  $aifiles = array();
  foreach ($picfiles as $picinfo) {
      if ( 0 == preg_match("/^#/",$picinfo)) {
	list($caption,$img,$ai) = explode ("|",$picinfo);
         array_push ($captions,trim($caption));
         array_push ($images,trim($img));
         array_push ($aifiles, trim($ai));
      }
  }     
  print_js_array("imagelist",$images,1);
//  print_js_array("captionlist",$captions,1);

?>

function initialize() {
   
   var ii;
   for ( ii = 0; ii < imagelist.length; ii++ ) {
      var image_name = 'rimage_' + ii;
      eval( image_name  + " = new Image()");
      eval( image_name  + ".src = '" + imagelist[ii] + "'");   }

   // last image is obey miffy
   // when we are done loading all the images, then load obeymiffy image
   mouseclick(0);
   return true;
}

function mouseclick( idx ) {
   eval("document.main_window.src=rimage_"+idx+".src");
   return true;
}

function mouseover( idx ) {
   eval("document.main_window.src=rimage_"+idx+".src");
   return true;
}

function mouseout( idx ) {
    return true;
}
//-->
</script>

