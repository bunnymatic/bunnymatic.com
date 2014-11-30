<?

  for ($ii = 0; $ii < $nsubbuttons; $ii++ ) {
    $imgstatus = get_status($subnav_displaynames[$ii],$current_subsection);
    $imgid=status2color($imgstatus);
    if ( ! in_section($imgstatus) ) {
      print "<a href=\"$subnavlinks[$ii]\"";
      print_subnav_rollover($ii,$imgstatus);
      print ">";
    }
    print $subnavimages[$ii]->img($imgstatus,"hspace=\"10\" border=\"0\"");
    if ( ! in_section($imgstatus) ) {
      print "</a>";
    } 
  }

?>
