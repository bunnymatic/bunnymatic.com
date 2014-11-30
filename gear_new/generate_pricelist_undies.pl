#!/usr/bin/perl

# generate part number with shirt size/price etc

use File::Basename;
use Getopt::Std;
use FileHandle;

$progname = basename $0;

sub usage()
  {
    print "[$progname] Generate pricelist from files\n";
    print "[$progname] Options:\n";
    print "[$progname]  -h           help\n";
    print "[$progname]  -D           run in debug mode\n";
    print "[$progname] Usage: $progname [-D] file1 [file2 ...]\n";
    exit(-1);
  }

# setup defaults
$delimiter = '|';

getopts("hDd:");
if ($opt_D)
  {
    $debug = 1;
  }
if ( $opt_h )
  {
    usage();
  }
if ( $opt_d )
  {
    $delimiter = $opt_d;
  }
# filelist is good after getops has removed all the args
@files = @ARGV;
    foreach $file ( @files )
      {
	if (! open FIN, $file )
	  {
	    print STDERR "[$progname] there were problems opening the file $file\n";
	    print STDERR "[$progname] skipping\n";
	  }
	process_file(FIN);
	close FIN;
      }


sub process_file( $ ) 
  {
    $fp = new FileHandle;
    $fp = shift;
    $ctr = 0;
    if ( $fp )
      {
	while (<$fp>)
	  {
	    $ctr ++;
	    chomp ;
#	    print $_. "\n";
	    ($id, $display, $img, $img2, $price, $shipping1, $shipping2) = split /\Q$delimiter\E/;
            foreach $style ("Thong", "Bikini")
	      {
		foreach $color ("White")
		  {
                    $idstyle = $id . substr($style,0,1);
		    print "$idstyle \"$display\" $color $style - $price [$shipping1:$shipping2]\n";
		  }
	      }
	  }
      }
  }
