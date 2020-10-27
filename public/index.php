<?php
// require './core/bootstrap.php';

//Build the page metadata
$meta = [];
$meta['description'] = "Laura Fletcher, Digital Communications Professional";
$meta['keywords'] = "Laura Fletcher, Digital Communications Professional";

$content = <<<EOT
<main>
<h1>Hello, my name is Laura Fletcher</h1>
<p><img 
    src="https://www.gravatar.com/avatar/4678a33bf44c38e54a58745033b4d5c6?d=mm&s=64" 
    alt="Laura Fletcher" class="avatar">
    I am a marketing and communications professional 
    living in Chicago.
</p>
</main>
EOT;
    
require './core/layout.php';