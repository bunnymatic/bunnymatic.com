#!/bin/bash

log_date=`date +'%m%d%Y'`
log_fname=`echo image_sync_$log_date.log`
log_filedir="/usr/local/apache/htdocs/obey/"
full_log_fname="$log_filedir$log_fname"
inc_dir="/usr/local/apache/htdocs/obey"

#echo date: $log_date
#echo fname: $log_fname
#echo dir: $log_filedir
#echo fullname: $full_log_fname

mkdir -p "$log_filedir"

if [ -f "$full_log_fname" ]; then
    echo "========== Start Backup " >> $full_log_fname
else
    echo "========== Start Backup " >  $full_log_fname
fi
    
date >>  $full_log_fname
rsync --delete -e ssh --exclude-from $inc_dir/rsync.exc --include-from $inc_dir/rsync.inc -azv /usr/local/apache/htdocs/obey/ skratch@shell4.bayarea.net:/home/vip/skratch/public_html/htdoc/obey >> $full_log_fname 2>&1 
echo '========== End Backup ' >>  $full_log_fname

