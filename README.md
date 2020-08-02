## Prerequisites
 - Apache Xampp >= 7.4.4
 - MySQL >= 5.7
 - PHP >= 7.4
 - phpMyAdmin >= 5.0.2

| Type           | Value                  |
|----------------|------------------------|
| MySQL Username | root                   |
| Mysql Password |                        |
| Mysql Database | my_app                 |

## Getting your Environment Setup
 - Clone this repository on your machine
```https://github.com/Zolak94/my_app```
 - Install Apache Xampp on your machine
 - Update your `/etc/hosts` file by adding this line at the end of file
```127.0.0.1   	testbox.test```
 - Next step you need to open
```/xampp/apache/conf/extra/httpd-vhosts.conf```
and add this with path to your project repository.
```
<VirtualHost *:80>
   ServerName testbox.test
   DocumentRoot "C:/private/my_app"
   <Directory "C:/private/my_app">
        Options Indexes FollowSymLinks MultiViews
        AllowOverride all
        Order Deny,Allow
        Allow from all
        Require all granted
   </Directory>
</VirtualHost>
```
 - Start Xampp application and then start Apache module and MySQL module