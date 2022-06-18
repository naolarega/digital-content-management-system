## Digital content management system

a digital content distribution system with payment,
feedback and more features. it is written in php with
codeigniter framework.

### usage

for the url to work in local, first modify host file in
the below directory.
`c:\windows\system32\driver\etc\host`

```text
#	local domain redirect
	127.0.0.1 dcms.io
```
and also add the following virtual host to apache
virtual host configuration.
`%path to apache%\config\extra\http-vhost.conf`

```text
<VirtualHost *:80>
  DocumentRoot "%path to dcms%/index.php"
  ServerName dcms.io
  Alias /assets "%path to dcms%/assets/"
  Alias /cdn "%path to dcms%/dcms-content/"
</VirtualHost>
```
create `dcmsdb` database, then import the sql structure. 
setup database credentials inside 
`%path to dcms%/application/config/database.php`

```text
$db['default'] = array(
  ...
  'password' => '',
  ...
)
```
### Dependencies
Dont forget to add codeigniter 3 system files.