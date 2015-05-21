# Codeigniter CRUD Generator by [harviacode.com](http://harviacode.com)#

## About : ##

Codeigniter CRUD Generator is a simple tool to auto generate model, controller and view from your table. This tool will boost your writing code. This CRUD generator will make a complete CRUD operation, pagination, search, form* and form validation. This CRUD Generator using bootstrap 3 style. You still need to modify the result code for more customization.

*generate textarea and text input only

Please visit and like [harviacode.com](http://harviacode.com) for more info and PHP tutorials.

## How to use this CRUD Generator : ##

1. Simply put 'harviacode' folder, 'asset' folder and .htaccess file into your codeigniter root folder.
2. Change database configuration in harviacode/lib/config.php.
3. Open http://localhost/codeigniter/harviacode.
4. Write your table name, choose codeigniter version and push generate button.
5. That steps will generate this following files :

* ../application/models/tablename_model.php
* ../application/controllers/tablename.php
* ../application/views/tablename_list.php
* ../application/views/tablename_form.php
* ../application/views/tablename_read.php
* ../application/config/pagination.php

## Important : ##

* On application/config/autoload.php, load database library, session library and url helper.
* On application/config/config.php, set $config['index_page'] = '', $config['url_suffix'] = '.html' and $config['encryption_key'] = 'randomstring'
* On application/config/database.php, set hostname, username, password and database

## Update ##
V.1.1 - 21 May 2015

* Add custom controller name and custom model name
* Add client side datatables

**Copyright 2015 [harviacode.com](http://harviacode.com)**