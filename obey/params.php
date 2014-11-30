<?
   # GLOBAL PARAMS

   $MAINTABLEHEIGHT=450;
   $MAINTABLEWIDTH=650;

   require_once("obey/functions.inc.php");
   require ("obey/class.NavBar.php");

   $IMAGE_URL_PREFIX = "";
   $ctr = 0;
   $navimages = array();
   
   $homeimg = "home";
   if ( ispill() )
   {
      $homeimg = "homepill";
   }
   if ( isbunnymatic() )
   {
      $homeimg = "homebmatic";
   }
   $navimages[$ctr] = new NavBar( $homeimg,72,72,$IMAGE_URL_PREFIX."/i/obey");
   $ctr ++;
   $navimages[$ctr] = new NavBar("paint",23,57,$IMAGE_URL_PREFIX."/i/obey");
   $ctr ++;
   $navimages[$ctr] = new NavBar("designs",23,83,$IMAGE_URL_PREFIX."/i/obey");
   $ctr ++;
   $navimages[$ctr] = new NavBar("sightings",23,98,$IMAGE_URL_PREFIX."/i/obey");
   $ctr ++;
#   $navimages[$ctr] = new NavBar("movies",23,78,$IMAGE_URL_PREFIX."/i/obey");
#   $ctr ++;
   #$navimages[$ctr] = new NavBar("gear",23,51,$IMAGE_URL_PREFIX."/i/obey");
   #$ctr ++;
   $navimages[$ctr] = new NavBar("other",23,57,$IMAGE_URL_PREFIX."/i/obey");
   $ctr ++;
   $navimages[$ctr] = new NavBar("links",23,52,$IMAGE_URL_PREFIX."/i/obey");
   $ctr ++;

   $button_imgname = "btn";
   
   $nbuttons = sizeof($navimages);

?>
