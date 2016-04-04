ContestWeb
=======================

Introduction
------------
This is a webset built by ZendFrameWork2 for college students communicate with each other on a variety of contest.<br/>
This webset is consist of two main module. A Forum module for communicating which consists of recruit and resources sharing
and a recommend system based on collabrative filtering which can be found in my another responsity [recommender-cpp](https://github.com/whiteivory/recommender-cpp).


Using Composer (recommended)
----------------------------
The recommended way to get a working copy of this project is to clone the repository
and use `composer` to install 

first clone this resoponsity
    cd my/project/dir
    git clone https://github.com/whiteivory/CotestWeb_.git
Then use composer to install vender, make sure you are in the git dir, because the nessary file composer.lock and composer.json is in this file
    curl -s https://getcomposer.org/installer | php --
    php composer.phar self-update
    php composer.phar install
(The `self-update` directive is to ensure you have an up-to-date `composer.phar`
available.)


Web Server Setup
----------------

### Apache Setup
You must also ensure that Apache is configured to support .htaccess files. This is usually done by changing the setting:
    AllowOverride None
    to
    AllowOverride FileInfo
    accoriding [zf2 document](http://framework.zend.com/manual/current/en/user-guide/overview.html)<br/>

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:
(note that you should block the servername in your host file)
    <VirtualHost *:80>
        ServerName www.contestweb.com
        DocumentRoot /path/to/dir/public
        SetEnv APPLICATION_ENV "development"
        <Directory /path/to/dir/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>
