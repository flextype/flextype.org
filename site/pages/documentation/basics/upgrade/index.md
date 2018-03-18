---
title: Upgrading to the Latest Version
description: Documentation for Fansoro Developers and Fansoro Users.
template: index
---

### Update from **Fansoro 2.0.3** to **Fansoro 2.0.4**{.margin-top-hard}
1. **Backup your Site First!**
2. Download [Fansoro 2.0.4](https://github.com/fansoro/fansoro/releases/download/v2.0.4/fansoro-2.0.4.zip)
3. Unzip the contents to a new folder on your local computer.
4. Upload `/fansoro/`, `/vendor/` with an (s)FTP client to your host.

### Update from **Fansoro 2.0.2** to **Fansoro 2.0.3**
1. **Backup your Site First!**
2. Download [Fansoro 2.0.3](https://github.com/fansoro/fansoro/releases/download/v2.0.3/fansoro-2.0.3.zip)
3. Unzip the contents to a new folder on your local computer.
4. Upload `/fansoro/`, `/vendor/`, `/.gitignore`, `/composer.json`, `/LICENSE.md`, `/index.php` with an (s)FTP client to your host.

### Update from **Fansoro 2.0.1** to **Fansoro 2.0.2**
1. **Backup your Site First!**
2. Download [Fansoro 2.0.2](https://github.com/fansoro/fansoro/releases/download/v2.0.2/fansoro-2.0.2.zip)
3. Unzip the contents to a new folder on your local computer.
4. Upload `/themes/default/`, `/fansoro/`, `/vendor/doctrine/`, `/.gitignore`, `/composer.json` with an (s)FTP client to your host.

### Update from **Fansoro 2.0.0** to **Fansoro 2.0.1**
1. **Backup your Site First!**
2. Download [Fansoro 2.0.1](https://github.com/fansoro/fansoro/releases/download/v2.0.1/fansoro-2.0.1.zip)
3. Unzip the contents to a new folder on your local computer.
4. Upload `/fansoro/boot/defines.php`, `/robots.txt`, `/composer.json` with an (s)FTP client to your host.

### Update from **Fansoro 1.1.4** to **Fansoro 2.0.0**
1. **Backup your Site First!**
2. Download [Fansoro 2.0.0](https://github.com/fansoro/fansoro/releases/download/v2.0.0/fansoro-2.0.0.zip)
3. Unzip the contents to a new folder on your local computer.
4. Upload `/vendors/`, `/fansoro/`, `/themes/default/`, `/index.php`, `/config/system.yml` with an FTP client to your host.
5. Remove `/libraries/` from your host.

### Update from **Fansoro 1.1.3** to **Fansoro 1.1.4**
1. **Backup your Site First!**    
2. Download [Fansoro 1.1.4](https://github.com/fansoro/fansoro/releases/download/v1.1.4/fansoro-1.1.4.zip)    
3. Unzip the contents to a new folder on your local computer.  
4. Upload `/libraries/Fansoro/`, `/libraries/Force/` with an FTP client to your host.

### Update from **Fansoro 1.1.2** to **Fansoro 1.1.3**
1. **Backup your Site First!**    
2. Download [Fansoro 1.1.3](https://github.com/fansoro/fansoro/releases/download/v1.1.3/fansoro-1.1.3.zip)    
3. Unzip the contents to a new folder on your local computer.  
4. Upload `/libraries/Fansoro/`, with an FTP client to your host.
5. Update in .htaccess this   
`<FilesMatch "(^#.*#|\.(md|txt|html|tpl)|~)$">`   
to this:  
`<FilesMatch "(^#.*#|\.(md|txt|html|tpl|yml|yaml)|~)$">`  


### Update from **Fansoro 1.1.1** to **Fansoro 1.1.2**  
1. **Backup your Site First!**    
2. Download [Fansoro 1.1.2](https://github.com/fansoro/fansoro/releases/download/v1.1.2/fansoro-1.1.2.zip)    
3. Unzip the contents to a new folder on your local computer.  
4. Upload `/libraries/`, with an FTP client to your host.  


### Update from **Fansoro 1.1.0** to **Fansoro 1.1.1**  
1. **Backup your Site First!**    
2. Download [Fansoro 1.1.1](https://github.com/fansoro/fansoro/releases/download/v1.1.1/fansoro-1.1.1.zip)    
3. Unzip the contents to a new folder on your local computer.  
4. Upload `/themes/default/`, `/libraries/`, `/index.php`, with an FTP client to your host.  
5. Rename `content` folder to `storage`  


### Update from **Fansoro 1.0.6** to **Fansoro 1.1.0**
1. **Backup your Site First!**    
2. Download [Fansoro 1.1.0](https://github.com/fansoro/fansoro/releases/download/v1.1.0/fansoro-1.1.0.zip)    
3. Unzip the contents to a new folder on your local computer.  
4. Upload `/config/`, `/themes/default/`, `/libraries/`, `/cache/`, `/content/`,  `/index.php`, `/robots.txt` with an FTP client to your host.  
5. Move all your pages from `content` to `/content/pages/`  
6. Update all your page headers in [valid YAML format](http://fansoro.org/documentation/content/pages-headers)
7. Set your correct `url`, `title`, `description`, `keywords` and other settings in `/config/site.yml`
