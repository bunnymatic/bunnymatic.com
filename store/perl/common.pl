# common perl funcs


use POSIX;

# return timestamp in perl::localtime format
# ($sec,$min,$hr,$mday,$mon,$yr,$wday,$yday,$isdst) 
# this may not be fully populated ($mday, $wday,$yday,$isdst will be empty)

sub timestamp_to_localtime($) {
  my $tstamp = shift;
  my $year = substr($tstamp,0,4);
  my $month = substr($tstamp,4,2);
  my $day = substr($tstamp,6,2);
  my $hour = substr($tstamp,8,2);
  my $minute = substr($tstamp,10,2);
  my $second = substr($tstamp,12,2);
  return ($second, $minute, $hour,$day,$month-1,$year-1900);
}

# convert db timestamp to unix time
sub timestamp_to_unixtime($) {
  return(POSIX::mktime(timestamp_to_localtime(shift)));
}

# convert db timestamp to date 
sub timestamp_to_date($) {
  return(POSIX::strftime("%b %d %H:%M:%S %Y",timestamp_to_localtime(shift)));
}

sub unixtime_to_date($) {
  return(POSIX::strftime("%b %d %H:%M:%S %Y",localtime(shift)));
}  
1;
