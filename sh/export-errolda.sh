#!/bin/bash

while IFS='' read -r line || [[ -n "$line" ]]; do
   IFS='=' read -ra VALUE <<< "$line"
   if [ ${VALUE[0]} = 'user' ]
   then
       user=${VALUE[1]}
   elif [ ${VALUE[0]} = 'password' ]
   then
       password=${VALUE[1]}
   fi
done < ".dbcredentials"

cp /media/errolda/DBWPAYTO.MDB ./errolda.mdb

mdb-schema errolda.mdb mysql > errolda-schema.sql

tables=`mdb-tables errolda.mdb`
rm export-errolda.sql
rm export-errolda.sql.gz
rm truncate-errolda.sql
for i in $tables
do
	echo $i
        echo 'TRUNCATE TABLE '$i';' >> truncate-errolda.sql
	mdb-export -I mysql ./errolda.mdb $i >> export-errolda.sql
done

mysql -u $user -p$password errolda < truncate-errolda.sql
mysql -u $user -p$password errolda < export-errolda.sql
mysql -u $user -p$password errolda < inserts_adaptacion.sql

gzip export-errolda.sql
