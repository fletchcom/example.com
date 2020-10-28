<?php
$message = "";

require './core/processContactForm.php';

$content = <<<EOT
<form action="contact.php" method="POST">
{$message}
<input type="hidden" name="subject" value="New submission!">
  <br>
  <br>
  <div class="header"><h1>Contact me!</h1></div>
  <br>
  <div class="form-control">
  <label for="name">Name</label>
    <input id="name" type="text" name="name" value="{$valid->userInput('name')}">
    <div class="text-error">{$valid->error('name')}</div>
  </div>
  <br>
  <div class="form-control">
  <label for="email">Email</label>
    <input id="email" type="text" name="email" value="{$valid->userInput('email')}">
    <div class="text-error">{$valid->error('email')}</div>
  </div>
  <br>
  <div class="form-control">
  <label for="message">Message</label>
    <textarea id="message" name="message">{$valid->userInput('message')}</textarea>
    <div class="text-error">{$valid->error('message')}</div>
  </div>
  <br>
  <div class="form-control">
  <input type="submit" value="Send">
  </div>
</form>

EOT;

include './core/layout.php';
