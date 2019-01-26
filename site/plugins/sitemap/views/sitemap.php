<?= '<?xml version="1.0" encoding="UTF-8"?>'."\n"; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach($entries as $entry): ?>
<url>
<loc><?= $entry['url'] ?></loc>
<lastmod><?= $entry['date'] ?></lastmod>
<changefreq><?= $entry['changefreq'] ?? '1.0' ?></changefreq>
<priority>1.0</priority>
</url>
<?php endforeach ?>
</urlset>
