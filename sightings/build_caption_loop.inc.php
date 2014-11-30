<?
         for ($ii = 0; $ii < sizeof($captions); $ii++) {
            print "<tr><td valign=\"top\" align=\"right\"><font size=\"-1\">o&nbsp;</font></td><td valign=\"top\">"
                 ."<a href=\"javascript:void()\" "
                 ."onMouseOver=\"mouseover($ii)\">"
                 ."<font size=\"-2\">$captions[$ii]</font></a></td>"
                 ."</tr>\n";
         }
?>
