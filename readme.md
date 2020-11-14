## Digital content management system

a digital content distribution system with payment,
feedback and more features. it is written in php with
codeigniter framework.

### usage

for the url to work in local, first modify host file in
the below directory.
`c:\windows\system32\driver\etc\hosts`

```text
#	local domain redirect
	127.0.0.1 dcms.io
```
and also add the following virtual host to apache
virtual host configuration.
`%path to apache%\configuration\extra\http_vhosts.conf`

```text
<VirtualHost *:80>
  DocumentRoot "%path to the index.php%"
  ServerName dcms.io
  Alias /assets "%path to assets%"
  Alias /cdn "%path to cdn"
</VirtualHost>
```