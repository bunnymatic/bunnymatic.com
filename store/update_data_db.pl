#!/usr/bin/perl

# $Id: update_data_db.pl,v 1.1 2004/01/10 04:30:20 jon Exp jon $
# $Author: jon $
#
# push tab delimited table into database
#
#
use lib "perl";

use POSIX;
use LWP;
use LWP::UserAgent;
use LWP::Simple;
use Geardb;
use Geardb::Statement;
use File::Basename;
use Getopt::Std;

use strict 'vars';
use vars qw($opt_v $opt_h $opt_c);

my $geardb = new Geardb;

my $progname = basename($0);

getopts("vch");
usage() if $opt_h;
my $verbose = $opt_v;
my $clean_slate = $opt_c;
my $errcheck = 0;
my $TESTMODE = 0;

print "THIS IS NOT READY FOR PRIMETIME!  should be updated to read in a file of entries and populate the store quantities/designs etc";

sub usage() {
print <<_EOUSAGE_

$progname: Add tables to gear database
$progname: Options:
$progname:   -v          be verbose
$progname:   -h          this help message

_EOUSAGE_
;
   exit(-1);
}


my $ctr;
my $query;
my $sth;
		       

if (!$clean_slate) {
  #  get max player id that's already in the drugs_data db
  $query = "select max(id) from player_data";
  $sth = $datadb->query($query,$TESTMODE);
  $datadb->errcheck($query);
  $max_player_id = $sth->fetchrow;
  $max_player_id += 0;  # force integer
  #  select only the new data from the game database
} else {
  print STDERR "($progname) Deleting old tables from drugs_data (clean slate)\n";
  foreach my $tablename (  "player_data", "symptoms", "airways", 
             "action_effects", "actions", "path" ) {
    $query = "delete quick from $tablename";
    $datadb->query($query,$TESTMODE);
    $datadb->errcheck($query);
  }
  $max_player_id=0;
}

print STDERR "($progname) Grabbing data from game database (starting id $max_player_id)\n";

$query = "select * from player_data where id > $max_player_id";
$sth = $gamedb->query($query,$TESTMODE);
$gamedb->errcheck($query);

# for each result, add the appropriate data into the game database
print STDERR "($progname) Putting data into drugs_data database (up to $max_existing_player_id) ";
while (my %row_hash = $sth->fetchhash) {
  populate_player_data(\%row_hash,$datadb);
  populate_symptoms(\%row_hash,$datadb);
  populate_other(\%row_hash,$datadb,"actions");
  populate_other(\%row_hash,$datadb,"action_effects");
  populate_other(\%row_hash,$datadb,"airways");
  populate_other(\%row_hash,$datadb,"path");
  if (!($row_hash{id} % 100)) { 
    print STDERR ".";
  }
  if (!($row_hash{id} % 500)) { 
    print STDERR "$row_hash{id}";
  }
}
print STDERR "done\n";

# popluate the player data in the datadb from the game db
# 
# input args are the row to insert (href) and the db in which
# to do the insertion
sub populate_player_data($$) {
  my ($rowhref,$db) = @_;
  my @dbkeys = ("id","start_time","end_time","end_status","remote_address");
  my @dbvals;
  foreach my $kk (@dbkeys) {
    push(@dbvals, "'".$rowhref->{$kk}."'");
  }

  # construct month,day,year
  push (@dbkeys,"month","day","year");
  my ($timestamp, $year, $month, $day);
  $timestamp = $rowhref->{start_time};
  $year = substr($timestamp,0,4);
  $month = substr($timestamp,4,2);
  $day = substr($timestamp,6,2);

  push (@dbvals, $month, $day, $year);
#  print "$timestamp $year $month $day\n";
  
  
  # ignore means skip any existing rows
  my $query = "replace into player_data (".
              (join ',',@dbkeys) .") values (".
              (join ',',@dbvals) .")";
  $db->query($query,$TESTMODE);
  $db->errcheck($query);
}

sub populate_symptoms($$) {
  my ($rowhref,$db) = @_;
  my $id = $rowhref->{id};
  my @vals = parse_cookie($rowhref->{symptoms},$id);

  my $turnctr = 0;
  my $vv;
  my $query;
  foreach my $aref (@vals) {
    if ( ref($aref) ) {
      foreach $vv (@$aref) {
        next if ($vv == "deleted");  # strange data for players 119, 120
        if ( $vv =~ /\D/) {
	  print "Symytom value seems screwy [$vv]. skipping\n";
 	  next;
        }
	$query = qq[replace into symptoms 
		    (player_id,turn,id)
		    values ($id,$turnctr,$vv) ];
#      print "\n QUERY $query \n" if ($id==5000);
	$db->query($query,$TESTMODE);
	$db->errcheck($query);
      }
    } else {
      $vv = $aref;
      next if ($vv == "deleted");  # strange data for players 119, 120
      if ( $vv =~ /\D/) {
        print "Symytom value seems screwy [$vv]. skipping\n";
	next;
      }
      $query = qq[replace into symptoms 
		  (player_id,turn,id)
		  values ($id,$turnctr,$vv) ];

#      print "\n QUERY $query \n" if ($id==5000);
      $db->query($query,$TESTMODE);
      $db->errcheck($query);
    }      
    $turnctr++;
  }
}

sub populate_other($$$) {
  my ($rowhref,$db,$tablename) = @_;
  my @vals = parse_cookie($rowhref->{$tablename});
  my $id = $rowhref->{id};
  my $turnctr = 0;
  my $query;
  foreach my $vv (@vals) {
    next if ($vv == "deleted");  # strange data for players 119, 120
    $query = qq[replace into $tablename
		(player_id,turn,id)
		values ($id,$turnctr,$vv) ];
    $db->query($query,$TESTMODE);
    $db->errcheck($query);
    $turnctr++;
  }
}

sub parse_cookie($;$) {
  my $cookie = shift ;
  my $pid = shift;
  my @result;
  my $subval;
  # check delimiters
  if ($cookie =~ /:/) {
    # do 2 level split
    my @level1 = split ';', $cookie;
#    print "(parse_cookie)[$pid][$cookie] ".@level1."\n";
    foreach $subval (@level1) {
      my @subvals;
      if ($subval =~ /:/) {
	@subvals = split ':', $subval;
      } else {
        @subvals = ($subval);
      }
      push (@result, \@subvals);
    }
  } else {
    @result = split ';', $cookie;
  }
  return @result;
}
  
		       
sub hashem { return {@_}; }
	       
sub hash_dump($;$){
  my $href = shift;
  my $prefix = shift;
  while(my ($kk,$vv) = each (%$href) ){
    print  "$prefix$kk => $vv<br>\n";
  }
}

