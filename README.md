#Yii2 basic htaccess

![Demo](https://github.com/ilopX/yii2-basic-htaccess/blob/master/example.png)

## Automatic setting
Download file [index.php](https://raw.githubusercontent.com/ilopX/yii2-basic-htaccess/master/index.php) 
and put to root yii2 application and start http//{your_yii2_webapp}. This script created .htaccess files automatically and clear self

## Manual setting
### 1. step
#### create file {root}/.htaccess:
```
<IfModule mod_rewrite.c>
    Options +FollowSymlinks
    RewriteEngine On
</IfModule>
 
<IfModule mod_rewrite.c>
    RewriteCond %{REQUEST_URI} ^/.*
    RewriteRule ^(.*)$ web/$1 [L]

    RewriteCond %{REQUEST_URI} !^/web/
    RewriteCond %{REQUEST_FILENAME} !-f [OR]
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^.*$ web/index.php
</IfModule> 
```
### 2. step 
#### create file {root}/web/.htaccess:
```
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . index.php
```
### 3. step
#### update file {root}/config/web.php:
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
```
