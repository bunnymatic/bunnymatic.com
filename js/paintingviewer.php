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
  $titles = array();
  $images = array();
  $mediums = array();
  $sizes = array();
  $years = array();
  $solds = array();
  foreach ($picfiles as $picinfo) {
      if ( 0 == preg_match("/^#/",$picinfo)) {
	list($title, $medium, $size, $year, $img, $sold) = explode ("|",$picinfo);
         $img = preg_replace("/\#/", "%23", $img);
         array_push ($titles,trim($title));
         array_push ($mediums,trim($medium));
         array_push ($sizes,trim($size));
         array_push ($years, trim($year));
         array_push ($images, trim($img));
         array_push ($solds, trim($sold));
      }
  }     
  print_js_array("imagelist",$images,1);
  print_js_array("titlelist",$titles,1);
  print_js_array("sizelist", $sizes,1);
  print_js_array("mediumlist", $mediums,1);
  print_js_array("yearlist", $years,1);
  print_js_array("soldlist", $solds,1);
?>

function initialize() {
   
   var ii;
   for ( ii = 0; ii < imagelist.length; ii++ ) {
      var image_name = 'rimage_' + ii;
      eval( image_name  + " = new Image()");
      eval( image_name  + ".src = '" + imagelist[ii] + "'");   
   }

   // last image is obey miffy
   // when we are done loading all the images, then load obeymiffy image
   mouseclick(0);
   return true;
}

function updateCaption(idx) {
   var fontstart = "<font size=\"-1\">";
   var fontend = "</font>";

   eval("document.getElementById('titleinfo').innerHTML = '<b>' + fontstart + titlelist[" + idx + "] + fontend + '</b>'");
   eval("document.getElementById('sizeinfo').innerHTML = fontstart + sizelist[" + idx + "] + fontend ");
   eval("document.getElementById('mediuminfo').innerHTML = fontstart + mediumlist[" + idx + "] + fontend ");
   eval("document.getElementById('yearinfo').innerHTML = fontstart + yearlist[" + idx + "] + fontend");
   eval("document.getElementById('soldinfo').innerHTML = fontstart + soldlist["+idx+"] + fontend");
}
  
function mouseclick( idx ) {
   eval("document.main_window.src=rimage_"+idx+".src");
   updateCaption(idx);
   return true;
}

function mouseover( idx ) {
   eval("document.main_window.src=rimage_"+idx+".src");
   updateCaption(idx);
   return true;
}

function mouseout( idx ) {
    return true;
}
//-->
</script>
