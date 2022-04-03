# Настройка веб-сервера

В этой статье описывается несколько способов использования LibArea с Apache или Nginx. При использовании Apache вы можете настроить PHP как модуль Apache или с FastCGI, используя PHP FPM . FastCGI также является предпочтительным способом использования PHP с Nginx.

## Публичный каталог (public)

Публичный каталог (`/public`) является домом для всех общедоступных и статических файлов вашего приложения, включая изображения, таблицы стилей и файлы JavaScript. Там же находится `index.php`.

`public` каталог служит корнем документа при настройке вашего веб-сервера. В приведенных ниже примерах `public/` каталог будет корнем документа. Этот каталог `/var/www/project/public/`.

## Apache с mod_php/PHP-CGI

Минимальная конфигурация для запуска вашего приложения под Apache:

```php
<VirtualHost *:80>
    ServerName domain.ru
    ServerAlias www.domain.ru

    DocumentRoot /var/www/project/public
    <Directory /var/www/project/public>
        AllowOverride All
        Order Allow,Deny
        Allow from All
    </Directory>

    # uncomment the following lines if you install assets as symlinks
    # or run into problems when compiling LESS/Sass/CoffeeScript assets
    # <Directory /var/www/project>
    #     Options FollowSymlinks
    # </Directory>

    ErrorLog /var/log/apache2/project_error.log
    CustomLog /var/log/apache2/project_access.log combined
</VirtualHost>
```

## Использование mod_php/PHP-CGI с Apache 2.4

В Apache 2.4 Order Allow,Denyбыл заменен на Require all granted. Следовательно, вам необходимо изменить Directoryнастройки разрешений следующим образом:

```php
<Directory /var/www/project/public>
    Require all granted
    # ...
</Directory>
```

Дополнительные параметры конфигурации Apache см. в официальной документации [Apache](https://httpd.apache.org/docs/).

## Nginx

Минимальная конфигурация для запуска вашего приложения под Nginx:

```php
server {
    server_name domain.ru www.domain.ru;
    root /var/www/project/public;

    location / {
        # try to serve file directly, fallback to index.php
        try_files $uri /index.php$is_args$args;
    }

    # optionally disable falling back to PHP script for the asset directories;
    # nginx will return a 404 error when files are not found instead of passing the
    # request to LibArea (improves performance but LibArea's 404 page is not displayed)
    # location /bundles {
    #     try_files $uri =404;
    # }

    location ~ ^/index\.php(/|$) {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_split_path_info ^(.+\.php)(/.*)$;
        include fastcgi_params;

        # optionally set the value of the environment variables used in the application
        # fastcgi_param APP_ENV prod;
        # fastcgi_param APP_SECRET <app-secret-id>;
        # fastcgi_param DATABASE_URL "mysql://db_user:db_pass@host:3306/db_name";

        # When you are using symlinks to link the document root to the
        # current version of your application, you should pass the real
        # application path instead of the path to the symlink to PHP
        # FPM.
        # Otherwise, PHP's OPcache may not properly detect changes to
        # your PHP files (see https://github.com/zendtech/ZendOptimizerPlus/issues/126
        # for more information).
        # Caveat: When PHP-FPM is hosted on a different machine from nginx
        #         $realpath_root may not resolve as you expect! In this case try using
        #         $document_root instead.
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        fastcgi_param DOCUMENT_ROOT $realpath_root;
        # Prevents URIs that include the front controller. This will 404:
        # http://domain.ru/index.php/some-path
        # Remove the internal directive to allow URIs like this
        internal;
    }

    # return 404 for all other php files not matching the front controller
    # this prevents access to other php files you don't want to be accessible.
    location ~ \.php$ {
        return 404;
    }

    error_log /var/log/nginx/project_error.log;
    access_log /var/log/nginx/project_access.log;
}
```

Дополнительные параметры конфигурации Nginx см. в *официальной документации Nginx*.

## Локально (XAMPP)

Пример конфигурации для XAMPP, PHP 8.1.2, `httpd-xampp.conf`:

```php
<VirtualHost *:80>
    ServerAdmin webmaster@lib.loc
        DocumentRoot "d:/xampp/htdocs/lib.loc/public"
        ServerName lib.loc
    ServerAlias www.lib.loc
    ErrorLog "d:/xampp/htdocs/lib.loc/error.log"
        CustomLog "d:/xampp/htdocs/lib.loc/access.log"
    <Directory "d:/xampp/htdocs/lib.loc/public">
        Require all granted
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost> 
```

См. [Почему index.php находится в папке public, а не в общей папке?](https://libarea.ru/post/737/pocemu-indexphp-nahoditsya-v-papke-public-a-ne-v-obshchey-papke)

Возможно, это было полезно...

—> [**Перейти на главную страницу**](/ru/)