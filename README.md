#Yii2 basic htaccess
root/.htaccess:
```
<IfModule mod_rewrite.c>
    Options +FollowSymlinks
    RewriteEngine On
</IfModule>
 
<IfModule mod_rewrite.c>
    RewriteCond %{REQUEST_URI} ^/(assets|css|js|images)
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
