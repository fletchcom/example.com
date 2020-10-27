<?php
// require './core/bootstrap.php';

//Build the page metadata
$meta = [];
$meta['description'] = "Thank you for contacting Laura Fletcher";
$meta['keywords'] = "Thank you for contacting Laura Fletcher";

$content = <<<EOT
    <main class="thanks">
<h1>Thank you for reaching out.</h1>
<p>I will get back to you as soon as possible.</p>
</main>

EOT;

include './core/layout.php';