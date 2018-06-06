# MySQL-dump: save a copy of the actual content in the database. (this is for a Drupal site, the backup is done using drupal's drush)
php -c ~/www/php.ini  ~/drush/drush.php -r /home/adrimej0/www -u 1 sql-dump --result-file=latest.sql

# Git: add and commit changes
cd /var/www/html/php/baitap1 && /usr/bin/git commit -a -m "hour crontab backup `date`"

# send data to Git server
cd /var/www/html/php/baitap1 && /usr/bin/git push commitphp master