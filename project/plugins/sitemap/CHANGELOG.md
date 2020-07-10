# v2.1.0, 2020-07-10

### Features

* **core:** add new setting `date_format`

# v2.0.0, 2020-07-03

### Features

* **routes:** add ability to set custom routes
  ```yaml
  route: sitemap.xml
  ```
* **core:** add ability to set ignore list

  ```yaml
  ignore:
    - blog/blog-post-to-ignore
    - ignore-this-entry
  ```

* **core:** add ability to set additions list

  ```yaml
  additions:
    -
      loc: something-special
      lastmod: '2020-04-16'
      changefreq: hourly
      priority: 0.3
  ```

* **core:** add ability to set default values for entries

  ```yaml
  default:
    changefreq: daily
    priority: !!float 1
  ```

* **core:** add new event `onSitemapAfterInitialized`
* **core:** add sitemap.xsl template
* **core:** improved and refactored sitemap.html template

# v1.8.0, 2020-05-15
* Updates for Flextype 0.9.8

# v1.7.0, 2019-12-05
* Updates for Flextype 0.9.6

# v1.6.0, 2019-09-15
* Updates for Flextype 0.9.4

# v1.5.0, 2019-07-08
* Updates for Flextype 0.9.3
* Fixed issue with response headers

# v1.4.1, 2019-06-18
* Updates for Flextype 0.9.0

# v1.4.0, 2019-06-18
* Updates for Flextype 0.9.0

# v1.3.1, 2019-01-13
* Updates for Flextype 0.8.2

# v1.3.0, 2018-12-28
* Updates for Flextype 0.8.0

# v1.2.0, 2018-12-17
* Updates for Flextype 0.7.4

# v1.1.1, 2018-11-19
* Updates for Flextype 0.7.0

# v1.1.0, 2018-05-08
* Updates for Flextype 0.3.0

# v1.0.0, 2018-03-26
* Initial release
