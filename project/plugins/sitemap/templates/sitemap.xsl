<xsl:stylesheet version="1.0"
 xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
 xmlns:s="http://www.sitemaps.org/schemas/sitemap/0.9"
 exclude-result-prefixes="s"
>
 <xsl:template match="/">
  <html>
      <head>
        <meta name="robots" content="noindex" />
        <title>
          XML Sitemap
        </title>
        <style type="text/css">
            @import url('//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css');
            @import url('//fonts.googleapis.com/css?family=Roboto:400');
            html {
                font-smooth: auto;
                text-rendering: auto;
                -webkit-font-smoothing: antialiased;
                -webkit-text-size-adjust: 100%;
                background-color: #fff
            }

            body {
                font-family: 'Roboto', sans-serif;
                font-weight: 400;
                font-size: 20px;
                line-height: 1.8em;
                letter-spacing: 0;
                text-align: left;
                color: #333;
            }

            body {
                overflow: auto;
                padding: 20px
            }

            a,
            a:link,
            a:visited {
                text-decoration: none;
                border-bottom: dotted 1px #333;
                color: #333;
            }

            .table {
                margin: 0 auto;
            }

            .table th {
                border: solid 1px #cbcbcb !important;
                text-align: center;
                background: #fff;
            }

            .table {
                border-collapse: collapse;
                border-spacing: 0;
                empty-cells: show;
                border: 1px solid #cbcbcb;
            }

            .table caption {
                color: #000;
                padding: 1em 0;
                text-align: center;
            }

            .table td,
            .table th {
                border: 1px solid #cbcbcb;
                border-width: 1px;
                font-size: inherit;
                margin: 0;
                overflow: visible;
                padding: 0.5em 1em;
            }

            .table thead {
                background-color: #e0e0e0;
                color: #000;
                text-align: left;
                vertical-align: bottom;
            }
        </style>
      </head>
    <body>
      <table class="table" border="0">
        <thead>
          <tr>
            <th colspan="5">Sitemap</th>
          </tr>
          <tr>
            <th></th>
            <th>Location</th>
            <th>Last Modified</th>
            <th>Update Frequency</th>
            <th>Priority</th>
          </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
          <xsl:for-each select="s:urlset/s:url">
            <xsl:sort select="s:loc" />
            <tr>
              <xsl:variable name="loc"><xsl:value-of select="s:loc"/></xsl:variable>
              <xsl:variable name="pno"><xsl:value-of select="position()"/></xsl:variable>
              <td><xsl:value-of select="$pno"/></td>
              <td><a href="{$loc}"><xsl:value-of select="s:loc"/></a></td>
              <td><xsl:value-of select="s:lastmod"/></td>
              <td><xsl:value-of select="s:changefreq"/></td>
              <td><xsl:value-of select="s:priority"/></td>
            </tr>
          </xsl:for-each>
        </tbody>
      </table>
    </body>
  </html>
 </xsl:template>
</xsl:stylesheet>
