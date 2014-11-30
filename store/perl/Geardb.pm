#
package Geardb;

use Mysql;
@ISA = qw(Mysql);

sub new() {
  my $info = { host => "localhost",
	       name => "gear",
	       user => "pill",
	       pass => "eat!this" };
  my $self = Mysql->connect($info->{host},$info->{name},
			    $info->{user},$info->{pass});
  bless $self;
  return ($self);
}

sub query($$$) {
  my ($self,$query,$testmode) = @_;
  if ($testmode) {
    return (1);
  } else {
    return ($self->Mysql::query($query));
  }
}

sub type_info($;$) {
  my ($self,$arg) = @_;
  $dbh = $self->{dbh};
  return ($dbh->type_info($arg));
}
  
sub errcheck($;$) {
  my ($self, $qq) = @_;
  if ($self->errno) {
    print STDERR "DBERROR(" .$self->errno."):". $self->errmsg ."\n";
    if ($qq) {
      print STDERR "DBERROR(" .$self->errno."): query $qq\n";
    }
    exit(-1);
  }
}


1;
