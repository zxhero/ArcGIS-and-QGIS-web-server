# ��ubuntu 16-04��װQGIS SEVER+Lizmap+QGIS<br>
<br>
### ���²�����rootȨ�������<br>
## Installing necessary packages<br>
>#apt update<br>
>#apt install xauth htop curl apache2 libapache2-mod-fcgid libapache2-mod-php7.0 php7.0-cgi php7.0-gd php7.0-sqlite php7.0-curl php7.0-xmlrpc python-simplejson software-properties-common<br>
<br>
## php7 configuration<br>
<br>
> #cat > /etc/apache2/conf-available/php.conf << EOF 
>> <Directory /usr/share> 
>>> AddHandler fcgid-script .php 
>>> FCGIWrapper /usr/lib/cgi-bin/php5 .php 
>>> Options ExecCGI FollowSymlinks Indexes 
>> </Directory>  
>> <Files ~ (\.php)>
>>> AddHandler fcgid-script .php
>>> FCGIWrapper /usr/lib/cgi-bin/php5 .php
>>> Options +ExecCGI
>>> allow from all
>> </Files>
> EOF
<br>
> #a2enconf php <br>
<br>
## mpm-worker configuration <br>
<br>
> #nano /etc/apache2/apache2.conf # aller au worker et mettre par exemple
>> <IfModule mpm_worker_module>
>>> StartServers       4
>>> MinSpareThreads    25
>>> MaxSpareThreads    100
>>> ThreadLimit          64
>>> ThreadsPerChild      25
>>> MaxClients        150
>>> MaxRequestsPerChild   0
>> </IfModule>
 <br>
## mod_fcgid configuration <br>
<br>
> #nano /etc/apache2/mods-enabled/fcgid.conf
>> <IfModule mod_fcgid.c>
>>> AddHandler    fcgid-script .fcgi
>>> FcgidConnectTimeout 300
>>> FcgidIOTimeout 300
>>> FcgidMaxProcessesPerClass 50
>>> FcgidMinProcessesPerClass 20
>>> FcgidMaxRequestsPerProcess 500
>>> IdleTimeout   300
>>> BusyTimeout   300
>> </IfModule>
<br>
## Setting the compression<br>
<br>
> #nano /etc/apache2/conf-available/mod_deflate.conf
>> <Location />
>>        # Insert filter
>>        SetOutputFilter DEFLATE
>>        # Netscape 4.x encounters some problems ...
>>        BrowserMatch ^Mozilla/4 gzip-only-text/html
>>        # Netscape 4.06-4.08 encounter even more problems
>>        BrowserMatch ^Mozilla/4\.0[678] no-gzip
>>        # MSIE pretends it is Netscape, but all is well
>>        BrowserMatch \bMSIE !no-gzip !gzip-only-text/html
>>        # Do not compress images
>>        SetEnvIfNoCase Request_URI \.(?:gif|jpe?g|png)$ no-gzip dont-vary
>>        # Ensure that proxy servers deliver the right content
>>        Header append Vary User-Agent env=!dont-vary
>> </Location>
<br>
> #service apache2 restart
> # mkdir /home/data
> #mkdir /home/data/cache/
<br>
## QGIS Server <br>
����Դ��https://qgis.org/en/site/forusers/alldownloads.html#debian-ubuntu
> #cat /etc/apt/sources.list.d/debian-gis.list
>> deb http://qgis.org/ubuntu xenial main
>> deb-src http://qgis.org/ubuntu xenial main
> #sudo apt-get update
> #sudo apt-get install qgis-server python-qgis
## ����QGIS SERVER��װ�ɹ�<br>
> #/usr/lib/cgi-bin/qgis_mapserv.fcgi
<br>
## QGIS <br>
�ο�http://htmlpreview.github.io/?https://raw.github.com/qgis/QGIS/master/doc/INSTALL.html
<br>
## install Lizmap Web Client <br>
��װ����https://github.com/3liz/lizmap-web-client/releases/
<br>
> #cd /var/www/
> #wget https://github.com/3liz/lizmap-web-client/archive/3.1.14.zip
> #unzip lizmap-web-client-3.1.14.zip
> #ln -s /var/www/lizmap-web-client-3.1.14/lizmap/www/ /var/www/html/lm
> #cd /var/www/lizmap-web-client--3.1.14/
> #lizmap/install/set_rights.sh www-data www-data
> #cd lizmap/var/config
> #cp lizmapConfig.ini.php.dist lizmapConfig.ini.php
> #cp localconfig.ini.php.dist localconfig.ini.php
> #cp profiles.ini.php.dist profiles.ini.php
> #cd ../../..
> #php lizmap/install/installer.php
<br>
��ʱ�ɴ�http://127.0.0.1/lm <br>
������403������apache2�Ƿ�� <br>
> #service apache2 status
��δ�򿪣����80�˿��Ƿ�ռ�� <br>
> #lsof -i :80
> #kill ���̺�
> #service apache2 start
<br>
������500 <br>
> #cd /var/www/lizmap-web-client-3.1.14/
> #lizmap/install/set_rights.sh www-data www-data
<br>
����װʱ����can not find module lxml <br>
> #pip3 install lxml

�ο��ĵ�<br>
> https://docs.3liz.com/en/install/linux.html
> https://docs.qgis.org/testing/en/docs/training_manual/qgis_server/install.html