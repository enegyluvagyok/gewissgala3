<?php

        putenv("HOME=".getcwd());

 

        copy('https://getcomposer.org/installer', 'composer-setup.php');

 

        exec("/usr/local/php8.2/bin/php composer-setup.php 2>&1",$x);

 

        if (is_file("composer-setup.php"))

                      {

                $m=exec("/usr/local/php8.3/bin/php -d memory_limit=384M composer.phar require monolog/monolog 2>&1",$x);

        }

        else

        {

                echo "Hiba a letoltesben!";

        }

 

print_r($m);

print_r($x);