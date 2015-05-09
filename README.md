#Yii2 basic htaccess
root/.htaccess:
```
<IfModule mod_rewrite.c>
    Options +SymLinksIfOwnerMatch
    RewriteEngine On
</IfModule>
 
<IfModule mod_rewrite.c>
    RewriteCond %{REQUEST_URI} ^/.*
    #RewriteRule ^assets/(.*)$ /web/assets/$1 [L]
    #RewriteRule ^css/(.*)$ web/css/$1 [L]
    #RewriteRule ^js/(.*)$ web/js/$1 [L]
    #RewriteRule ^images/(.*)$ web/images/$1 [L]
    RewriteRule ^(.*)$ web/$1 [L]

    RewriteCond %{REQUEST_URI} !^/web/
    RewriteCond %{REQUEST_FILENAME} !-f [OR]
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^.*$ web/index.php
</IfModule> 
```
root/web/.htaccess:
```
# Если это папка или файл, открываем его
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
# В противном случае перенаправляем на index.php
RewriteRule . index.php
```
root/config/web.php:
```php
'request' => [
    'baseUrl' => '',
],
'urlManager' => [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        '' => 'site/index',
        '<action>'=>'site/<action>',
    ],
],
'assetManager' => [
    'basePath' => '@webroot/assets',
    'baseUrl' => '@web/assets'
],
```
