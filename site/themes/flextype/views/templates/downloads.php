<?php namespace Flextype ?>
<?php Themes::view('partials/head')->display() ?>
<div class="page-content container">
    <h2 class="h2"><?= $entry['title'] ?></h2>
    <div class="inner">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Flextype</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Plugins</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Themes</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane text-center fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <a href="#" class="btn btn-download">Dowload Flextype</a>
              <p>
                  Current stable Flextype version 0.8.3<br>
                  <a href="#">View the release notes in the Changelog.</a>
              </p>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

          </div>
        </div>
    </div>
</div>
<?php Themes::view('partials/footer')->display() ?>
