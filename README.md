godilley/smartsupp-whmcs
================

# About
A custom integration (not supported by Smartsupp themselves) written to include Smartsupp on your website as well as integrate it with logged in clients.

# Installation
Navigate inside the modules folder and run composer install:
```shell
cd modules/addons/smartsupp
composer install
```

Copy the modules folder to your whmcs installation folder. After that you will have to activate
it by going to Setup -> Addon modules (admin/configaddonmods.php) and finding and activating
"Smartsupp WHMCS Module". Then fill out at least the API key and enable it and it will start showing.