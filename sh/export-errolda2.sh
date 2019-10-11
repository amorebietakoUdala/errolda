#!/bin/bash

MOUNTPATH=/media/errolda
SCPATH=/var/www/errolda/sh
mount -l "$MOUNTPATH"

cd "$SCPATH"
cp "$MOUNTPATH/DBWPAYTO.MDB" "$SCPATH/errolda.mdb"
umount "$MOUNTPATH"
mdb-schema "$SCPATH/errolda.mdb" mysql > "$SCPATH/errolda-schema.sql"

rm "$SCPATH/export-errolda.sql.gz"
rm "$SCPATH/truncate-errolda.sql"

printf "Exporting tables:\n"
tables=`mdb-tables $SCPATH/errolda.mdb`
for i in $tables
do
	printf " - $i\n"
	echo 'TRUNCATE TABLE '$i';' >> $SCPATH/truncate-errolda.sql
	mdb-export -I mysql $SCPATH/errolda.mdb $i >> $SCPATH/export-errolda.sql
done

mysql --defaults-extra-file=$SCPATH/export-errolda2.cnf errolda < $SCPATH/truncate-errolda.sql
mysql --defaults-extra-file=$SCPATH/export-errolda2.cnf errolda < $SCPATH/export-errolda.sql
mysql --defaults-extra-file=$SCPATH/export-errolda2.cnf errolda < $SCPATH/inserts_adaptacion.sql

FILESIZE=$(( $( stat -c '%s' "$SCPATH/export-errolda.sql" ) / 1024 / 1024 ))
printf "export-errolda.sql (Normalean 270 MB): $FILESIZE MB\n"

gzip $SCPATH/export-errolda.sql
FILESIZE=$(( $( stat -c '%s' "$SCPATH/export-errolda.sql.gz" ) / 1024 / 1024 ))
printf "export-errolda.sql.gz (Normalean 12 MB): $FILESIZE MB\n"

printf "\nTHE END"
