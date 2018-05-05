<?php namespace Flextype; ?>
<?php Themes::template('partials/head')->display(); ?>
<center>
    <div class="mega-header">
        <h2 class="h2">Introducing Flextype</h2>
        <p class="p">Modern Open Source Flat-File Content Management System</p>
        <a href="https://github.com/flextype/flextype/releases/download/v0.3.0/flextype-0.3.0.zip" class="btn btn-outline-dark btn-download-flextype">Download Flextype 0.3.0</a>
    </div>
</center>
<div class="container section">
<h2 class="h1">Features</h2>
  <div class="row">
    <div class="col-sm">
        <center>
            <i class="fa fa-magic" aria-hidden="true"></i>
            <h4>Simple</h4>
            <p>Easy to install, upgrade and use.<br>No installation needed, just copy files to your server!</p>
        <center>
    </div>
    <div class="col-sm">
        <center>
            <i class="fa fa-rocket" aria-hidden="true"></i>
            <h4>Fast</h4>
            <p>Flextype is realy fast and lightweight!<br> No database required, flat files only!</p>
        </center>
    </div>
    <div class="col-sm">
        <center>
            <i class="fa fa-cogs" aria-hidden="true"></i>
            <h4>Flexible</h4>
            <p>Flextype provides amazing API for plugins, themes and core developers!</p>
        </center>
    </div>
  </div>
  <br><br>
  <div class="row">
      <div class="col-sm">
          <center>
              <i class="fa fa-font" aria-hidden="true"></i>
              <h4>Markdown Syntax</h4>
              <p>Use your favorite editor to write your content with plain Markdown syntax.</p>
          </center>
      </div>
    <div class="col-sm">
        <center>
            <i class="fa fa-list-alt" aria-hidden="true"></i>
            <h4>Dynamic Content Types</h4>
            <p>The flat-file nature of Flextype lets you define custom fields for any of your pages.</p>
        </center>
    </div>
    <div class="col-sm">
        <center>
            <i class="fab fa-github" aria-hidden="true"></i>
            <h4>Open Source</h4>
            <p>Flextype is an open-source project licensed under the MIT LICENSE to set the world free!</p>
        </center>
    </div>
  </div>
</div>

<div class="container section">
<h2 class="h1">Community</h2>
  <div class="row">
    <div class="col-sm">
        <center>
            <a href="http://forum.flextype.org">
            <i class="fa fa-comments" aria-hidden="true"></i>
            <h4>Forum</h4>
            </a>
        <center>
    </div>
    <div class="col-sm">
        <center>
            <a href="https://github.com/flextype">
            <i class="fab fa-github" aria-hidden="true"></i>
            <h4>GitHub</h4>
            </a>
        </center>
    </div>
    <div class="col-sm">
        <center>
            <a href="https://gitter.im/flextype/flextype">
            <i class="fab fa-gitter"></i>
            <h4>Gitter</h4>
            </a>
        </center>
    </div>
  </div>
</div>
<br><br><br><br>

<?php echo $page['content']; ?>

<?php Themes::template('partials/footer')->display(); ?>
