<? 

   # start code

  for ($ii = 1; $ii < $nbuttons; $ii++ ) {
    $imgstatus = get_status($button_names[$ii],$current_section);
    $imgid=status2color($imgstatus);
    if ( ! in_section($imgstatus) ) {
      print "<a href=\"/$button_names[$ii]/\"";
      print_rollover($ii,$imgstatus);
      print ">";
    }
    print $navimages[$ii]->img($imgstatus,"hspace=\"7\" border=\"0\"");
    if ( ! in_section($imgstatus) ) {
      print "</a>";
    } 
  }
?>
