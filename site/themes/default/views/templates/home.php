<?php namespace Flextype; ?>
<?php Themes::view('partials/head')->display(); ?>
<center>
    <div class="mega-header">
        <h2 class="h2">Introducing Flextype</h2>
        <p class="p">The Best Open Source Flat-File Content Management System</p>
        <a href="https://github.com/flextype/flextype/releases/download/v0.4.0/flextype-0.4.0.zip" class="btn btn-outline-dark btn-download-flextype">Download Flextype 0.4.0</a>
    </div>
</center>

<div class="container section">
<h3 class="section-heading">Features</h2>
<p class="section-description"></p>
  <div class="row">
    <div class="col-sm section-benefit">
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
<h3 class="section-heading">Community</h2>
<p class="section-description">Flextype is open source, community driven project,<br> and maintained by community!</p>
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

<div class="container section">
<h3 class="section-heading">NO LIMITS</h2>
<p class="section-description">With Flextype you can create any project you whant.</p>
  <div class="row">
    <div class="col-3"></div>
    <div class="col-sm">
        <p class="section-item"><i class="fas fa-star"></i> Business site</p>
        <p class="section-item"><i class="fas fa-star"></i> Landing page</p>
        <p class="section-item"><i class="fas fa-star"></i> Personal site</p>
        <p class="section-item"><i class="fas fa-star"></i> Portfolio</p>
    </div>
    <div class="col-sm">
        <p class="section-item"><i class="fas fa-star"></i> Product site</p>
        <p class="section-item"><i class="fas fa-star"></i> Documenation</p>
        <p class="section-item"><i class="fas fa-star"></i> Personal resume</p>
        <p class="section-item"><i class="fas fa-star"></i> Blog</p>
    </div>
    <div class="col-3"></div>
  </div>
</div>


<div class="container section">
<h3 class="section-heading">CONTRIBUTE</h2>
<p class="section-description">
Flextype is an open source project and community contributions are essential to its growing and success.
Contributing to the Flextype is easy and you can give as little or as much time as you want.
</p>
  <div class="row">
    <div class="col-2"></div>
    <div class="col-sm">
        <p class="section-item"><i class="fas fa-star"></i> Help on the <a href="http://forum.flextype.org">Forum</a>.</p>
        <p class="section-item"><i class="fas fa-star"></i> Develop a new plugin.</p>
        <p class="section-item"><i class="fas fa-star"></i> Create a new theme.</p>
    </div>
    <div class="col-sm">
        <p class="section-item"><i class="fas fa-star"></i> Find and <a href="https://github.com/flextype/flextype/issues">report issues</a>.</p>
        <p class="section-item"><i class="fas fa-star"></i> Link back to <a href="http://flextype.org">Flextype</a>.</p>
        <p class="section-item"><i class="fas fa-star"></i> Donate to keep Flextype free.</p>
    </div>
    <div class="col-2"></div>
  </div>
</div>

<br><br><br><br><br><br><br>

<?php echo $page['content']; ?>

<?php Themes::view('partials/footer')->display(); ?>
