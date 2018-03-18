---
title: Installation
description: Documentation for Fansoro Developers and Fansoro Users.
template: index
---

## Using (S)FTP{.margin-top-hard}

[Download the latest version.](http://fansoro.org/download)  

Unzip the contents to a new folder on your local computer, and upload to your webhost using the (S)FTP client of your choice. After you’ve done this, be sure to chmod the following directories (with containing files) to `777`, so they are readable and writable by Fansoro:  
* `cache/`
* `config/`
* `storage/`
* `themes/`
* `plugins/`

## Using Composer

You can easily install Fansoro with Composer.

```
composer create-project fansoro/fansoro
```

Also you may need to install vendor libs for Default Theme
```
cd /fansoro/themes/default  
bower install
```


## Using command-line

If you have command-line access, you can easily install Fansoro by executing a few commands. First, create the directory where you want to install Fansoro, if it doesn’t already exist. Enter the directory, and execute the following commands:  

```
wget https://github.com/fansoro/fansoro/releases/download/v2.0.4/fansoro-2.0.4.zip
unzip fansoro-2.0.4.zip
chmod -R 0777 cache/ config/ storage/ themes/ plugins/
```
