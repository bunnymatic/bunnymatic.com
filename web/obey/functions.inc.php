<?

   # global functions

   function ispill() {
      return (preg_match("/pill/i", $_SERVER["HTTP_HOST"]));
   }
   function isbunnymatic() {
      return (preg_match("/bunnymatic/i", $_SERVER["HTTP_HOST"]));
   }
   function encodeimagename($imgfile) {
      $filename_parts = explode("\/", $imgfile);
      $numparts = sizeof($filename_parts);
      $filename_parts[$numparts-1] = urlencode($filename_parts[$numparts-1]);
      $imgfile = implode($filename_parts,"/");
      return ($imgfile);
   }

   function print_js_array($arrayname,$array,$quote = 0) {
      if ($quote) {
         for ($ii = 0; $ii < sizeof($array); $ii++) {
            $array[$ii] = "  \"" .$array[$ii]. "\"";
         }
      }
      print "var $arrayname = new Array(\n";
      print (join ($array, ",\n"));
      print ");\n";
   }

   function color2hex($color) {
      $color_array = array( "white"=>"#ffffff",
                            "black"=>"#000000",
                            "yellow"=>"#ffffcc",
                            "green"=>"#99cc00",
                            "orange"=>"#ff9900",
                            "purple"=>"#996699");
      return ($color_array[$color]);
   }
   function status2color($stat) {
      $stat_array = array( "off"=>"purple",
                            "on" =>"green",
                            "in" =>"yellow",
                            "opt" =>"orange");
      return ($stat_array[$stat]);
   }
   function textcolor($stat) { 
      $stat_array = array( "off"=>"yellow",
                            "on" =>"green",
                            "in" =>"yellow",
                            "opt" =>"orange");
      return ($stat_array[$stat]);
   }
   function get_page_title($page) {
      # return self without html page name
      $site = "bunnymatic";
      if ( ispill() )
      {
          $site = "my little pill";
      }
      elseif ( isbunnymatic() )
      {
          $site = "bunnymatic";
      }
      else
      {
          $site = "bunnymatic";
      }
      $title = dirname($page);
      $servername = $_SERVER['HTTP_HOST'];
      $title = preg_replace( "/^$servername/","", $title);

      return ("[$site $title : cool stickers, shirts, street art]");
   }

   function get_status($name,$sect) {
      if (strcmp($name,$sect)==0) {
         return ("in");
      } else {
         return ("off");
      }
   }
 
   function in_section($status) {
      if (strcmp($status,"in")!=0) { 
        return (0);
      } else {
        return (1);
      }
   } 

   function print_rollover($ii,$status) {
      if (strcmp($status,"in")!=0) { 
         print " onMouseOver=\"topnav_update($ii,1);\"" 
              ." onMouseOut=\"topnav_update($ii,0);\" \n";
      } 
   }  

   function print_subnav_rollover($ii,$status) {
      if (strcmp($status,"in")!=0) { 
         print " onMouseOver=\"subnav_update($ii,1);\"" 
              ." onMouseOut=\"subnav_update($ii,0);\" \n";
      } 
   }  

   function print_style($linkmods="") {
      print "<style type=\"text/css\">\n"
          . " body,div,td,th,a,span "
          . "{ font-family: Verdana, Helvetica, Arial, sans-serif }\n"
          . $linkmods
          . "</style>\n"
          . "<meta name=\"description\" content=\"The best place to get cool bunnymatic, my little pill, and electricat stickers and shirts\">\n"
          . "<meta name=\"keywords\" content=\"obey giant"
          . " my little pill bunny matic bunnymatic stickers art"
          . " propaganda flash movies stop-action movies "
          . " stickers graffiti street art sanrio\">\n";

   }

   function print_bodytag($additions="") {
      print "<body bgcolor=\"".color2hex("black")."\""
            ." text=\"".color2hex(textcolor("off")) ."\""
            ." link=\"".color2hex(textcolor("on")) ."\""
            ." vlink=\"".color2hex(textcolor("opt")) ."\""
            ." alink=\"".color2hex(textcolor("in"))."\" "
            .$additions.">\n";
   }
?>
