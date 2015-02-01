#!/bin/bash

/usr/bin/mysqld_safe > /dev/null 2>&1 &

RET=1
while [[ RET -ne 0 ]]; do
    echo "=> Waiting for confirmation of MySQL service startup"
    sleep 5
    mysql -uroot -e "status" > /dev/null 2>&1
    RET=$?
done

#ADMINPASS=$(pwgen -s 12 1)
ADMINPASS=welcome

echo "=> Creating MySQL admin user with random password"

mysql -uroot -e "CREATE USER 'admin'@'%' IDENTIFIED BY '$ADMINPASS'"
mysql -uroot -e "GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' WITH GRANT OPTION"

echo "=> Done!"

echo "========================================================================"
echo "You can now connect to this MySQL Server using:"
echo ""
echo "    mysql -uadmin -p$ADMINPASS -h<host> -P<port>"
echo ""
echo "Please remember to change the above password as soon as possible!"
echo "MySQL user 'root' has no password but only allows local connections"
echo "========================================================================"


echo "secure root"
#ROOTPASS=$(pwgen -s 12 1)
ROOTPASS=welcome

mysqladmin -u root password $ROOTPASS

echo "Root pwd is $ROOTPASS"
mysqladmin -uroot -p$ROOTPASS shutdown
