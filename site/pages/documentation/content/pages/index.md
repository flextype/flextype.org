---
title: Pages
description: Documentation for Fansoro Developers and Fansoro Users.
template: index
---

### Pages and Urls structure in Fansoro:{.margin-top-hard}

<table class="table">
    <thead>
        <tr><th>Physical Location</th><th>URL</th></tr>
    </thead>
    <tbody>
        <tr><td>storage/content/index.md</td><td>/</td></tr>
        <tr><td>storage/content/sub.md</td><td>/sub</td></tr>
        <tr><td>storage/content/sub/index.md</td><td>/sub (same as above)</td></tr>
        <tr><td>storage/content/sub/page.md</td><td>/sub/page</td></tr>
        <tr><td>storage/content/a/very/long/url.md</td><td>/a/very/long/url</td></tr>
    </tbody>
</table>


### Text File Markup

Text files are marked up using Markdown. They can also contain regular HTML.  
At the top of text files should place a [page header]({site_url}/documentation/content/pages-headers) to specify attributes of the page.


### Text File Vars

<table class="table">
    <thead>
        <tr><th>Name</th><th>Description</th></tr>
    </thead>
    <tbody>
        <tr><td>{{site_url}}</td><td>Outputs site url</td></tr>
        <tr><td>{{block name=block-name}}</td><td>Display page block</td></tr>
    </tbody>
</table>
