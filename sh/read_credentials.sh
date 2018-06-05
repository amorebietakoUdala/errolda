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
