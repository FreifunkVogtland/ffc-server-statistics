#!/bin/bash
vnstat -u
source /var/www/vnstat/stats.conf
for interface in $interfaces; do
for output in $outputs; do
  vnstat -u -i ${interface}
  vnstati -${output} -i ${interface} -o ${wwwroot}/${interface}_${output}.png
done
done
