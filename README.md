#Yii2 basic htaccess

![Demo](https://github.com/ilopX/yii2-basic-htaccess/blob/master/example.png)

## a. Automatic setting
This method created .htaccess files automatically and clear self.

+ Download file [index.php](https://raw.githubusercontent.com/ilopX/yii2-basic-htaccess/master/index.php) 
+ Put to root yii2 application and.
+ Start http//{your_yii2_webapp}
+ Follow step 3 in Manual setting


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
