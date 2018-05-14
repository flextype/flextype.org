---
title: Pages
description: Documentation for Flextype Developers and Flextype Users.
template: documentation
---

### Pages and Urls structure in Flextype:{.margin-top-hard}

<table class="table">
    <thead>
        <tr><th>Physical Location</th><th>URL</th></tr>
    </thead>
    <tbody>
        <tr><td>site/pages/home/page.md</td><td>/</td></tr>
        <tr><td>site/pages/blog/my-post/page.md</td><td>/blog/my-post</td></tr>
        <tr><td>site/pages/a/very/long/url/page.md</td><td>/a/very/long/url</td></tr>
    </tbody>
</table>


### Text File Markup

Text files are marked up using Markdown. They can also contain regular HTML.  
At the top of text files should place a [page header]([site_url]/documentation/content/headers) to specify attributes of the page.


### Text File shortcodes

<table class="table">
    <thead>
        <tr><th>Name</th><th>Description</th></tr>
    </thead>
    <tbody>
        <tr><td>[[[[site_url]]]</td><td>Outputs site url</td></tr>
    </tbody>
</table>
