#!/bin/sh
#
# @author: Jabran Rafique <hello@jabran.me>
# @link: http://jabran.me/articles/automatic-database-backup-using-git-hosting/

# Set variables
FULLDATE      = $(date +"%Y-%d-%m %H:%M")
NOW           = $(date +"%Y-%m-%d-%H-%M")
MYSQL_DUMP    = `which mysqldump`
GIT           = `which git`
DB_NAME       = "dethi"
CRON_USER     = "root"
TEMP_BACKUP   = "latest_backup.sql"
BACKUP_DIR    = $(date +"%Y/%m")

# Check current Git status and update
${GIT} status
${GIT} pull commitphp master

# Dump database
${MYSQL_DUMP} -u "$CRON_USER" $DB_NAME > $TEMP_BACKUP & 
wait

# Make backup directory if not exists (format: {year}/{month}/)
if [ ! -d "$BACKUP_DIR" ]; then
  mkdir -p $BACKUP_DIR
fi

# Compress SQL dump
tar -cvzf $BACKUP_DIR/$DB_NAME-$NOW-sql.tar.gz $TEMP_BACKUP

# Remove original SQL dump
rm -f $TEMP_BACKUP

# Add to Git and commit
${GIT} add -A
${GIT} commit -m "Automatic backup - $FULLDATE"
${GIT} push commitphp master