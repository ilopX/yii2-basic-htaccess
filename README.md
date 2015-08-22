#Yii2 basic htaccess

![Demo](https://github.com/ilopX/yii2-basic-htaccess/blob/master/example.png)

## a. Automatic setting
This method created .htaccess files automatically and clear self.

+ Download file [**index.php**](https://cdn.rawgit.com/ilopX/yii2-basic-htaccess/master/index.php) or **composer require ilopx/yii2-basic-htaccess**
+ Put to root yii2 application
+ Start http://{your_yii2_webapp}
+ Follow [step 3 in Manual setting](#3-step) 

### Video Demo
[![Video Demo](http://img.youtube.com/vi/0sxqNaznhlc/1.jpg)](http://www.youtube.com/watch?v=0sxqNaznhlc)

## b. Manual setting
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
