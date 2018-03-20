---
title: Installation
description: Documentation for Flextype Developers and Flextype Users.
template: documentation
---

## Using (S)FTP{.margin-top-hard}

[Download the latest version.](http://Flextype.org/download)  

Unzip the contents to a new folder on your local computer, and upload to your webhost using the (S)FTP client of your choice. After you’ve done this, be sure to chmod the following directories (with containing files) to `777`, so they are readable and writable by Flextype:  
* `cache/`
* `config/`
* `storage/`
* `themes/`
* `plugins/`

## Using Composer

You can easily install Flextype with Composer.

```
composer create-project Flextype/Flextype
```

Also you may need to install vendor libs for Default Theme
```
cd /Flextype/themes/default  
bower install
```


## Using command-line

If you have command-line access, you can easily install Flextype by executing a few commands. First, create the directory where you want to install Flextype, if it doesn’t already exist. Enter the directory, and execute the following commands:  

```
wget https://github.com/Flextype/Flextype/releases/download/v2.0.4/Flextype-2.0.4.zip
unzip Flextype-2.0.4.zip
chmod -R 0777 cache/ config/ storage/ themes/ plugins/
```
