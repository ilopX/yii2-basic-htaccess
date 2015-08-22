<?php

file_put_contents('.htaccess',
'<IfModule mod_rewrite.c>
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
</IfModule>');

if (!is_dir('web')){
    mkdir('web');
}

file_put_contents('web/.htaccess',
'RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . index.php');

unlink(__FILE__);
header("Location: " . "http://" . $_SERVER['HTTP_HOST']);


