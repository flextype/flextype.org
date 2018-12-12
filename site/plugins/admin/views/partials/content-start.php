<?php
namespace Flextype;
use Flextype\Component\Http\Http;
?>
<div class="content <?php if (Http::get('page') !== null) { ?> page-editor <?php } ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
