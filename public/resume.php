<?php
require './core/bootstrap.php';

//Build the page metadata
$meta = [];
$meta['description'] = "Laura Fletcher Resume";
$meta['keywords'] = "Laura Fletcher Resume";

$content = <<<EOT
<main>
<section><h1>Laura Fletcher</h1></section>
<div>
  <a href="https://www.linkedin.com/in/laurafletcherchicago/" target="_blank" rel="noopener">LinkedIn</a>
  &#x25CF;
  Chicago, IL
</div>
<div><h2>Web Content and Full Stack Development</h2>
<p>I am a seasoned communications professional with experience across
    all media, including web sites, social media, and email campaigns.
    <a href="https://fletchcom.net/">Check out my portfolio!</a>
<ul>
    <li>Award-winning writing
    </li>
    <li>Messaging and content strategy credited with millions in revenue</li>
</ul>
</p>
</div>
<br>
<div>
    <section>
<h3>Core Competencies</h3>
<p>
<ul>
    <li>Communications Strategy</li>
    <li>Full Stack Web Development and Design</li>
    <li>Integrated Marketing Planning</li>
</ul>
</p>
</section>
<br>
<section>
<h2>Certifications/Technical Proficiencies</h2>
<p>
<ul>
    <li>Certified Agile Scrum Master</li>
    <li>Full Stack Web and Hybrid Mobile Application Development, 
        Microtrain Technologies
    </li>
</ul>
</p>
</section>
</div>
<br>
<div>
    <section>
<h2>Professional Experience</h2>
</section>
<section>
<h4>Web Development and Marketing Consultant</h4>
<p>Fletch Communications, <i>2004-Present </i></p>
<h4>Senior Writer, Advancement Communications</h4>
<p>Illinois Institute of Technology, <i>2015-2019</i></p>
<h4>Contract Development Campaign Associate</h4>
<p>University of Chicago Medical and Biological Sciences 
    Development, <i>2013-2015</i></p>
<h4>Staff Editor</h4>
<p>Law Bulletin Media, <i>2011-2013</i></p>
</section>
</div>
</main>
EOT;
    
require './core/layout.php';