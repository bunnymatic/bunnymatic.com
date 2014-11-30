#!/usr/local/bin/perl
$debug = 1;

# read in list so that each subsequent entry
# goes into the next array
#  
# then we simply print out the arrays;

$lines_per_list = 13;
@entries = ();

@numbers =("one","two","three","four","five","six","seven","eight","nine","ten","eleven","twelve","thirteen");
$ctr = 0;
while (<STDIN>) {
  chomp;
  next if /^#/; 
  push @mylist, $_;
  $ctr++;   
}

$pagectr = 0;
$numentries = scalar(@mylist);
while ( scalar(@mylist)>0 )
  {
    if ( $pagectr > scalar(@numbers) )
      {
	print STDERR "TOO MANY PAGES.  Update the code\n";
	die;
      }
    $fname = "imagelist.".$numbers[$pagectr];
    $numlines = 0;
    open FOUT, ">$fname" || die "can't open $fname\n$!\n";
#   print STDOUT "START $fname-----\n";

    while ( $numlines < $lines_per_list ) 
      {
	if ( scalar(@mylist) <= 0 )
	  {
	    $numlines = $lines_per_list;
	    break;
	  }
	else
	  {
	    print FOUT shift @mylist;
	    print FOUT "\n";
#	    print STDOUT "[$numlines, $pagectr, ".scalar(@mylist) ."] listentry : ";
#	    print STDOUT shift @mylist;
#	    print STDOUT "\n";
	    $numlines ++;
	  }
      }
    $pagectr++;
 #   print STDOUT "END $fname-----\n";
    close FOUT;

  }


